<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request= request();

        //SELECT a.*,b.name AS parent_name 
        //FROM categories a 
        //LEFT JOIN categories b ON a.parent_id = b.id;
        $categories = Category::leftJoin('categories as parents','parents.id','=','categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_name'
        ])
        ->filter($request->query())
        ->orderBy('categories.name')
        //->dd();
        ->paginate();//return collection object
        
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category =new Category();
        return view('dashboard.categories.create',compact('category','parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clean_data= $request->validate(Category::rules(),[
            'name.unique' => 'this name is already exits ',
            'name.required' => 'this field (:attribute) is required'
        ]);
        //Request merge
        $request->merge([
            'slug'=>Str::slug($request->post('name'))
        ]);
        $data = $request->except('image');
        $data ['image'] = $this->uploadedImage($request);
        

        //Mass assignment
        $category =Category::create($data);

        //PRG_post_redirect_get

        return redirect()->route('dashboard.categories.index')
        ->with('success', 'Category Created!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $category = Category::findOrFail($id);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()->route('dashboard.categories.index')
                ->with('info', 'Record Not Found!');
        }

        $parents = Category::where('id','<>',$id)
        ->where(function($query) use ($id){
            $query->whereNull('parent_id')
            ->orWhere('parent_id', '<>',$id);
        })
    
        ->get();
        return view('dashboard.categories.edit', compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        
        //$request->validate(Category::rules($id));

        $category = Category::findOrFail($id);

        $old_image = $category->image;
        $data = $request->except('image');
        $new_image = $this->uploadedImage($request);
        if ($new_image){
            $data['image'] = $new_image;
        }
        
        if($category->update($data)){
        //$category->fill($request->all())->save();

        if ($old_image && $new_image){
            Storage::disk('public')->delete($old_image);

        }}

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
         
        //if($category->image){
        //    Storage::disk('public')->delete($category->image);
        //}

        //Category::destroy($id);
        
        return redirect()->route('dashboard.categories.index')
        ->with('success', 'Category Deleted!');
    }

    protected function uploadedImage( Request $request)
    {
        if(!$request->hasFile('image')){
            return null;
        }
            $file = $request->file('image');//uploadedFile object

            try {
                $request->validate([
                    'image' => 'image|max:2048',  // Max 2MB
                ]);
        
                $path = $file->store('uploads', 'public');
                return $path;
            } catch (\Exception $e) {
                return null; // or log error, or handle as needed
            }
           
    }
    public function trash(Request $request)
    {
        $categories = Category::onlyTrashed()->paginate();
        return view('dashboard.categories.trash',compact('categories'));
    }
}
