<?php

namespace Cierra\Connect;

use Cierra\Connect\DataDecorators\ListDataDecorator;
use Cierra\ConnectSdk\Connect;
use Cierra\ConnectSdk\ConnectConfig;

class ConnectManager
{
    public function getInstance(string $connection): Connect
    {
        $key = config('cierra-connect.key');
        if (!$key) {
            throw new \Exception('Empty value for CIERRA_CONNECT_API_KEY');
        }

        $config = new ConnectConfig(
            config('cierra-connect.api_url'),
            $key,
            $connection
        );

        $config->setListDataDecorator(new ListDataDecorator);

        return new \Cierra\ConnectSdk\Connect($config);
    }
}
