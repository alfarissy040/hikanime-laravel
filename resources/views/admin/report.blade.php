@extends('admin.layout.main')

@section('container')
<div class="pt-3 pb-2 mb-3 container overflow-auto">
    <div class="row">
        <h1>Report List</h1>
    </div>
    <div class="row my-3">
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
        <div class="col-lg-9 position-relative">
                <table class="table table-striped table-sm text-white" id="table">
                    <thead class="sticky-top bg-primary">
                        <tr>
                            <th scope="col"><a href="#" role="button" class="text-decoration-none text-white px-2" name="title">Title</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white" name="episode">Episode</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white" name="episode">Status</a></th>
                            <th scope="col" class="text-center"><a href="#" role="button" class="text-decoration-none text-white">Menu</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reported as $report)
                        <tr class="align-middle text-white">
                            <td class="col-lg-8 px-2">{{ $report->title }}</td>
                            <td class="col text-center">{{ $report->episode }}</td>
                            <td class="col text-center {{ $report->status == 'solved'? 'text-success':'text-danger' }}">{{ $report->status }}</td>
                            <td class="col text-center">
                                <div class="dropdown">
                                    <a href="#" class="text-white text-decoration-none py-1 px-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> : </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="/hikamin/report/{{ $report->slug }}">Show</a></li>
                                        <form action="/hikamin/report/{{ $report->slug }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="solved">
                                            <li><button class="dropdown-item btn btn-success">Solved</button></li>
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