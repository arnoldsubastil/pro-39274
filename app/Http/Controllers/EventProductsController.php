<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE
use DB;

class EventProductsController extends Controller
{
    //

    public function index(){

        
        $uniqueProductId = DB::table('products')
            ->select('products.product_id', 'products.categories', 'products.foreignName', 'products.name', 'products.productDescription', 'products.productIdlong', 'products.productOptions', 'products.productSize', 'products.sellingPrice', 'products.thumbnailUrl', 'products.url',DB::raw("GROUP_CONCAT(sets.count_choose,'-', sets.choice_text, '-', sets.choices) as chooseitem"))
            ->leftJoin('sets', 'products.productIdlong', '=', 'sets.product_id')
            ->where('products.categories', 'Events')
            ->groupBy('products.product_id')
            ->groupBy('products.categories')
            ->groupBy('products.foreignName')
            ->groupBy('products.name')
            ->groupBy('products.productDescription')
            ->groupBy('products.productIdlong')
            ->groupBy('products.productOptions')
            ->groupBy('products.productSize')
            ->groupBy('products.sellingPrice')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.url')
            ->get();
        return view('eventProducts.index',[
            'uniqueProductIds'=>$uniqueProductId
        ]);
    
    }
}
