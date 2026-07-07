<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    // ===================================================================================================================
    // ============================================== Standard Section ===================================================
    // ===================================================================================================================
    protected $table = 'abouts';
    protected $fillable = [
        'about_us_title_ar',
        'about_us_title_en',
        'about_us_description_ar',
        'about_us_description_en',
        'about_us_description_sub_ar',
        'about_us_description_sub_en',
        'about_us_image'
    ];
}
