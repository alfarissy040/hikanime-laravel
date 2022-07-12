<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Report;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function checkAnime(Request $request)
    {
        $slug = SlugService::createSlug(Anime::class, 'slug', $request->judul, ['unique' => true]);

        return response()->json([
            'Status' => 'True',
            'Data' => [
                'slug' => $slug,
            ],
        ]);
    }
    
    public function checkEpisode(Request $request)
    {
        $slug = SlugService::createSlug(Episode::class, 'slug', $request->episode, ['unique' => false]);

        return response()->json([
            'Status' => 'True',
            'Data' => [
                'slug' => $slug,
            ],
        ]);
    }
}
