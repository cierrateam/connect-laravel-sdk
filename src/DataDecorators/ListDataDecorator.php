<?php

namespace Cierra\Connect\DataDecorators;

use Cierra\ConnectSdk\DataDecorators\DataDecoratorInterface;
use Cierra\ConnectSdk\HttpClient;

class ListDataDecorator implements DataDecoratorInterface
{
    public function decorate(array $apiResponseData)
    {
        if ($apiResponseData['response_type'] === HttpClient::$RESPONSE_TYPE_JSON) {
            return collect(json_decode($apiResponseData['response_data'], true));
        } else {
            return $apiResponseData['response_data'];
        }
    }
}
