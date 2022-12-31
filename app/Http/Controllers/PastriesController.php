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
            ->select('products.product_id', 'products.categories', 'products.foreignName', 'products.name', 'products.productDescription', 'products.productIdlong', 'products.productOptions', 'products.productSize', 'products.productType', 'products.productTypeId', 'products.productStatus', 'products.productStatusId', 'products.productBrandId', 'products.productBrandName', 'products.sellingPrice', 'products.thumbnailUrl', 'products.url', DB::raw('(SUM(inventory.added_count) - SUM(cart.qty)) as stock'))
            ->where('productIdlong', $productId)
            ->leftJoin('cart', 'cart.product_id', '=', 'products.productIdlong')
            ->leftJoin('inventory', 'inventory.product_id', '=', 'products.productIdlong')
            ->groupBy('products.product_id')
            ->groupBy('products.categories')
            ->groupBy('products.foreignName')
            ->groupBy('products.name')
            ->groupBy('products.productDescription')
            ->groupBy('products.productIdlong')
            ->groupBy('products.productOptions')
            ->groupBy('products.productSize')
            ->groupBy('products.productType')
            ->groupBy('products.productTypeId')
            ->groupBy('products.productStatus')
            ->groupBy('products.productStatusId')
            ->groupBy('products.productBrandId')
            ->groupBy('products.productBrandName')
            ->groupBy('products.sellingPrice')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.url')
            ->get();
        
            $allcartids = DB::table('cart')
            ->select(DB::raw('GROUP_CONCAT(cart_id) as carts'))
            ->where('product_id', $productId)
            ->get();
            $listofcarts = explode(',', $allcartids[0]->carts);

            
            $allorderids = DB::table('cartorder')
            ->select(DB::raw('GROUP_CONCAT(order_id) as orders'))
            ->whereIn('cart_id', $listofcarts)
            ->get();

            $listoforderids = explode(',', $allorderids[0]->orders);

            

            $allnewcartids = DB::table('cartorder')
            ->select(DB::raw('GROUP_CONCAT(cart_id) as allcarts'))
            ->whereIn('order_id', $listoforderids)
            ->get();
            
            $allnewcartidsarr = explode(',', $allnewcartids[0]->allcarts);


            $allNotcartids = DB::table('cartorder')
            ->select('products.product_id', 'products.categories', 'products.foreignName', 'products.name', 'products.productDescription', 'products.productIdlong', 'products.productOptions', 'products.productSize', 'products.productType', 'products.productTypeId', 'products.productStatus', 'products.productStatusId', 'products.productBrandId', 'products.productBrandName', 'products.sellingPrice', 'products.thumbnailUrl', 'products.url')
            ->where('productType', 'Pastries')
            ->join('cart', 'cartorder.cart_id', '=', 'cart.cart_id')
            ->join('products', 'cart.product_id', '=', 'products.productIdlong')
            ->where('products.productIdlong', '!=', $productId)
            ->whereIn('cart.cart_id', $allnewcartidsarr)
            ->groupBy('products.product_id')
            ->groupBy('products.categories')
            ->groupBy('products.foreignName')
            ->groupBy('products.name')
            ->groupBy('products.productDescription')
            ->groupBy('products.productIdlong')
            ->groupBy('products.productOptions')
            ->groupBy('products.productSize')
            ->groupBy('products.productType')
            ->groupBy('products.productTypeId')
            ->groupBy('products.productStatus')
            ->groupBy('products.productStatusId')
            ->groupBy('products.productBrandId')
            ->groupBy('products.productBrandName')
            ->groupBy('products.sellingPrice')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.url')
            ->get();
            
            $remaining = 10 - count($allNotcartids); 

            $product = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'productType', 'productTypeId', 'productStatus', 'productStatusId', 'productBrandId', 'productBrandName', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('productType', 'Pastries')
            ->where('productIdlong', '!=', $productId)
            ->take($remaining)
            ->get();

        return view('pastries.details',[
            'alsobuy'=>$allNotcartids,
            'uniqueProductIds'=>$product,
            'products'=>$uniqueProductId,
            'productId'=>$productId
        ]);

    }

}
