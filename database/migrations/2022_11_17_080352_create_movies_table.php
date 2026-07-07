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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->longText('url');
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->bigInteger('playlist_id');
            $table->string('duration')->nullable();
            $table->longText('image')->nullable();
            $table->tinyInteger('status')->defualt(1)->comment = '1 => Active || 2 => Inactive';
            $table->softDeletes();
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
        Schema::dropIfExists('movies');
    }
};
