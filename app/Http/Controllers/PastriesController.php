<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE

class PastriesController extends Controller
{
    //

    public function index(){

        //GET DATA FROM STORAGE 
        $path = storage_path() . "\app\json\Products.json"; 
        $json = json_decode(file_get_contents($path), true);
        $products=collect($json);   
        
        //GET DATA FROM WEB 
        //$pastries=Http::get('https://jsonplaceholder.typicode.com/photos')->json();
        //$products=collect($pastries);
       
        $uniqueProductId=$products->unique('productId');
        $countUnique = $products->countBy('productId');

        //dd($countUnique);
        //dump($countUnique);               

        return view('pastries.index',[
            'uniqueProductIds'=>$uniqueProductId,
            'countUnique'=>$countUnique
        ]);
    
    }

    public function details($productId){

        //GET DATA FROM STORAGE 
        $path = storage_path() . "\app\json\Products.json"; 
        $json = json_decode(file_get_contents($path), true);
        $products=collect($json);
        $product=collect($json)->where('productId', $productId);

        $uniqueProductId=$products->unique('productId');
        //GET DATA FROM WEB 
        //$pastries=Http::get('https://jsonplaceholder.typicode.com/photos')->json();
        //$product=collect($pastries)->where('id', $id);

        //dump($product);

        
        return view('pastries.details',[
            'uniqueProductIds'=>$uniqueProductId,
            'products'=>$product,
            'productId'=>$productId
        ]);

    }

}
