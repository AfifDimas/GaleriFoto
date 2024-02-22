<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="canonical" href="/css/sigin.css">





    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-25 m-auto mt-5 ">
        <form class="border border-secondary-subtle shadow border-2 rounded p-4" method="post"
            action="{{ route('login.proses') }}">
            @csrf
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                class="bi bi-camera2" viewBox="0 0 16 16">
                <path d="M5 8c0-1.657 2.343-3 4-3V4a4 4 0 0 0-4 4" />
                <path
                    d="M12.318 3h2.015C15.253 3 16 3.746 16 4.667v6.666c0 .92-.746 1.667-1.667 1.667h-2.015A5.97 5.97 0 0 1 9 14a5.97 5.97 0 0 1-3.318-1H1.667C.747 13 0 12.254 0 11.333V4.667C0 3.747.746 3 1.667 3H2a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1h.682A5.97 5.97 0 0 1 9 2c1.227 0 2.367.368 3.318 1M2 4.5a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0M14 8A5 5 0 1 0 4 8a5 5 0 0 0 10 0" />
            </svg>
            <h1 class="h3 mb-3 fw-normal">Login Galeri Foto</h1>

            <div class="form-floating mb-2">
                <input type="email" class="form-control border" id="email" name="email"
                    placeholder="name@example.com">
                <label for="email">Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control border" id="password" name="password"
                    placeholder="Password">
                <label for="password">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; Afif Dimas Yusnanda {{ now()->year }}</p>
            <a href="{{ route('register') }}">Register</a>
        </form>
    </main>



</body>

</html>
