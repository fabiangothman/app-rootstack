<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories = Subcategory::orderBy('id', 'desc')->paginate(10);
        return view("subcategories.index", compact('subcategories'));
    }

    public function create(){
        return view("subcategories.create");
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
        $subcategory = Subcategory::create($request->all());

        return redirect()->route('subcategories.show', $subcategory);
    }

    public function show(Subcategory $subcategory){
        //$subcategory = Subcategory::find($id);
        $subcategory->category = Category::where('id', $subcategory->category_id)->get()->first();//->toArray();
        return view("subcategories.show", compact('subcategory'));
    }

    public function edit(Subcategory $subcategory){
        return view("subcategories.edit", compact('subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory){
        //Validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        //Then continue
        //So, I can control fields I want to update by using Model->fillable/guard
        $subcategory->update($request->all());

        return redirect()->route('subcategories.show', $subcategory);        
    }

    public function destroy(Subcategory $subcategory){
        $subcategory->delete();

        return redirect()->route('subcategories.index');
    }
}