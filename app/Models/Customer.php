<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='customers';
    protected $fillable=[
        'name_en',
        'name_ar',
        'email',
        'phone',
        'password',
        'provider',
        'provider_id',
        'status'
       
    ];

    public function getStatusAttribute($value){
        if($value == 1){
            $value = 'Active';
        }elseif($value == 2){
            $value = 'Inactive';
        }
    }

}
