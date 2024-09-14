<?php

use FenoAndria\LaravelApiIntegration\Services\ApiClient;

it('can test', function () {
    expect(true)->toBeTrue();
    
    $apiClient = new ApiClient('https://api.openweathermap.org/data/2.5');

    $result = $apiClient->get('/weather', ['q' => 'Paris']);
    $this->assertArrayHasKey('weather', $result);
    $this->assertEquals('Paris', $result['name']);
});
