<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Lecture;
use App\Models\Playlist;
use App\Models\PublicCountry;
use App\Models\Service;
use App\Models\System;
use App\Models\Topic;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
           
            $public_categories= Category::where('status', 1)->get();
            $public_playlists= Playlist::where('status',1)->get();
            view()->share([
               
                'public_categories' => $public_categories,
                'public_playlists' => $public_playlists
            ]);
        });
    }
}
