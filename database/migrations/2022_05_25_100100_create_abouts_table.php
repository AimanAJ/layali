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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_title_en');
            $table->string('about_us_title_ar');
            $table->longText('about_us_description_en');
            $table->longText('about_us_description_ar');
            $table->longText('about_us_description_sub_en');
            $table->longText('about_us_description_sub_ar');
            $table->longText('about_us_image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
};
