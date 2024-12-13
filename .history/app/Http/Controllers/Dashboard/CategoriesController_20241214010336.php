<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
        return view('dashboard.categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*$request->input('name');
        $request->post('name');
        $request->query('name');
        $request->get('name');
        $request->name;
        $request['name'];

        $Category = new Category($request->all());
        $category->save();*/

        //Request merge
        $request->merge([
            'slug'=>Str::slug($request->post('name'))
        ]);

        //Mass assignment
        $category =Category::create($request->all());

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
        } catch(Exception $e)

        $parents = Category::where('id','<>',$id)->get();
        return view('dashboard.categories.edit', compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        //$category->fill($request->all())->save();

        return redirect()->route('dashboard.categories.index')
        ->with('success', 'Category Created!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
