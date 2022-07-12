@extends('layout.main')
@section('container')
<div class="container">
    <div class="row">
        <h2 class="border-bottom border-2 border-primary py-2 mb-3">List Semua Anime</h3>
    </div>
    <div class="row">
        <div class="col-lg d-flex justify-content-center gap-1 flex-wrap">
            <a href="#" class="btn__list">#</a>
            <a href="#A" class="btn__list">A</a>
            <a href="#B" class="btn__list">B</a>
            <a href="#C" class="btn__list">C</a>
            <a href="#D" class="btn__list">D</a>
            <a href="#E" class="btn__list">E</a>
            <a href="#F" class="btn__list">F</a>
            <a href="#G" class="btn__list">G</a>
            <a href="#H" class="btn__list">H</a>
            <a href="#I" class="btn__list">I</a>
            <a href="#J" class="btn__list">J</a>
            <a href="#K" class="btn__list">K</a>
            <a href="#L" class="btn__list">L</a>
            <a href="#M" class="btn__list">M</a>
            <a href="#N" class="btn__list">N</a>
            <a href="#O" class="btn__list">O</a>
            <a href="#P" class="btn__list">P</a>
            <a href="#Q" class="btn__list">Q</a>
            <a href="#R" class="btn__list">R</a>
            <a href="#S" class="btn__list">S</a>
            <a href="#T" class="btn__list">T</a>
            <a href="#U" class="btn__list">U</a>
            <a href="#V" class="btn__list">V</a>
            <a href="#W" class="btn__list">W</a>
            <a href="#X" class="btn__list">X</a>
            <a href="#Y" class="btn__list">Y</a>
            <a href="#Z" class="btn__list">Z</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            @foreach ($alphabets as $alphabet)
                <div class="row border-1 border-bottom border-primary mb-2">
                    <a name="{{ $alphabet }}" class="h4 text-decoration-none text-primary">{{ $alphabet }}</a>
                </div>
                @foreach ($posts as $post)
                    @if (substr($post->judul, 0 ,1) == $alphabet)
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <a href="/anime/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->judul }}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection