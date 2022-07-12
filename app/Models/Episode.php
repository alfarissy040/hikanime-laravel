<?php

namespace App\Models;

use App\Models\Link;
use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Anime()
    {
        return $this->belongsTo(Anime::class);
    }

    public function Link()
    {
        return $this->hasMany(Link::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'episode'
            ]
        ];
    }
}
