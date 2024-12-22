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
        'sosial_media.platform'
    ]);

    $result = $query->where('id_tempat_wisata', $id)->get();

    // dd($result);

    $sosialMedia = [
        'Whatsapp' => null,
        'Instagram' => null,
        'Tiktok' => null,
        'Youtube' => null,
        'Website' => null,
    ];

    foreach ($result as $tempatWisata) {
        foreach ($tempatWisata->sosial_media as $s) {
            $sosialMedia[$s->platform->nama_platform] = $s->link_sosial_media;
        }
    }



    if (empty($result->toArray())){
        return back(404);
    }

    // dd($result);

    return view('visitor-pages.pages.detail-tempat-wisata', ['destination' => $result[0]], compact('sosialMedia'));
   }
    //
}
