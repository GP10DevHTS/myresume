<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function sendContactForm(Request $request){
         return $successMessage = 'OK';
    }
}
