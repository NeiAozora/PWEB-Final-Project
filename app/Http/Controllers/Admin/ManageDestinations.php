<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempatWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManageDestinations extends Controller
{
    public function index(Request $request){

        $destinations = TempatWisata::query()
        ->with([
            'alamat',
            'gambar_tempat_wisata',
        ]);

        if(Auth::user()->id_role == 3){
            $destinations->where('id_pengguna', Auth::user()->id_pengguna);
        }

        $destinations = $destinations->get();
        $destinations =  $destinations->map(function ($destination) {

            $gambar = optional($destination->gambar_tempat_wisata->first())->url_gambar ?? 'https://placehold.co/286x198.png?text=No+Image';

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


    public function indexEditDestination(Request $request, $id){
        if(!is_numeric($id)){
            return back('404');
        }

        $query = TempatWisata::query()
        ->with([
            'alamat',
            'gambar_tempat_wisata',
            'kategori_wisata.kategori',
            'fasilitas',
            'tipe_tiket.hari',
        ]);

        if(Auth::user()->id_role == 3){
            $query->where('id_pengguna', Auth::user()->id_pengguna);
        }

        $destination = $query->where('id_tempat_wisata', $id)->get();

        if (empty($destination->toArray())){
            return back(404);
        }

        // dd($destination);

        return view('admin-pages.pages.buat-edit-tempat-wisata', ['isEditMode' => true, 'destination' => $destination[0]]);
    }


    public function indexAddDestination(Request $request){
        return view('admin-pages.pages.buat-edit-tempat-wisata', ['isEditMode' => false]);

    }

    public function deleteDestination($id)
    {
        // Cari data berdasarkan ID
        $destination = TempatWisata::find($id);

        // Jika data tidak ditemukan, beri respons error
        if (!$destination) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        // Hapus data
        $destination->delete();

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('admin.manage.destination');
    }

    public function create(Request $request){

    }

    public function destroy(Request $request){

    }

    public function store(Request $request){

    }
}
