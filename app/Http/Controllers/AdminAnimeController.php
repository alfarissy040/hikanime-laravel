<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Download;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminAnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.anime.index', [
            'animes' => Anime::orderBy('status', 'asc')->orderBy('judul', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anime.create', [
            'genres' => Genre::orderBy('nama', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validated data
        $validated = $request->validate([
            'img' => 'required|image|file|max:2048',
            'img_bg' => 'required|image|file|max:2048',
            'judul' => 'required',
            'alter_judul' => 'required',
            'slug' => 'required|unique:animes',
            'produser' => 'required',
            'studio' => 'required',
            'genre' => 'required',
            'skor' => 'required',
            'tipe' => 'required',
            'status' => 'required',
            'total_episode' => 'required',
            'durasi' => 'required',
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',
        ]);
        // end validated data

        // Array to String
        if(count($request->genre) > 1){
            $validated['genre'] = implode(', ', $request->genre);
        }
        else {
            $validated['genre'] = $request->genre[0];
        }

        // add excerpt from deskripsi
        $validated['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200, '...');

        // get file dirr
        if($request->file('img')){
            $validated['img'] = $request->file('img')->store('images');
        }
        if($request->file('img_bg')){
            $validated['img_bg'] = $request->file('img_bg')->store('images');
        }
        // end get file dirr

        // upload data to db
        Anime::create($validated);
        
        // redirect to admin menu
        return redirect('/hikamin/anime')->with('success', 'Success Adding Anime');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        return view('admin.anime.show', [
            'head_title' => $anime->judul,
            'anime' => $anime,
            'episodes' => $anime->Episode()->orderBy('episode','asc')->get(),
            'batchs' => Download::where('anime_id', $anime->id)->orderBy('judul', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        return view('admin.anime.edit', [
            'anime' => $anime,
            'genres' => Genre::orderBy('nama', 'asc')->get(),
            'old_genre' => explode(', ', $anime->genre),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        // rules for validated data
        $rules = [
            'judul' => 'required',
            'alter_judul' => 'required',
            'produser' => 'required',
            'studio' => 'required',
            'genre' => 'required',
            'skor' => 'required',
            'tipe' => 'required',
            'status' => 'required',
            'total_episode' => 'required',
            'durasi' => 'required',
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',
        ];

        if($request->slug != $anime->slug){
            $rules['slug'] = 'required|unique:animes';
        }
        if(!$request->old_img){
            $rules['img'] = 'required|image|file|max:2048';
        }
        if(!$request->old_img_bg){
            $rules['img_bg'] = 'required|image|file|max:2048';
        }
        // end rules for validated data

        // validated data
        $validated = $request->validate($rules);
        // end validated data

        // delete old img and upload img
        if($request->file('img')){
            if($request->old_img){
                Storage::delete($request->old_img);
            }
            $validated['img'] = $request->file('img')->store('images');
        }
        if($request->file('img_bg')){
            if($request->old_img_bg){
                Storage::delete($request->old_img_bg);
            }
            $validated['img_bg'] = $request->file('img_bg')->store('images');
        }
        // end delete old img and upload img

        // Array to String
        if(count($request->genre) > 1){
            $validated['genre'] = implode(', ', $request->genre);
        }
        else {
            $validated['genre'] = $request->genre[0];
        }
        
        // upload data to database
        Anime::where('id', $anime->id)->update($validated);

        // redirect to admin menu
        return redirect('/hikamin/anime')->with('success', 'success Edit Anime!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        // list yang akan di delete:
        // - anime dari table anime
        // - episode dari table episode
        // - batch dari table donwload
        // - link download per episode
        $episode_anime_id = Episode::where('anime_id', $anime->id)->get();
        $batch_anime_id = Download::where('anime_id', $anime->id)->get();
        
        // delete link per episode
        foreach ($episode_anime_id as $episode_id) {
            $link_anime_id = Link::where('episode_id', $episode_id)->get();
            Link::destroy($link_anime_id);
        }
        
        // delete batch
        foreach ($batch_anime_id as $batch_id) {
            $batch = Download::where('anime_id', $batch_id)->get();
            Link::destroy($batch);
        }

        Storage::delete($anime->img);
        Storage::delete($anime->img_bg);

        Episode::destroy($episode_anime_id);
        Anime::destroy($anime->id);
        return redirect('/hikamin/anime')->with('success', 'Success Delete Anime');
    }

    public function getGenre()
    {
        $data = collect([]);
        
        foreach (Genre::all() as $genre) {
            $data->push([
                'nama' => $genre->nama,
                'slug' => $genre->slug,
            ]);
        }

        return response($data);
    }

}
