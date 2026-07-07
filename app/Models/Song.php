<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='songs';
    protected $fillable=[
        'title_en',
        'title_ar',
        'record_order',
        'url',
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
    
  
}
