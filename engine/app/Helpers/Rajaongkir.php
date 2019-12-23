<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Rajaongkir
{
    protected $base_uri;
    protected $client;
    // protected $bearer;

    public function __construct()
    {
        $this->base_uri = getenv("RAJAONGKIR_URL");
    }

    public function base_uri($api = "")
    {
        return $this->base_uri . $api;
    }

    public function clients()
    {
        $this->client = new Client(['headers' => [
            'key' => getenv('RAJAONGKIR_API'),
            'content-type' => 'application/x-www-form-urlencoded'
        ]]);

        return $this->client;
    }

    public function get($uri)
    {
        return json_decode($this->clients()->get($this->base_uri($uri))->getBody())->rajaongkir->results;
    }

    public function post($uri, $input)
    {
        return $this->clients()->post($this->base_uri($uri), [
            'json' => $input
        ]);
    }
}
