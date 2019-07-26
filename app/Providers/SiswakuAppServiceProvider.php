<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class SiswakuAppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $halaman = '';
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
        }

        if (Request::segment(2) == 'about') {
            $halaman = 'about';
        }
        view()->share('halaman', $halaman);
    }
    
    public function register()
    {
        //
    }

    
}
