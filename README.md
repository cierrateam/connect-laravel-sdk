# Cierra Connect Laravel SDK

The Cierra Connect Laravel SDK provides an easy way to integrate with the Cierra Connect API in your Laravel applications.

## Installation
Follow these steps to install and set up the package:

1. Install the package using Composer:

    ```sh
    composer require cierrateam/connect-laravel-sdk
    ```

2. Add the service provider to your `config/app.php` file in the `providers` array:

    ```php
    'providers' => [
        // ...
        \Cierra\Connect\ConnectServiceProvider::class,
    ],
    ```

3. Publish the configuration file (optional):

    ```sh
    php artisan vendor:publish --tag=cierra-connect-config
    ```

4. Add your Cierra Connect API key to your `.env` file:

    ```dotenv
    CIERRA_CONNECT_KEY=your_api_key_here
    ```

Replace 'your_api_key_here' with your actual Cierra Connect API key.


## Usage Example

Here's an example of how you can use the Cierra Connect Laravel SDK in your controllers:

```php
<?php

namespace App\Http\Controllers;

use Cierra\Connect\ConnectManager;
use Illuminate\Http\Request;

class TestCierraConnectController extends Controller
{
    public function test(Request $request, ConnectManager $connectManager)
    {
        $CONNECTION = 'my_api_connection_key';
        $apiClient = $connectManager->getInstance($CONNECTION);

        // Get a list of entities
        $items = $apiClient->entity('cars')->list();
        dump($items); // Laravel collection returned
        dump($items->first());
        
        // Pagination
        $items = $apiClient->entity('cars')->list(4, 100);
        dump($items);

        // Get specific item by ID
        $item = $apiClient->entity('cars')->get(314591);
        dump($item);
        
        // Get additional API response data
        $item = $apiClient->entity('cars')->asRawResponse()->get(314588);
        dump($item);
    }
}
