<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempatWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDestinationController extends Controller
{
    public function index(Request $request){

        $tempatWisata = TempatWisata::query()
        ->with([
            'alamat',
            'gambar_tempat_wisata',
        ]);

        if(Auth::user()->id_role == 3){
            $tempatWisata->where('id_pengguna', Auth::user()->id_pengguna);
        }

        $destination = $tempatWisata->get();

        $destinations =  $destination->map(function ($destination) {

            return (object) [
                'id' => $destination->id_tempat_wisata,
                'nama' => $destination->nama,
                'alamat' => optional($destination->alamat)->jalan . ', ' . optional($destination->alamat)->kota,
                'gambar' => optional($destination->gambar_tempat_wisata->first())->url_gambar ?? 'https://placehold.co/286x198.png?text=No+Image',
                'rating_rata_rata' => round($destination->ulasan->avg('nilai_rating'), 1) ?? 0
            ];
        });



        return view('admin-pages.pages.kelola-tempat-wisata', ['destinations' => $destinations]);
    }

        public function deleteDestination(Request $request){
        dd($request);

    }

}
