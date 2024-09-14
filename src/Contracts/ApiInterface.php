<?php

namespace FenoAndria\LaravelApiIntegration\Contracts;

interface ApiInterface
{
    public function get(string $endpoint, array $parameters = []);

    public function post(string $endpoint, array $data = []);

    public function put(string $endpoint, array $data = []);

    public function delete(string $endpoint, array $parameters = []);
}
