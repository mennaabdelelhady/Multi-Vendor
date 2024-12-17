<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();//return collection object
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
        $request->validate(Category::rules());
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
    public function update(Request $request, string $id)
    {
        $request->validate(Category::rules($id));


        $category = Category::findOrFail($id);

        $old_image = $category->image;
        $data = $request->except('image');
        $data['image'] = $this->uploadedImage($request);

        
        $category->update($data);
        //$category->fill($request->all())->save();

        if ($old_image && $data['image']){
            Storage::disk('public')->delete($old_image);

        }

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

        Category::destroy($id);
        
        return redirect()->route('dashboard.categories.index')
        ->with('success', 'Category Deleted!');
    }

    protected function uploadedImage( Request $request)
    {
        if(!$request->hasFile('image')){
            return;
        }
            $file = $request->file('image');//uploadedFile object
            $path = $file->store('uploads', 'public');

            return $path;
    }
}
