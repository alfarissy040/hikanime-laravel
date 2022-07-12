@extends('layout.main')
@section('container')
<div class="row mx-0">
    <div class="col-lg px-0" style="height: 500px">
        @if ($posts->img_bg)
            <img src="/{{ $posts->img_bg }}" alt="{{ $posts->judul }}" class="images img-fluid" style="object-fit: cover; width: 100%; height: 100%" />
        @else
            <img src="https://source.unsplash.com/1080x480/?japan" alt="" class="images img-fluid" style="object-fit: cover; width: 100%; height: 100%" />
        @endif
    </div>
</div>
<div class="row mx-0" style="margin-top: -20px">
    <div class="col mx-5">
        <h3 class="px-3 py-1 text-white bg-primary d-inline">{{ $posts->judul }}</h3>
    </div>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg">
            <p>{!! $posts->deskripsi !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col table-responsive">
            <table class="table">
                <tr>
                    <td class="col-md-2">Judul</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->judul }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Judul Alternatif</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->alter_judul }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Produser</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->produser }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Studio</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->studio }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Genre</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->genre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Skor</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->skor }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Tipe</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->tipe }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Status</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->status }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Total Episode</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->total_episode }}</td>
                </tr>
                <tr>
                    <td class="col-md-2">Durasi</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ $posts->durasi }} Menit</td>
                </tr>
                <tr>
                    <td class="col-md-2">Tanggal Rilis</td>
                    <td class="px-0 mx-0 text-center">:</td>
                    <td>{{ date('M d, Y', strtotime($posts->tanggal_rilis)); }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <h3 class="border-bottom border-primary pb-2">Download Anime</h3>
    </div>
    <div class="row">
        <div class="col-lg table-responsive">
            <table class="table my-2">
                @foreach ($batchs as $batch)
                    <tr>
                        <td class="py-0" colspan="6"><h4>{{ $batch->judul }}</h4></td>
                    </tr>
                    @foreach ($batch->Link as $link)
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
                @endforeach
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <h3 class="border-bottom border-primary pb-2">Streaming Anime</h3>
    </div>
    <div class="row mb-4">
        <div class="col-lg">
            <div class="list-group">
                @foreach ($episodes as $episode)
                    <a href="/anime/{{ $posts->slug }}/{{ $episode->slug }}" class="list-group-item list-group-item-action">Anime {{ $episode->episode }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection