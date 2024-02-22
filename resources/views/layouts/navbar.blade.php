<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name', 'laravel') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('foto*') ? 'active' : '' }}" href="{{ route('foto') }}">Foto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('album*') ? 'active' : '' }}" href="{{ route('album') }}">Album</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <a href="{{ route('logout') }}" class="btn btn-danger" >logout</a>
        </form>
      </div>
    </div>
  </nav>