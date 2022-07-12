<?php

namespace App\Models;

use App\Models\Link;
use App\Models\Anime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Download extends Model
{
    use HasFactory;
    protected $guarted = ['id'];

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
}
