<?php

namespace App\Providers;

use App\Http\Livewire\Vendidos;
use App\Http\Livewire\Venta;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        Livewire::component('venta', Venta::class);
        Livewire::component('vendidos', Vendidos::class);
    }
}
