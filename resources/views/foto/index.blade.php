@extends('layouts.app')

@section('content')
    
        <div class="row">
            <div class="col-md-12">
                <div class="text-end mb-3 pe-3">
                    <button onclick="handleTambahFoto()" class="btn btn-primary">Tambah
                        Foto</button>
                </div>
                <div class="card shadow">
                    <div class="card-header fw-bold">Semua Foto</div>
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    


@endsection
