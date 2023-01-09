<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = DB::table('sitecontent')
            ->select('contentID', 'titlepage', 'page_content', 'bannerimage')
            ->where('titlepage', 'banner')
            ->orderByDesc('contentID')
            ->get();

        $about = DB::table('sitecontent')
            ->select('contentID', 'titlepage', 'page_content', 'bannerimage', 'maintitle', 'subtitle')
            ->where('contentID', 10)
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
        return view('homelogin', [
            'banner'=>$banner,
            'products' => $bestsellersList,
            'newproduct' => $uniqueProductId[0],
            'about' => $about
        ]);
    }
}
