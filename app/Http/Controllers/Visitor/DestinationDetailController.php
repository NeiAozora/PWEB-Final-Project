<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\TempatWisata;
use Illuminate\Http\Request;

class DestinationDetailController extends Controller
{
   public function index(Request $request){
    return view('visitor-pages.pages.detail-tempat-wisata');
   }

   public function getDestination(Request $request){
    $query = TempatWisata::query()
        ->with([
            'alamat',
            'gambar_tempat_wisata',
            'kategori_wisata.kategori',
            'ulasan',
            'tipe_tiket'
        ]);
    // $query->where('id_tempat_wisata', $request)

    return view('visitor-pages.pages.detail-tempat-wisata', ['namaTempat' => 'Bomo']);
   }
    //
}
