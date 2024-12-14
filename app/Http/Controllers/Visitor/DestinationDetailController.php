<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\TempatWisata;
use Illuminate\Http\Request;

class DestinationDetailController extends Controller
{

   public function  index(Request $request, $id){
    $query = TempatWisata::query()
    ->with([
        'alamat',
        'gambar_tempat_wisata',
        'kategori_wisata.kategori',
        'fasilitas',
        'ulasan.pengguna', // Direct relationship
        'tipe_tiket.hari',
    ]);

    $result = $query->where('id_tempat_wisata', $id)->get();

    if (empty($result->toArray())){
        return back(404);
    }

    return view('visitor-pages.pages.detail-tempat-wisata', ['destination' => $result[0]]);
   }
    //
}
