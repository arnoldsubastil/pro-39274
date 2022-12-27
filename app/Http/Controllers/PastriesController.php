<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE
use DB;

class PastriesController extends Controller
{
    //

    public function index(){
        
        $uniqueProductId = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'productType', 'productTypeId', 'productStatus', 'productStatusId', 'productBrandId', 'productBrandName', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('productType', 'Pastries')
            ->get();          

        return view('pastries.index',[
            'uniqueProductIds'=>$uniqueProductId,
            'countUnique'=>count($uniqueProductId)
        ]);
    
    }

    public function details($productId){

        $uniqueProductId = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'productType', 'productTypeId', 'productStatus', 'productStatusId', 'productBrandId', 'productBrandName', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('productIdlong', $productId)
            ->get();
        
            $product = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'productType', 'productTypeId', 'productStatus', 'productStatusId', 'productBrandId', 'productBrandName', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('productType', 'Pastries')
            ->where('productIdlong' , '!=', $productId)
            ->get();

        
        return view('pastries.details',[
            'uniqueProductIds'=>$product,
            'products'=>$uniqueProductId,
            'productId'=>$productId
        ]);

    }

}
