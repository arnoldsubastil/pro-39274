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
        $faq = DB::table('faq')
            ->select('faqID', 'question', 'answer')
            ->orderBy('faqID', 'desc')
            ->get();


        return view('faq.index', [
            'faqs'=>$faq
        ]);
    }
}
