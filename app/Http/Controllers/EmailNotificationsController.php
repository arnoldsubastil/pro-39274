<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE

class EmailNotificationsController extends Controller
{
    //
    public function details(){        

        return view('emails.mail');

    }

}
