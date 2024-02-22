@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header fw-bold">Album</div>
                <div class="card-body">
                    <h3>{{ $album->name }}</h3>
                    <p>{{ $album->deskripsi }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header fw-bold">Menu Cepat</div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-primary">Edit Album</button>

                            </td>
                            <td>
                                <form action="{{ route('album.hapus', ['id' => $album->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Yakin Ingin Menghapus Album Ini')">Hapus Album</button>
                                </form>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header fw-bold">Foto</div>
                <div class="card-body">
                    @if ($fotos->count())
                        <div class="row text-center">
                            @foreach ($fotos as $foto)
                                <div class="col-md-3 mb-3">
                                    <div class="card ">
                                        <a class="text-decoration-none" onclick="fotoDetail({{ $foto->id }})">
                                            <img src="/img/{{ $foto->name }}" class="card-img-top rounded" alt="...">
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-4">Folder Kosong.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
