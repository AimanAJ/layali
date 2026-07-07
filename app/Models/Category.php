<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{   use HasFactory;
    use SoftDeletes;
    protected $table='categories';
    protected $fillable=[
        'name_en',
        'name_ar',
        'status'
    ];
    
    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Inactive';
        }
    }

    // Many To Many Relation With Playlist

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_categories', 'categories_id', 'playlists_id');
    }
}
