<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistCategory extends Model
{
    use HasFactory;
    protected $table='playlist_categories';

    protected $fillable=[
        'categories_id',
        'playlists_id'
    ];
}
