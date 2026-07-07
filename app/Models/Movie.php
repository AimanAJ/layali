<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='movies';
    protected $fillable=[
        'title_en',
        'title_ar',
        'url',
        'description_en',
        'description_ar',
        'playlist_id',
        'duration',
        'image',
        'status'
       
    ];
    public function getStatusAttribute($value){
        if ($value == 1) {
            return 'Active';
        } elseif ($value == 2) {
            return 'Inactive';
        }
      }
    
    public function playlist(){
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }
}
