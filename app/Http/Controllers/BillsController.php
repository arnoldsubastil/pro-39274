<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE

class BillsController extends Controller
{
    //

    public function create($productId){

        //GET DATA FROM STORAGE 
        $path = storage_path() . "/app/json/Products.json"; 
        $json = json_decode(file_get_contents($path), true);
        $product=collect($json)->where('productId', $productId);
        

        return view('bills.create',[
            'products'=>$product,
            'productId'=>$productId
        ]);

    }

}
