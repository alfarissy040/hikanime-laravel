@extends('layout.main')
@section('container')
<div class="dark-barier"></div>
        <main class="bg-light overflow-hidden">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-lg">
                            <div class="video zindex-tooltip">
                                <video
                                    id="my-video"
                                    class="video-js z-3"
                                    controls
                                    preload="auto"
                                    height="480"
                                    poster="MY_VIDEO_POSTER.jpg"
                                    data-setup="{}">
                                    <source src="{{ $episode->video_480p }}" type="video/mp4" id="video"/>
                                    <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    </p>
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 d-flex justify-content-center gap-2 my-1">
                            <a href="#" class="btn btn-primary" id="resolusi_360" role="button" onclick="gantiSource('{{ $episode->video_360p }}')">
                                360p
                            </a>
                            <a href="#" class="btn btn-primary" id="resolusi_480" role="button" onclick="gantiSource('{{ $episode->video_480p }}')">
                                480p
                            </a>
                            <a href="#" class="btn btn-primary" id="resolusi_720" role="button" onclick="gantiSource('{{ $episode->video_720p }}')">
                                720p
                            </a>
                            <a id="btnFocus" role="button" class="btn btn-danger z-3">Cinema Off</a>
                        </div>
                    </div>
                    <div class="row my-3 px-5">
                        <div class="col">
                            <a href="/hikamin/anime/{{ $anime->slug }}/episode" role="button" class="btn btn-success">Back</a>
                            <a href="/hikamin/anime/{{ $anime->slug }}/episode/{{ $episode->slug }}/edit" role="button" class="btn btn-warning">Edit</a>
                            <form action="/hikamin/anime/{{ $anime->slug }}/episode/{{ $episode->slug }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="row px-5 py-2 mb-4">
                        <div class="row mb-2">
                            <h3>Streaming Anime {{ $episode->episode }}</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="list-group position-relative" style="overflow-y: scroll; max-height: 400px">
                                    @foreach ($all_episode as $a_episode)
                                        <a href="/hikamin/anime/{{ $anime->slug }}/episode/{{ $a_episode->slug }}" class="list-group-item list-group-item-action {{ $a_episode->slug == $episode->slug? 'active':'' }}">{{ $anime->judul. " ". $a_episode->episode }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if ($links->count() >= 1)
                            <div class="row mt-3">
                                <h3 class="border-bottom border-primary pb-2">Download Anime</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg table-responsive">
                                    <table class="table my-2">
                                        <tr>
                                            <td class="py-0" colspan="6"><h4>Anime {{ $episode->episode }}</h4></td>
                                        </tr>
                                            @foreach ($links as $link)
                                                <tr class="text-center">
                                                    <td class="col-sm-1 align-middle bg-primary text-white">{{ $link->resolusi }}</td>
                                                    <td class="col-sm-1 align-middle">
                                                        <a href="{{ $link->g_drive }}" class="btn p-0 {{ $link->g_drive != null ? '':'disabled' }}">Google Drive</a>
                                                    </td>
                                                    <td class="col-sm-1 align-middle">
                                                        <a href="{{ $link->g_share }}" class="btn p-0 {{ $link->g_share != null ? '':'disabled' }}">Google Share</a>
                                                    </td>
                                                    <td class="col-sm-1 align-middle">
                                                        <a href="{{ $link->acefile }}" class="btn p-0 {{ $link->acefile != null ? '':'disabled' }}">Acefile</a>
                                                    </td>
                                                    <td class="col-sm-1 align-middle">
                                                        <a href="{{ $link->mega }}" class="btn p-0 {{ $link->mega != null ? '':'disabled' }}">Mega</a>
                                                    </td>
                                                    <td class="col-sm-1 align-middle">
                                                        <a href="{{ $link->mirror }}" class="btn p-0 {{ $link->mirror != null ? '':'disabled' }}">Mirror</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
@endsection