<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view("categories.index", compact('categories'));
    }

    public function create(){
        return view("categories.create");
    }

    public function store(Request $request){
        //Validate data
        $request->validate([
            'name' => 'required|min:10',
            'description' => 'required',
            'category' => 'required|max:10'
        ]);

        //Then continue
        //So, I can control fields I want to save by using Model->fillable/guard
        $category = Category::create($request->all());

        return redirect()->route('categories.show', $category);
    }

    public function show(Category $category){
        //$category = Category::find($id);
        $category->subcategories = Subcategory::where('category_id', $category->id)->get();//->toArray();
        return view("categories.show", compact('category'));
    }

    public function edit(Category $category){
        return view("categories.edit", compact('category'));
    }

    public function update(Request $request, Category $category){
        //Validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        //Then continue
        //So, I can control fields I want to update by using Model->fillable/guard
        $category->update($request->all());

        return redirect()->route('categories.show', $category);        
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect()->route('categories.index');
    }
}