<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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
        \Illuminate\Support\Facades\Validator::extend('is_active',function($attribute,$value,$parameters,$validator){
            $model = \App\User::where($attribute,$value)->where('is_active',1)->first();
            return $model ? true : false;
        },'User belum aktif, mohon cek kembali email anda.');
    }
}
