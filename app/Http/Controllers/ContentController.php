<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FaqController extends Controller
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
            ->get();


        return view('faq.index', [
            'content'=>$content
        ]);
    }
}
