<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $idUser = $user->id_pengguna;

        $ulasan = Ulasan::where('id_pengguna', $idUser)->get();
        return view('visitor-pages.pages.profile',['pengguna' => $user, 'ulasans' => $ulasan]);
    }
}
