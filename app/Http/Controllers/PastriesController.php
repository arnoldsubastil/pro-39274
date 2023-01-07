<?php

namespace App\Http\Controllers;

use DB;

class PastriesController extends Controller
{
    //

    public function index($categoryID){
        
        $uniqueProductId = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('categories', $categoryID)
            ->get();          

        $categoryName = ucwords(str_replace('-', ' ', $categoryID));
        return view('pastries.new',[
            'uniqueProductIds'=>$uniqueProductId,
            'countUnique'=>count($uniqueProductId),
            'category'=>$categoryName
        ]);
    
    }

    public function details($productId){

        $uniqueProductId = DB::table('products')
            ->select('products.product_id', 'products.categories', 'products.foreignName', 'products.name', 'products.productDescription', 'products.productIdlong', 'products.productOptions', 'products.productSize', 'products.sellingPrice', 'products.thumbnailUrl', 'products.url', DB::raw('(SUM(inventory.added_count) - SUM(cart.qty)) as stock'), 'products.video_url', 'products.storage')
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
            ->groupBy('products.sellingPrice')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.video_url')
            ->groupBy('products.url')
            ->groupBy('products.storage')
            ->get();

            $category = $uniqueProductId[0]->categories;
        
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
            ->select('products.product_id', 'products.categories', 'products.foreignName', 'products.name', 'products.productDescription', 'products.productIdlong', 'products.productOptions', 'products.productSize','products.sellingPrice', 'products.thumbnailUrl', 'products.url', 'products.video_url', 'products.storage')
            ->where('products.categories', $category)
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
            ->groupBy('products.sellingPrice')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.url')
            ->groupBy('products.video_url')
            ->groupBy('products.storage')
            ->get();
            
            $remaining = 10 - count($allNotcartids); 

            $product = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'sellingPrice', 'thumbnailUrl', 'url', 'storage')
            ->where('categories', 'pastries')
            ->where('productIdlong', '!=', $productId)
            ->take($remaining)
            ->get();

            
            $allreviews = DB::table('reviews')
            ->select('customer_id', 'review')
            ->where('product_id', $productId)
            ->where('approval', 1)
            ->get();
        return view('pastries.details',[
            'alsobuy'=>$allNotcartids,
            'uniqueProductIds'=>$product,
            'products'=>$uniqueProductId,
            'productId'=>$productId,
            'reviews'=>$allreviews
        ]);

    }

}
