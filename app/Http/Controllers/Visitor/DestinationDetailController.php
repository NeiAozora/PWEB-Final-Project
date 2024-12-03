<?php

namespace App\Http\Controllers\VisitorPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationDetailController extends Controller
{
   public function index(Request $request){
    return view('visitor-pages.pages.detail-tempat-wisata');
   }
    //
}
