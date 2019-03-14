<?php

namespace BirdBook\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use BirdBook\Theme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar',function($view) {
            $themes = \BirdBook\Theme::all();

            $view->with(compact('themes'));
        });



        view()->composer('layouts.sidebar', function($view) {

            if(Auth::check() && isset($_COOKIE[Auth::id()])) {
                $themeCdn = Cookie::get(Auth::id());
                $theme = Theme::where('cdn_url', $themeCdn)->first();
                $themeName = $theme['name'];
            }
            else {
                $themeName = Theme::getDefaultThemeName();
            }

            $view->with(compact('themeName'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
