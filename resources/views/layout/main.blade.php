<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <!-- my Style -->
        <link rel="stylesheet" href="/css/style.css" />

        {{-- videojs css --}}
        <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />

        <title>Hikanime | {{ $head_title }}</title>
    </head>
    <body>
        @include('_partials.navbar')
        <main class="bg-light">
            @yield('container')
        </main>
        @include('_partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        {{-- video js  --}}
        <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
        {{-- jquery --}}
        <script src="/js/jquery-3.5.1.min.js"></script>
        {{-- my javaScript --}}
        <script src="/js/main.js"></script>
    </body>
</html>
