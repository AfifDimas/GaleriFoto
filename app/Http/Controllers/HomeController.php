<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Album;
use App\Models\Foto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albumshow = Album::orderBy('created_at', 'desc')->limit(7)->get();
        $foto = Foto::orderBy('created_at', 'desc')->limit(12)->get();

        return view('dashboard', [
            'albumshow' => $albumshow,
            'fotos' => $foto,
            'albums' => Album::all(),
            'jmlFoto' => Foto::count(),
            'jmlAlbum' => Album::count()
        ]);
    }
}
