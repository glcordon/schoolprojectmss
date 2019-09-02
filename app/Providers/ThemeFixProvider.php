<?php

// app/Providers/Fixes/VoyagerThemeFixProvider.php

namespace App\Providers\Fixes;

use Illuminate\Support\ServiceProvider;

final class VoyagerThemeFixProvider extends ServiceProvider
{
    public function register()
    {
        include 'helper.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
