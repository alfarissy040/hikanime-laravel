@extends('admin.layout.main')

@section('container')
    <div class="pt-3 pb-2 mb-3 container overflow-auto">
        <div class="row">
            <h1>Edit Episode</h1>
        </div>
        <div class="row my-4">
            <div class="col-lg-8">
                <form method="post" action="/hikamin/anime/{{ $anime->slug }}/episode" class="mb-5">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="episode" class="form-label fs-5">Episode</label>
                        <input type="text" class="form-control @error('episode') is-invalid @enderror" id="episode" name="episode" required autofocus value="{{ old('episode') == null? $episode->episode:old('episode') }}" />
                        @error('episode')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label fs-5">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') == null? $episode->slug:old('slug') }}" />
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="video_360p" class="form-label fs-5">Video 360p</label>
                        <input type="text" class="form-control @error('video_360p') is-invalid @enderror" id="video_360p" name="video_360p" required value="{{ old('video_360p') == null? $episode->video_360p:old('video_360p') }}" />
                        @error('video_360p')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="video_480p" class="form-label fs-5">Video 360p</label>
                        <input type="text" class="form-control @error('video_480p') is-invalid @enderror" id="video_480p" name="video_480p" required value="{{ old('video_480p') == null? $episode->video_480p:old('video_480p') }}" />
                        @error('video_480p')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="video_720p" class="form-label fs-5">Video 360p</label>
                        <input type="text" class="form-control @error('video_720p') is-invalid @enderror" id="video_720p" name="video_720p" required value="{{ old('video_720p') == null? $episode->video_720p:old('video_720p') }}" />
                        @error('video_720p')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="/hikamin/anime/{{ $anime->slug }}/episode" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary mx-2">Edit Episode</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#episode').on('change', (e) => {
            $.ajax({
                url: '/hikamin/checkEpisode',
                type: 'GET',
                dataType: 'json',
                data: {
                    episode: $('#episode').val(),
                },
                success: function(data) {
                    $('#slug').val(data.Data.slug)
                }
            })
        });
    </script>
@endsection