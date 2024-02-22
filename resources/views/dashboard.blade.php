@extends('layouts.app')

@section('content')
    
        <div class="row mb-2">
            <h2>{{ __('Dashboard') }}</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header fw-bold">Album Terbaru</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1 justify-content-start">
                                @foreach ($albumshow as $album)
                                    <a href="{{ route('album.show', ['id' => $album->id]) }}"
                                        class="badge text-bg-primary text-decoration-none mx-2">{{ $album->name }}</a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="card shadow">
                            <div class="card-header fw-bold">Informasi Terbaru</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 justify-content-start">
                                        <p>Jumlah Foto : {{ $jmlFoto }}</p>
                                        <p>Jumlah Album : {{ $jmlAlbum }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header fw-bold">Menu Cepat</div>

                            <div class="card-body">
                                <button onclick="handleTambahFoto()" class="btn btn-primary ms-3">Tambah Foto</button>
                                <button class="btn btn-primary ms-3" onclick="albumBaru()">Album Baru</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header fw-bold">Foto Terbaru</div>
                    <div class="card-body">
                        <div class="row">
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
