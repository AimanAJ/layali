<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='playlists';
    protected $fillable=[
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'record_order',
        'playlist_type',
        'status'
        
    ];

    public function getPlaylistTypeAttribute($value)
    {
        if ($value == 1) {
            return 'Movie';
        } elseif ($value == 2) {
            return 'Series';
        }elseif ($value == 3) {
            return 'Program';
        }elseif ($value == 4) {
            return 'Kids';
        }
    }
    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Inactive';
        }
    }

    // Many To Many Relation With Category

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'playlist_categories', 'playlists_id', 'categories_id');
    }
    
    // One To Many Relations
    public function movie(){
        return $this->hasMany(Movie::class);
    }
    public function series(){
        return $this->hasMany(Series::class);
    }
    public function program(){
        return $this->hasMany(Program::class);
    }
    public function kids(){
        return $this->hasMany(Kid::class);
    }
}
