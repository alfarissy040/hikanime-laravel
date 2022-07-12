<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Report;
use App\Models\Download;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AnimeController extends Controller
{
    public function index()
    {
        return view('home', [
            'head_title' => 'Home',
            'posts' => Anime::latest()->paginate(8),
            'recomended' => Anime::orderBy('skor', 'asc')->latest()->paginate(6),
            'anime_ongoing' => Anime::where('status', 'Ongoing')->orderBy('skor', 'asc')->latest()->paginate(9),
        ]);
    }

    public function anime_list()
    {
        $alphabet = collect([]);
        foreach(Anime::orderBy('judul', 'asc')->get() as $anime){
            $key = substr($anime->judul, 0, 1);
            $alphabet->push($key);
        }

        return view('anime_list', [
            'head_title' => 'Anime List',
            'posts' => Anime::orderBy('judul', 'asc')->get(),
            'alphabets' => $alphabet->unique(),
        ]);
    }
    
    public function genre()
    {
        return view('genre', [
            'head_title' => 'All Genre',
            'genres' => Genre::orderBy('nama', 'asc')->get(),
        ]);
    }

    public function show_genre(Genre $genre)
    {
        $anime = Anime::where('genre', 'like', '%'.$genre->nama.'%')->latest();
        $animeOngoing = Anime::where('status', 'like', '%ongoing%')->orderBy('skor', 'asc');

        return view('search', [
            'head_title' => 'Genre '. $genre->nama,
            'title' => "Semua Anime Ber-genre ". $genre->nama,
            'posts' => $anime->paginate(8),
            'recomended' => $animeOngoing->paginate(6),
            'anime_ongoing' => $animeOngoing->latest()->paginate(9),
            'notFound' => 'Tidak Ditemukan Anime ber-genre '.$genre->nama,
        ]);
    }

    public function anime(Anime $anime)
    {
        $download = Download::where('anime_id', $anime->id)->orderBy('judul', 'asc')->get();

        return view('anime', [
            'head_title' => 'Anime List',
            'posts' => $anime,
            'episodes' => $anime->Episode()->orderBy('episode','asc')->get(),
            'batchs' => $download,
        ]);
    }

    public function streaming(Anime $anime, $episode)
    {
        $episode = $anime->episode->where('slug', $episode)->first();
        $link = Link::where('episode_id', $episode->id)->orderBy('resolusi', 'asc')->get();

        return view('streaming', [
            'head_title' => 'Streaming',
            'anime' => $anime,
            'episode' => $episode,
            'links' => $link,
        ]);
    }

    public function search()
    {
        return view('search', [
            'head_title' => 'Search',
            'title' => "Searching For ". request('search'),
            'posts' => Anime::where('judul', 'like', '%'.request('search').'%')
                    ->orWhere('deskripsi', 'like', '%'.request('search').'%')
                    ->latest()->paginate(8),
            'recomended' => Anime::orderBy('skor', 'asc')->latest()->get(),
            'anime_ongoing' => Anime::where('status', 'Airing')->orderBy('skor', 'asc')->latest()->paginate(9),
            'notFound' => request('search'),
        ]);
    }

    public function report_link()
    {
        return view('lapor', [
            'head_title' => 'Lapor Link Rusak',
        ]);
    }

    // post report data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'episode' => 'required|max:255',
            'msg' => 'required',
        ]);

        $validated['slug'] = SlugService::createSlug(Report::class, 'slug', $validated['title']);
        
        Report::create($validated);
        return redirect('/report-link')->with('success', 'Terima kasih Atas Laporan Anda..');
    }
}
