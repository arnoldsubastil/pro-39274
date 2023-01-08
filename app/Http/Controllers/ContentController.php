<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContentController extends Controller
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
        $content = DB::table('sitecontent')
            ->select('bannerimage', 'page_content')
            ->where('titlepage', 'about')
            ->get();

        return view('about', [
            'content'=>$content
        ]);
    }

    public function showannoucement(){
        $content = DB::table('sitecontent')
            ->select('bannerimage', 'page_content')
            ->where('titlepage', 'announcement')
            ->get();

        return $content;

    }
}
