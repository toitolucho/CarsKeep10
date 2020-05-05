<?php

namespace App\Providers;

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

        /*
         * Ccomado para generar modelos a partri de la base de datos, esta cocnfigurado para que funcicone a nivel del proyecto
         * */
//        if ($this->app->environment() == 'local') {
//            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
