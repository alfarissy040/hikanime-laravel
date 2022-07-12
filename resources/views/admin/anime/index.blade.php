@extends('admin.layout.main')

@section('container')
<div class="pt-3 pb-2 mb-3 container">
    <div class="row">
        <h1>Anime</h1>
    </div>
    @if (session()->has('success'))
        <div class="row my-2 col-lg-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="row my-3">
        <div class="col">
            <a href="/hikamin/anime/create" class="btn btn-primary text-white">Add New Anime</a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-9 d-flex gap-3">
            <!-- filter -->
            <!-- next update menu filter -->
            <!-- <a href="#" role="button" class="btn btn-primary" id="filter">Filter</a> -->
            <!-- end filter -->
            <div class="input-group">
                <button
                    class="navbar-toggler position-absolute d-md-none collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="search" onkeyup="cari()"/>
            </div>
        </div>
    </div>
    <!-- bagian dari filter -->
    <!-- <div class="row mb-3" id="filterItems">
        <div class="col-lg-9">asd</div>
    </div> -->
    <!-- end bagian filter -->
    <div class="row">
        <div class="col-lg-9 table-warper position-relative">
                <table class="table table-striped table-sm text-white" id="table">
                    <thead class="sticky-top bg-primary">
                        <tr>
                            <th scope="col"><a href="#" role="button" class="text-decoration-none text-white px-2" name="title">Title</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white" name="episode">Episode</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white" name="status">Status</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white">Menu</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animes as $anime)
                        <tr class="align-middle text-white">
                            <td class="col-lg-8 px-2">{{ $anime->judul }}</td>
                            <td class="col text-center">{{ $anime->episode->count() }}/{{ $anime->total_episode }}</td>
                            <td class="col text-center">{{ $anime->status }}</td>
                            <td class="col text-center">
                                <div class="dropdown">
                                    <a href="#" class="text-white text-decoration-none py-1 px-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> : </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}">Show</a></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/edit">Edit</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/episode/create">Add Episode</a></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/episode">Show Episode</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/batch/create">Add Batch</a></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/batch/show">Show Batch</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <form action="/hikamin/anime/{{ $anime->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <li><button class="btn dropdown-item peringatan" onclick="return confirm('Are you sure delete this Post?');">Delete Anime</button></li>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection