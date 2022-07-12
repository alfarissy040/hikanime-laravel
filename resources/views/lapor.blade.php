@extends('layout.main')
@section('container')
<div class="container mb-4">
    @if (session()->has('success'))
    <div class="row my-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="row">
        <h2 class="border-bottom border-2 border-primary py-2 mb-3">Lapor Link Rusak</h3>
    </div>
    <form action="/report-link" method="post">
        @csrf
        <div class="row">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Anime</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Judul Anime" value="{{ old('title') }}" name="title" required>
                @error('title')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="episode" class="form-label">Episode</label>
                <input type="text" class="form-control  @error('episode') is-invalid @enderror" id="episode" placeholder="Episode" value="{{ old('episode') }}" name="episode" required>
                @error('episode')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="msg" class="form-label">Pesan Anda</label>
                <textarea class="form-control  @error('msg') is-invalid @enderror" id="msg" rows="3" placeholder="Pesan Anda" value="{{ old('msg') }}" name="msg" required></textarea>
                @error('msg')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary float-end px-4">Kirim</button>
            </div>
        </div>
    </form>
</div>
@endsection