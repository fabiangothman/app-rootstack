<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(){
        $advertisements = Advertisement::orderBy('id', 'desc')->paginate(10);
        return view("advertisements.index", compact('advertisements'));
    }

    public function create(){
        return view("advertisements.create");
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
        $advertisement = Advertisement::create($request->all());

        return redirect()->route('advertisements.show', $advertisement);
    }

    public function show(Advertisement $advertisement){
        //$advertisement = Advertisement::find($id);
        $advertisement->subcategory = Subcategory::where('id', $advertisement->subcategory_id)->get()->first();//->toArray();
        $advertisement->category = Category::where('id', $advertisement->subcategory->category_id)->get()->first();//->toArray();
        return view("advertisements.show", compact('advertisement'));
    }

    public function edit(Advertisement $advertisement){
        return view("advertisements.edit", compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement){
        //Validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        //Then continue
        //So, I can control fields I want to update by using Model->fillable/guard
        $advertisement->update($request->all());

        return redirect()->route('advertisements.show', $advertisement);        
    }

    public function destroy(Advertisement $advertisement){
        $advertisement->delete();

        return redirect()->route('advertisements.index');
    }

    public function showsubcategory(Subcategory $subcategory){
        //$advertisement = Advertisement::find($id);
        $advertisements = Advertisement::where('subcategory_id', $subcategory->id)->paginate(10);//->toArray();
        return view("advertisements.showsubcategory", compact('subcategory', 'advertisements'));
    }
}
