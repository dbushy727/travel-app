<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        collect(scandir(app_path('Observers')))->filter(function ($file) {
            return str_contains($file, ".php");
        })->each(function ($file) {
            $model = app('App\\Models\\' . str_replace('Observer.php', '', $file));
            $observer = app('App\\Observers\\' . str_replace('.php', '', $file));

            $model::observe($observer);
        });
    }
}
