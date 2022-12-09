<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
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
 
         return view('cart.index',[
             'uniqueProductIds'=>$uniqueProductId,
             'countUnique'=>$countUnique
         ]);

    }

    public function create(){

        //GET DATA FROM STORAGE 
        $path = storage_path() . "\app\json\Products.json"; 
        $json = json_decode(file_get_contents($path), true);
        //$product=collect($json)->where('productId', $productId);
        

        return view('orders.create',[
            //'products'=>$product,
            //'productId'=>$productId
        ]);

    }


}
