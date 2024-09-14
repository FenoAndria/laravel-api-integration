<?php

namespace FenoAndria\LaravelApiIntegration\Services;

use FenoAndria\LaravelApiIntegration\Contracts\ApiInterface;
use GuzzleHttp\Client;

class ApiClient implements ApiInterface
{
    protected $httpClient;

    protected $baseUrl;

    protected $apiKey;

    public function __construct($baseUrl, $apiKey = null)
    {
        $this->httpClient = new Client;
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    public function get(string $endpoint, array $parameters = [])
    {
        $response = $this->httpClient->get($this->baseUrl.$endpoint, [
            'query' => array_merge($parameters, ['apiKey' => $this->apiKey]),
        ]);

        return json_decode($response->getBody(), true);
    }

    public function post(string $endpoint, array $data = [])
    {
        $response = $this->httpClient->post($this->baseUrl.$endpoint, [
            'form_params' => array_merge($data, ['apiKey' => $this->apiKey]),
        ]);

        return json_decode($response->getBody(), true);
    }

    public function put(string $endpoint, array $data = [])
    {
        $response = $this->httpClient->put($this->baseUrl.$endpoint, [
            'form_params' => array_merge($data, ['apiKey' => $this->apiKey]),
        ]);

        return json_decode($response->getBody(), true);
    }

    public function delete(string $endpoint, array $parameters = [])
    {
        $response = $this->httpClient->delete($this->baseUrl.$endpoint, [
            'query' => array_merge($parameters, ['apiKey' => $this->apiKey]),
        ]);

        return json_decode($response->getBody(), true);
    }
}
