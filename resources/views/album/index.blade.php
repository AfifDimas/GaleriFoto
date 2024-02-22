@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="text-end mb-3 pe-3">
                    <button class="btn btn-primary ms-3" onclick="albumBaru()">Album Baru</button>
                </div>
                <div class="card shadow">
                    <div class="card-header fw-bold">Daftar Album</div>
                    <div class="card-body">
                        <div class="row text-center">
                            @foreach ($albums as $album)
                                <div class="col-md-3 mb-1">
                                    <a href="{{ route('album.show', ['id' => $album->id]) }}"
                                        class="badge text-bg-primary text-decoration-none">{{ $album->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
