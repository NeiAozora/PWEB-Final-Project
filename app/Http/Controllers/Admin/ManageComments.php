<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class ManageComments extends Controller
{
    public function index(Request $request){

        $comments = Ulasan::query()
        ->with([
            'pengguna',
            'tempat_wisata', 
        ])->get();

        $comments =  $comments->map(function ($comment) use ($comments) {

            return (object) [
                'id' => $comment->id_ulasan,
                'rating' => $comment->nilai_rating,
                'komentar' => $comment->isi_komentar,
                'total' => $comments->count(),
                'tempat_wisata' => $comment->tempat_wisata,
                'pengguna' => $comment->pengguna
            ];
        });

        return view('admin-pages.pages.kelola-ulasan', ['comments' => $comments]);
    }

    public function deleteComment(Request $request, $id){
        $comment = Ulasan::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.manage.comment');
    }

    public function create(Request $request){

    }

    public function destroy(Request $request){

    }

    public function store(Request $request){

    }
}
