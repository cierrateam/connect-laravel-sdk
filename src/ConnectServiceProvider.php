<?php

namespace Cierra\Connect;

use Illuminate\Support\ServiceProvider;

class ConnectServiceProvider extends ServiceProvider
{
    public $bindings = [
        ConnectManager::class => ConnectManager::class,
    ];

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/cierra-connect.php', 'cierra-connect'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/cierra-connect.php' => config_path('cierra-connect.php'),
        ], 'cierra-connect-config');
    }
}
