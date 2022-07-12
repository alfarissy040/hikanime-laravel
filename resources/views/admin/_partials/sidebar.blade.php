<div class="col">
    <div class="row">
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
            <a href="/" class="py-2 text-white text-decoration-none fs-4 px-4"> Hika<span class="text-dark fw-bold">nime</span> </a>
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>
    </div>
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3 p-3 h-100 d-lg-flex justify-content-lg-between flex-lg-column d-md-flex justify-content-md-between flex-md-column">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/hikamin/" class="nav-link text-white {{ Request::is('hikamin') ? 'active':'' }}" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home" /></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/hikamin/anime" class="nav-link text-white {{ Request::is('hikamin/anime*') ? 'active':'' }}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2" /></svg>
                            Anime
                        </a>
                    </li>
                    <li>
                        <a href="/hikamin/batch" class="nav-link text-white {{ Request::is('hikamin/batch*') ? 'active':'' }}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table" /></svg>
                            Batch
                        </a>
                    </li>
                    <li>
                        <a href="/hikamin/report" class="nav-link text-white {{ Request::is('hikamin/report*') ? 'active':'' }}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid" /></svg>
                            Report List
                        </a>
                    </li>
                </ul>
                <hr />
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="" alt="" width="32" height="32" class="rounded-circle me-2" />
                        <strong>{{ auth()->user()->email }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <form action="/hikamin/logout" method="post">
                            @csrf
                            <li><button class="btn dropdown-item">Sign Out</button></li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>