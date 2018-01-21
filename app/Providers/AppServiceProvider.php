<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Return with menus and reports whenewer the sidenav is called
        view()->composer('pages.userpages.components.sidenav', function($view){
            $view->with('menus',\App\Menu::all())
                 ->with('reports',\App\Report::all());
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
