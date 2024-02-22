<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;

class AlbumController extends Controller
{
    
    public function index()
    {
        return view('album.index', [
            'albums' => Album::all()
        ]);
    }

    public function show($id_album)
    {
        $album = Album::find($id_album);
        $fotos = Foto::where('album', 'LIKE', "%$album->name%")->get();
        return view('album.show', [
            'album' => $album,
            'fotos' => $fotos,
            'albums' => Album::all()
        ]);
    }

    public function tambah(Request $request) {
        $upload = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'userId' => Auth()->user()->id,
        ];

        Album::create($upload);

        return redirect()->route('dashboard')->with('success', 'Album Baru Telah Ditambahkan');
    }

    public function hapus($id) {
        Album::where('id', $id)->delete();
        return redirect()->route('dashboard')->with('success', 'Anda Telah Menghapus Satu Album');
    }

}
