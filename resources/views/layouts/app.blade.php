<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar">
        @include('layouts.navbar')

    </div>
    <div id="app" class="mt-5">


        <main class="py-4">
            <div class="container-fluid">

                @yield('content')
            </div>
        </main>
    </div>

    {{-- modal logout --}}
    <div class="modal fade" id="detailFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal foto-->
    <div class="modal fade modal-lg" id="modalDetailFoto" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel modal-title">Detail Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <img class="w-100" id="viewImg" src="" alt="">
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>
                                            <h5>Properti</h5>
                                        </td>
                                        <td>
                                            <form action="{{ route('foto.hapus') }}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="idFoto1" id="idFoto1" value="">
                                                <button class="btn ms-2 btn-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus Foto Ini')">Hapus foto</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>


                                <hr>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Nama File</td>
                                            <td>:</td>
                                            <td id="nama_file"></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td id="deskripsi"></td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi Foto</td>
                                            <td>:</td>
                                            <td id="lokasi"></td>
                                        </tr>
                                        <tr>
                                            <td>Album</td>
                                            <td>:</td>
                                            <td id="album"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <form id="MenuDetail" action="{{ route('foto.hapus-album') }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <input type="hidden" name="idFoto" id="idFoto" value="">
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Yakin Ingin Menghapus Foto Ini Dari Album')">Hapus
                                                        dari album</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @if (Request::is('album*'))
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <p class="mt-2">Tambahkan Ke Album</p>
                                                    <form action="{{ route('foto.tambah-album') }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <input type="hidden" name="idFoto2" id="idFoto2"
                                                            value="">
                                                        <select name="album" id="album" class="form-control">
                                                            @foreach ($albums as $album)
                                                                <option value="{{ $album->name }}">
                                                                    {{ $album->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <button class="btn btn-primary mt-2"
                                                            onclick="return confirm('Yakin Ingin MEnambahkan Foto Ini ke Album Tersebut')">tambah</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if (Request::is('album*'))
                    @else
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- modal album baru --}}
    <div class="modal fade" id="modalTambahFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('foto.tambah') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file">
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="album" class="form-label">Album</label>
                                <select type="text" class="form-control @error('album') is-invalid @enderror"
                                    id="album" name="album">
                                    <option value="-">-</option>
                                    @foreach ($albums as $album)
                                        @if (old('album') == $album->name)
                                            <option value="{{ $album->name }}" selected>{{ $album->name }}</option>
                                        @else
                                            <option value="{{ $album->name }}">{{ $album->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('album')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah foto --}}
    <div class="modal fade" id="modalAlbumbaru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Album Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('album.tambah') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Album</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.js"></script>


    <script>
        function bukaModalDetail() {
            $('#modalDetailFoto').modal('show');
        }

        function bukaModalTambahFoto() {
            $('#modalTambahFoto').modal('show');
        }

        function bukaModalAlbumbaru() {
            $('#modalAlbumbaru').modal('show');
        }

        function fotoDetail(id) {
            var id = id;
            $('#nama_file').text('');
            $('#deskripsi').text('');
            $('#viewImg').attr('src', '');
            $('#lokasi').text('');
            $('#album').text('');
            $('#idFoto').val('');
            $('#idFoto1').val('');
            $('#idFoto2').val('');
            $('#idFoto3').val('');


            $.ajax({
                type: 'get',
                url: "{{ url('foto/detail') }}" + "/" + id,
                data: {
                    id: id,
                },
                success: function(response) {
                    $('#nama_file').text(response['0'].name);
                    $('#deskripsi').text(response['0'].deskripsi);
                    $('#viewImg').attr('src', '/img/' + response['0'].name);
                    $('#lokasi').text(response['0'].lokasi_foto);
                    $('#album').text(response['0'].album);
                    $('#idFoto').val(id);
                    $('#idFoto1').val(id);
                    $('#idFoto2').val(id);
                    $('#idFoto3').val(id);
                    bukaModalDetail();
                },
                error: function(response) {
                    $('#modal-title').val('Data Tidak Ditemukan')
                    bukaModalDetail();
                    console.log(response)
                }
            });


            // [{"name":"1.png","deskripsi":"Foto Pertama","lokasi_foto":"kmn","album":"favorit","userId":1,"created_at":null,"updated_at":null}]

        }

        function handleTambahFoto() {
            bukaModalTambahFoto()
        }

        function albumBaru() {
            bukaModalAlbumbaru()
        }
    </script>

</body>

</html>
