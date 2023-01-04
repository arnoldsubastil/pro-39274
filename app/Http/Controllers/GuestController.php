<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = DB::table('sitecontent')
            ->select('contentID', 'titlepage', 'page_content', 'bannerimage')
            ->where('contentID', 1)
            ->get();

            $bestsellersList = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'sellingPrice', 'thumbnailUrl', 'url')
            ->where('bestseller', 1)
            ->get(); 

            $uniqueProductId = DB::table('products')
            ->select('product_id', 'categories', 'foreignName', 'name', 'productDescription', 'productIdlong', 'productOptions', 'productSize', 'sellingPrice', 'thumbnailUrl', 'url')
            ->orderByDesc('product_id')
            ->take(1)
            ->get(); 

        return view('home', [
            'banner'=>$banner[0],
            'products' => $bestsellersList,
            'newproduct' => $uniqueProductId[0]
        ]);
    }
}
