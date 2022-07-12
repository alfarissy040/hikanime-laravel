@extends('layout.main')
@section('container')
<div class="container">
    <div class="container">
        <div class="row">
            <h2 class="border-bottom border-primary py-2 mb-3">Semua Genre</h3>
        </div>
        <div class="row">
            @foreach ($genres as $genre)
                <div class="col-lg-4 mb-3">
                    <a href="/genre/{{ $genre->slug }}" class="text-decoration-none text-dark">{{ $genre->nama }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection