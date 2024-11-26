<?php

namespace App\Http\Controllers\VisitorPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request){
        return view('visitor-pages.pages.homepage');
    }
}
