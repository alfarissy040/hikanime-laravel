<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Anime $anime)
    {
        return view('admin.anime.episode.index', [
            'anime' => $anime,
            'episodes' => collect($anime->episode)->sortBy('episode'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Anime $anime)
    {
        return view('admin.anime.episode.create', [
            'anime' => $anime,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Anime $anime)
    {
        $validated = $request->validate([
            'episode' => 'required',
            'slug' => 'required',
            'video_360p' => 'required',
            'video_480p' => 'required',
            'video_720p' => 'required',
        ]);

        $validated['anime_id'] = $anime->id;
        $validated['slug'] = $anime->slug.'-'.$request->slug;

        Episode::create($validated);
        return redirect('/hikamin/anime')->with('success', 'success adding episode!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime, Episode $episode)
    {
        return view('admin.anime.episode.show', [
            'head_title' => 'Show Episode',
            'anime' => $anime,
            'episode' => $episode,
            'all_episode' => collect($anime->episode)->sortBy('episode'),
            'batchs' => collect($anime->download)->sortBy('resolusi'),
            'links' => collect($episode->link)->sortBy('resolusi'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime, Episode $episode)
    {
        return view('admin.anime.episode.edit', [
            'anime' => $anime,
            'episode' => $episode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $validated = $request->validate([
            'episode' => 'required',
            'slug' => 'required',
            'video_360p' => 'required',
            'video_480p' => 'required',
            'video_720p' => 'required',
        ]);

        if($request->slug != $episode->slug){
            $rules['slug'] = 'required|unique:episode';
        }

        Episode::where('id', $episode->id)->update($validated);
        return redirect('/hikamin/anime')->with('success', 'success adding episode!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        return $episode->id;
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Anime::class, 'slug', $request->judul);
        return response()->json(['slug'=> $slug]);
    }
}
