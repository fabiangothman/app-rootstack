<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Subcategory;
use App\Models\Category;
use stdClass;
use Illuminate\Support\Str;

class ScrapController extends Controller
{
    public function index(){
        $scraping = new stdClass();
        $scraping->url = "https://www.milanuncios.com/";
        
        return view("scraps.index", compact('scraping'));
    }

    public function store(Request $request){
        //Validate data
        $request->validate([
            'url' => 'required|min:10'
        ]);

        //Then continue
        $general_url = file_get_contents($request->url."anuncios/");

        //creamos nuevo DOMDocument y cargamos la url
        $general_dom = new \DOMDocument();
        @$general_dom->loadHTML($general_url);
        
        //obtenemos todos los div de la url
        $cat_options = $general_dom->getElementById( 'ca0' );
        $categories = $cat_options->getElementsByTagName('option');

        for ($i=1; $i < $categories->length; $i++) {
            $categoryValue = $categories->item($i)->getAttribute('value');
            //Advertisement Category
            echo "<br /><br />";
            echo "-> Category: ".$categoryValue."<br />";
            
            //Adds category to database
            $categoryDB = new Category();
            $categoryDB->name = $categoryValue;
            $categoryDB->slug = Str::slug($categoryValue."-".time().$i, '-');
            //Because "name" it's an unique field
            $catExists = Category::where('name', $categoryDB->name)->get();
            if($catExists->count()==0){
                //So, create new data
                $categoryDB->save();
                $catExists = Category::where('name', $categoryDB->name)->get();
            }
            $categoryDB = $catExists->first()->toArray();

            $category_url = file_get_contents($request->url.$categoryValue."/");
            $category_dom = new \DOMDocument();
            @$category_dom->loadHTML($category_url);
            $sbcat_options = $category_dom->getElementById( 'ca1' );
            
            if($sbcat_options){
                $subcategories = $sbcat_options->getElementsByTagName('option');

                for ($j=1; $j < $subcategories->length; $j++) {
                    $subcategoryValue = $subcategories->item($j)->getAttribute('value');
                    //Advertisement Subcategory
                    echo "<br />------> Subcategory: ".$subcategoryValue;

                    //Adds subcategory to database
                    $subcategoryDB = new Subcategory();
                    $subcategoryDB->name = $subcategoryValue;
                    $subcategoryDB->slug = Str::slug($subcategoryValue."-".time().$j, '-');
                    $subcategoryDB->category_id = $categoryDB['id'];
                    //Because "name" it's an unique field
                    $scatExists = Subcategory::where('name', $subcategoryDB->name)->get();
                    if($scatExists->count()==0){
                        //So, create new data
                        $subcategoryDB->save();
                        $scatExists = Subcategory::where('name', $subcategoryDB->name)->get();
                    }
                    $subcategoryDB = $scatExists->first()->toArray();

                    $subCategory_url = file_get_contents($request->url.$subcategoryValue."/");
                    $subCategory_dom = new \DOMDocument();
                    @$subCategory_dom->loadHTML($subCategory_url);
                    
                    //Call function
                    $this->getAdvirsements($subCategory_dom, $subcategoryDB['id']);
                    
                }
            }else{
                $this->getAdvirsements($category_dom);
            }

            
            echo "<br /><br />";
        }

        //Pasar a CSV
        return redirect()->route('advertisements.index');
    }

    private function getAdvirsements($category_dom, $subcategoryIdDB = null){
        $generalCont = $category_dom->getElementsByTagName('main');
        if($generalCont->length>0){
            $listCont = $generalCont->item(0)->getElementsByTagName('div');
            $articles = null;
            foreach ($listCont as $key => $possibleListDiv) {
                if($possibleListDiv->getAttribute('class') == "ma-AdList"){
                    $articles = $possibleListDiv->getElementsByTagName('article');
                    break;
                }
            }
            
            if (is_null($articles)) {
                echo "<strong>There is no advisements!</strong>";
            }else{
                foreach ($articles as $key => $item) {
                    //Advertisement title
                    $title = $articles->item($key)->getElementsByTagName('h2')[0]->nodeValue;
                    echo "<br />------------>".$title;
                    
                    $possibleDesc = $articles->item($key)->getElementsByTagName('p');
                    $desc = null;
                    foreach ($possibleDesc as $key => $desc) {
                        if($desc->getAttribute('class') == "ma-AdCard-text"){
                            $desc = $desc->nodeValue;
                            break;
                        }
                    }

                    //Advertisement description
                    //echo "<br />------------>".$desc;

                    //Adds advertisement to database
                    $advertisementDB = new Advertisement();
                    $advertisementDB->name = $title;
                    $advertisementDB->slug = Str::slug($title."-".time().$key, '-');
                    $advertisementDB->description = $desc;
                    $advertisementDB->subcategory_id = $subcategoryIdDB;
                    //Because "name" it's an unique field
                    $scatExists = Advertisement::where('name', $advertisementDB->name)->get();
                    if($scatExists->count()==0){
                        //So, create new data
                        $advertisementDB->save();
                    }
                }
            }
        }else{
            $itemsCont = $category_dom->getElementById('cuerpo');
            $divItems = $itemsCont->getElementsByTagName('div');

            for ($k=0; $k < $divItems->length; $k++) {
                if($divItems->item($k)->getAttribute('class') === "aditem-detail"){
                    //Advertisement title
                    $title = $divItems->item($k)->getElementsByTagName('a')[0]->nodeValue;
                    echo "<br />- - - - - - >".$title;

                    //Advertisement description
                    $desc = $divItems->item($k)->getElementsByTagName('div')[2]->nodeValue;
                    //echo "<br />- - - - - - >".$desc;

                    //Adds advertisement to database
                    $advertisementDB = new Advertisement();
                    $advertisementDB->name = $title;
                    $advertisementDB->slug = Str::slug($title."-".time().$k, '-');
                    $advertisementDB->description = $desc;
                    $advertisementDB->subcategory_id = $subcategoryIdDB;
                    //Because "name" it's an unique field
                    $scatExists = Advertisement::where('name', $advertisementDB->name)->get();
                    if($scatExists->count()==0){
                        //So, create new data
                        $advertisementDB->save();
                    }
                }
            }
        }

        
    }
}
