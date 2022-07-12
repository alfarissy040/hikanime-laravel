@extends('layout.main')
@section('container')
<div class="row px-4 pb-4 mx-0 mb-5">
    <div class="col-lg-9">
        <h3 class="my-3">{{ $title }}</h3>
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#">
                                        <img src="https://source.unsplash.com/500x300/?sakura" class="img-fluid rounded-start" alt="..." />
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="#" class="text-decoration-none text-dark">{{ $post->judul }}</a></h5>
                                        <p class="card-text mb-1">{{ $post->excerpt }} <a href="#" class="text-decoration-none">Selengkapnya</a></p>
                                        <p class="card-text mb-1 mt-0">Genre : {{ $post->genre }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        @else
            <h1 class="text-secondary">{{ $notFound }}</h1>
        @endif
        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
        
        <div class="row">
            <h3 class="my-3">Anime Rekomendasi</h3>
        </div>
        <div class="row">
            @foreach ($recomended as $recom)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/350x200/?japan" class="card-img-top" alt="...">
                        <div class="card-body py-1 px-2">
                            <p class="card-text">{{ $recom->judul }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3 list-unstyled mt-5">
        <ol class="list-group list-group-numbered sticky-top">
            <h5 class="list-group-item align-items-start mb-0 bg-primary text-white">Anime Ongoing</h3>
            @foreach ($anime_ongoing as $ongoing)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $ongoing->judul }}</div>
                        Episode 01
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</div>
@endsection