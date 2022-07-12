@extends('admin.layout.main')

@section('container')
    <div class="pt-3 pb-2 mb-3 container overflow-auto">
        <div class="row">
            <h1>Add New Anime</h1>
        </div>
        <div class="row">
            <div class="col">
                <a href="#" role="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Search Data From MAL</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-8">
                <form method="post" action="/hikamin/anime" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bg" class="form-label fs-5 w-100">Potrait Background</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" id="img_preview" />
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="img" name="img" onchange="previewImage('img', 'img_preview')" />
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img_bg" class="form-label fs-5 w-100">Landscape Background</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" id="img_bg_preview" />
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="img_bg" name="img_bg" onchange="previewImage('img_bg', 'img_bg_preview')" />
                        @error('img_bg')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label fs-5">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}" placeholder="Anime Title" />
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alter_judul" class="form-label fs-5">Alternatif Judul</label>
                        <input type="text" class="form-control @error('alter_judul') is-invalid @enderror" id="alter_judul" name="alter_judul" required autofocus value="{{ old('alter_judul') }}" placeholder="Anime Alternative Title" />
                        @error('alter_judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label fs-5">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}" placeholder="Slug" />
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="produser" class="form-label fs-5">Produser</label>
                        <input type="text" class="form-control @error('produser') is-invalid @enderror" id="produser" name="produser" required value="{{ old('produser') }}" placeholder="Produser" />
                        @error('produser')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="studio" class="form-label fs-5">Studio</label>
                        <input type="text" class="form-control @error('studio') is-invalid @enderror" id="studio" name="studio" required value="{{ old('studio') }}" placeholder="Animation Studio" />
                        @error('produser')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label fs-5">Genre</label>
                        <!-- section genre checkbox -->
                        <div class="row">
                            <div class="col-lg d-flex flex-wrap" id="genre">
                                @foreach ($genres as $genre)
                                <div class="d-flex flex-grow-1 m-1">
                                    <input type="checkbox" name="genre[]" class="genre-checkbox" id="btncheck{{ $genre->slug }}" value="{{ $genre->nama }}" {{ (is_array(old('genre')) and in_array($genre->nama, old('genre')))? ' checked':'' }}>
                                    <label for="btncheck{{ $genre->slug }}" class="checkbox__area text-white btn btn-outline-primary flex-grow-1 d-flex">{{ $genre->nama }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- end genre checkbox -->
                        @error('genre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="skor" class="form-label fs-5">Skor</label>
                        <input type="number" class="form-control @error('skor') is-invalid @enderror" id="skor" name="skor" required value="{{ old('skor') }}" min="0.00" max="10.00" step="0.01" placeholder="Score"/>
                        @error('skor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label fs-5">Tipe</label>
                        <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required value="{{ old('tipe') }}" placeholder="Type" />
                        @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label fs-5">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ old('status') }}" placeholder="Status" />
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_episode" class="form-label fs-5">Total Episode</label>
                        <input type="text" class="form-control @error('total_episode') is-invalid @enderror" id="total_episode" name="total_episode" required value="{{ old('total_episode') }}" placeholder="Total Episode" />
                        @error('total_episode')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label fs-5">Durasi</label>
                        <input type="text" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" required value="{{ old('durasi') }}" placeholder="Duration" />
                        @error('durasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_rilis" class="form-label fs-5">Tanggal Rilis</label>
                        <input type="date" class="form-control @error('tanggal_rilis') is-invalid @enderror" id="tanggal_rilis" name="tanggal_rilis" required value="{{ old('tanggal_rilis') }}" />
                        @error('tanggal_rilis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fs-5">Deskripsi</label>
                        <textarea name="deskripsi" id="" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Anime Description" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Anime from MAL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Anime Title" id="search_input">
                            <button class="btn btn-outline-primary" type="button" id="search_anime">Search</button>
                        </div>
                    </div>
                </div>
                <div class="row" id="list_mal">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var dataJson = [];
    var genres = [];

    function setSlug()
    {
        $.ajax({
            url: '/hikamin/checkAnime',
            type: 'GET',
            dataType: 'json',
            data: {
                judul: $('#judul').val(),
            },
            success: function(data) {
                $('#slug').val(data.Data.slug)
            }
        })
    }

    function getGenre()
    {
        $.ajax({
            url: '/hikamin/getGenre',
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                genres.push(result);
            }
        })
    }

    function setAnime(i){
        $('#judul').val(dataJson[i].title);
        $('#alter_judul').val(dataJson[i].title_english);
        $('#produser').val(dataJson[i].producers[0].name);
        $('#studio').val(dataJson[i].studios[0].name);
        $('#skor').val(dataJson[i].score);
        $('#tipe').val(dataJson[i].type);
        $('#status').val(dataJson[i].status);
        $('#total_episode').val(dataJson[i].episodes);
        $('#durasi').val(dataJson[i].duration);
        $('#tanggal_rilis').val(formatDate(dataJson[i].aired.from));

        // get genre + slug
        setSlug();
        let arrayGenre = []

        dataJson[0].genres.filter((e) => {
            arrayGenre.push(e.name.toLowerCase().split(' ').join('-'));
        });

        $.each(arrayGenre, function(e, result){
            $('#btncheck' + result).prop('checked', true);
            $('#btncheck' + result).siblings().removeClass('btn-outline-primary');
            $('#btncheck' + result).siblings().addClass('btn-primary');
        });
    }

    function queryAnime()
    {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url:'https://api.jikan.moe/v4/anime',
            data : {
                q: $('#search_input').val(),
            },
            success: function(hasil) {
                dataJson = [];
                hasil = hasil.data
                $.each(hasil, (e, result) => {
                    dataJson.push(result);
                    $('#list_mal').append(`
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="row p-0 m-0 align-items-center h-fix">
                                <div class="col-8 text-dark px-1">
                                    <h5 class="h5 font-bold">`+ result.title +`</h5>
                                    <p class="card-text my-0">type: `+ result.type +`</p>
                                    <p class="card-text my-0">episode: `+ result.episodes +`</p>
                                    <p class="card-text my-0">status: `+ result.status +`</p>
                                    <a href="#" class="btn btn-primary my-2 get-anime" onclick="setAnime(`+e+`)" data-bs-dismiss="modal" >Get Detail</a>
                                </div>
                                <div class="col-4">
                                    <img src="`+ result.images.jpg.image_url +`" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
                });
            }
        });
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function previewImage(string_img, string_img_preview){
        const image = document.querySelector('#' + string_img);
        const img = document.querySelector('#' + string_img_preview);

        img.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(OFREvent) {
            img.src = OFREvent.target.result;
        }
    }

    $('#search_anime').on('click', () => {
        $('#list_mal').html('');
        queryAnime();
    });
    
    $('#judul').on('change', (e) => {
        setSlug();
    });

    $('.genre-checkbox').click(function() {
        if($(this).is(":checked")){
            $(this).siblings().removeClass('btn-outline-primary');
            $(this).siblings().addClass('btn-primary');
        }
        else {
            $(this).siblings().addClass('btn-outline-primary');
            $(this).siblings().removeClass('btn-primary');
        }
    });

    $('.genre-checkbox').each(function(e) {
        if($('.genre-checkbox').eq(e).is(":checked")){
            $('.genre-checkbox').eq(e).siblings().removeClass('btn-outline-primary');
            $('.genre-checkbox').eq(e).siblings().addClass('btn-primary');
        }
        else {
            $('.genre-checkbox').eq(e).siblings().addClass('btn-outline-primary');
            $('.genre-checkbox').eq(e).siblings().removeClass('btn-primary');
        }
        $(this).css('display', 'none')
    });
</script>

@endsection