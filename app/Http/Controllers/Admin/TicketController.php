<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function indexKelolaTiket(){
        return view('admin-pages.pages.kelola-tiket');
    }

    public function indexKonfirmasiTiket(){
        return view('admin-pages.pages.detail-tiket');
    }
}
