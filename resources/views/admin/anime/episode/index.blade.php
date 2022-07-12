@extends('admin.layout.main')

@section('container')
<div class="pt-1 pb-2 mb-3 container">
    <div class="row">
        <h1>Episodes</h1>
    </div>
    <div class="row my-3">
        <div class="col">
            <a href="/hikamin/anime" role="button" class="btn btn-success text-white">Back</a>
            <a href="/hikamin/anime/{{ $anime->slug }}/episode/create" role="button" class="btn btn-primary text-white">Add New Episode</a>
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
                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="search" onkeyup="cari()" />
            </div>
        </div>
    </div>
    <!-- bagian dari filter -->
    <!-- <div class="row mb-3" id="filterItems">
        <div class="col-lg-9">asd</div>
    </div> -->
    <!-- end bagian filter -->
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-striped table-sm text-white" id="table">
                <thead class="sticky-top bg-primary">
                    <tr>
                        <th scope="col"><a href="#" role="button" class="text-decoration-none text-white px-2">Episode</a></th>
                        <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white">Menu</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($episodes as $episode)
                        <tr class="align-middle text-white">
                            <td class="col-lg-10 px-2">{{ $episode->episode }}</td>
                            <td class="col text-center">
                                <div class="dropdown">
                                    <a href="#" class="text-white text-decoration-none py-1 px-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> : </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $episode->anime->slug }}/episode/{{ $episode->slug }}">Show</a></li>
                                        <li><a class="dropdown-item" href="/hikamin/anime/{{ $anime->slug }}/episode/{{ $episode->slug }}/edit">Edit</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <form action="/hikamin/anime/{{ $anime->slug }}/episode/{{ $episode->slug }}" method="post">
                                            @method('DELETE')
                                            <li><button class="btn dropdown-item peringatan" onclick="return confirm('Are you sure DELETE this episode?')">Delete Episode</button></li>
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