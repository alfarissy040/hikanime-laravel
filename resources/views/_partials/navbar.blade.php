<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hikanime</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active':'' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('anime-list') ? 'active':'' }}" href="/anime-list">Semua Anime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('genre*') ? 'active':'' }}" href="/genre">Genre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('report-link') ? 'active':'' }}" href="/report-link">Lapor Link Rusak</a>
                </li>
            </ul>
            <form action="/search" method="get" class="d-flex">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" name="search" />
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>