# API Integration Package for Laravel

This package provides a flexible and extendable API client to interact with any external APIs by dynamically configuring base URLs, API keys, and handling HTTP requests. It's built for Laravel using Spatie's package template and is designed to integrate with various third-party services.
This package provides a flexible and extendable API client to interact with any external APIs by dynamically configuring base URLs, API keys, and handling HTTP requests. It's built for Laravel using Spatie's package template and is designed to integrate with various third-party services.

## Features

    **Dynamic Configuration** : Supports environment-based API configuration (base URL, API key).
    **Flexible HTTP Methods** : Allows GET, POST, PUT, DELETE requests with ease.
    **Extensible Design** : Easily add support for new APIs without altering the core package.
    **Service Container Integration** : Uses Laravel's service container for dependency injection and flexibility.
    **Mockable for Testing** : Easily test API responses with Guzzle mock handlers.

## Installation

    composer require fenoandria/laravel-api-integration:dev-main

### Publish the Configuration

After installation, publish the configuration file:

php artisan vendor:publish --provider="FenoAndria\LaravelApiIntegration\LaravelApiIntegrationServiceProvider"

This will create the config/api-integration.php file, where you can set your API base URL and key.

Configure the .env file

Add your API credentials in your .env file:

    **API_BASE_URL** = https://api.yourservice.com
    **API_KEY** = your-api-key

## Usage
Via the Service Container

- You can inject the ApiClient into your services, controllers, or jobs via Laravel's service container:
```php
$apiClient = app(ApiClient::class);

$response = $apiClient->get('your-endpoint', ['param' => 'value']);

dd($response);
```
- Manual Instantiation

For simple use cases, you can instantiate the ApiClient manually:

```php
$apiClient = new ApiClient('https://api.yourservice.com', 'your-api-key');

$response = $apiClient->get('your-endpoint', ['param' => 'value']);

dd($response);
```

### Handling Requests

The ApiClient supports the common HTTP methods:

    GET request:
```php
    $response = $apiClient->get('endpoint', ['param' => 'value']);
```

POST request:

```php
$response = $apiClient->post('endpoint', ['param' => 'value']);
```

PUT request:

```php
$response = $apiClient->put('endpoint', ['param' => 'value']);
```

DELETE request:

```php
    $response = $apiClient->delete('endpoint');
```

### Testing

The package includes PHPUnit tests. To run tests, ensure that you have a .env.testing file configured if your package relies on environment variables.

You can mock HTTP requests using Guzzle's mock handler in your tests. Here's an example:

```php
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use FenoAndria\LaravelApiIntegration\Services\ApiClient;

$mock = new MockHandler([
    new Response(200, [], json_encode(['data' => 'mocked data']))
]);

$handlerStack = HandlerStack::create($mock);
$httpClient = new \GuzzleHttp\Client(['handler' => $handlerStack]);

$apiClient = new ApiClient('https://api.mockservice.com', 'mock-api-key', $httpClient);

$response = $apiClient->get('endpoint');

$this->assertEquals('mocked data', $response['data']);
```

## Extending the Package

You can extend this package to support additional APIs by adding more methods or modifying the existing service class to suit your needs.

## Contributing

Feel free to fork this package and contribute by submitting pull requests. Any suggestions for improvements are welcome!
License

This package is open-sourced software licensed under the MIT license.