<?php

namespace App\Models;

use App\Models\Link;
use App\Models\Episode;
use App\Models\Download;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anime extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Episode()
    {
        return $this->hasMany(Episode::class);
    }
    
    public function Download()
    {
        return $this->hasMany(Download::class);
    }

    public function Link()
    {
        return $this->hasMany(Link::class);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
