<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('home_title_ar');
            $table->string('home_title_en');
            $table->longText('home_slide_image')->nullable();
            $table->string('home_slider_text1_ar');
            $table->string('home_slider_text1_en');
            $table->string('home_slider_text2_ar');
            $table->string('home_slider_text2_en');
            $table->string('home_slider_text3_ar');
            $table->string('home_slider_text3_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_layouts');
    }
};
