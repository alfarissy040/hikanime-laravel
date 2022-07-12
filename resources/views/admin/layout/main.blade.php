<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="/css/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">

    {{-- Sidebar Css --}}
    <link rel="stylesheet" href="/css/sidebars.css">

    {{-- my css --}}
    <link rel="stylesheet" href="/css/admin.css">

    <!-- dashboard style -->
    <link rel="stylesheet" href="/css/dashboard.css" />

    <title>Admin Hikanime</title>
</head>
<body>
    <div class="container-fluid" style="background: rgba(34,34,34,1)">
        <div class="row">
            @include('admin._partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-gelapan text-white">
                @yield('container')
            </main>
        </div>
    </div>

    {{-- Jquery --}}
    <script src="/js/jquery-3.5.1.min.js"></script>

    {{-- bootstrap Js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    <script src="/css/bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js"></script>

    {{-- sidebar js --}}
    <script src="/js/sidebars.js"></script>

    {{-- dashboard js --}}
    <script src="/js/dashboard.js"></script>

    {{-- search script --}}
    <script>
        function cari() {
            var table, td, tr, search, i, txtValue, filter;

            search = document.querySelector("#search");
            filter = search.value.toUpperCase();
            table = document.querySelector("#table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.innerText || td.textcontent;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // next Update Sort table by thead

        // function sortByTitle(){
        //     const title = document.querySelector('#title')

        //     title.addEventListener('click', function() {
        //         fetch('/hikamin/anime/sortby?' + title.value)
        //             .then(response => response.json())
        //             .then(data => slug.value = data.slug);
        //     });

        //     document.addEventListener('trix-file-accept', (e) => {
        //         e.preventDefault();
        //     });
        // }
    </script>

    @yield('script')
</body>
</html>