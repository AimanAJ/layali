<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLayout extends Model
{
    use HasFactory;
    protected $table = 'home_layouts';

    protected $fillable = [
        'home_title_ar',
        'home_title_en',
        'home_slide_image',
        'home_slider_text1_ar',
        'home_slider_text1_en',
        'home_slider_text2_ar',
        'home_slider_text2_en',
        'home_slider_text3_ar',
        'home_slider_text3_en'
    ];
}
