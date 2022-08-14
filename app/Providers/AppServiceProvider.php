<?php

namespace App\Providers;

use App\Models\About;
use App\Models\ContactField;
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
        $links = ContactField::all();
        $about = About::first();
        view()->share('links',$links);
        view()->share('about',$about);
    }
}
