<?php

namespace App\Models;

use App\Models\Episode;
use App\Models\Download;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function Download()
    {
        return $this->belongsTo(Download::class);
    }
}
