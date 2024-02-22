<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class FotoController extends Controller
{
    public function index()
    {
        return view('foto.index', [
            'fotos' => Foto::orderBy('created_at', 'desc')->get(),
            'albums' => Album::all(),
        ]);
    }

    public function detail($id)
    {
        $foto  = Foto::where('id', $id)->get();
        return response()->json($foto);
    }

    public function tambah(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|image|mimes:jpg,png,jpeg',
        //     'deskripsi' => 'required|max:225',
        //     'album' => 'required',
        // ]);

        // dd($validateData);
        $file = $request->file('file');
        // dd($file);
        
        $nama = date('YmdHis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/img'), $nama);
        
        // dd($request->userId);
        $upload = [
            'name' => $nama,
            'deskripsi' => $request->deskripsi,
            'album' => $request->album,
            'lokasi_foto' => '/img/',
            'userId' => auth()->user()->id,
        ];

        Foto::create($upload);


        return redirect()->route('dashboard')->with('success', 'Foto Baru Telah Ditambahkan');

        // return response()->width($request);
    }

    public function hapusAlbum(Request $request) 
    {
        $foto = Foto::find($request->idFoto);
        $data = [
            'name' => $foto->name,
            'deskripsi' => $foto->deskripsi,
            'album' => '-',
            'lokasi_foto' => $foto->lokasi_foto,
            'userId' =>  $foto->userId,
        ];
        Foto::where('id' ,$request->idFoto)->update($data);

        return redirect()->route('dashboard')->with('success', 'Foto Berhasil Dihapus Dari Album');
    }

    public function tambahkeAlbum(Request $request) {
        $foto = Foto::find($request->idFoto2);
        $data = [
            'name' => $foto->name,
            'deskripsi' => $foto->deskripsi,
            'album' => $foto->album . '|'. $request->album,
            'lokasi_foto' => $foto->lokasi_foto,
            'userId' =>  $foto->userId,
        ];
        if($foto->album == "-") {
            $data['album'] = '|'. $request->album;
        }

        Foto::where('id' ,$request->idFoto2)->update($data);

        return redirect()->route('dashboard')->with('success', 'Foto Berhasil ditambahkan Ke Album');
    }

    public function hapus(Request $request)
    {
        $foto = Foto::where('id', $request->idFoto1)->get();
        Storage::delete($foto->name);
        Foto::where('id', $foto->id)->delete();

        return redirect()->route('dashboard')->with('success', 'Foto Berhasil Dihapus');
    }
}
