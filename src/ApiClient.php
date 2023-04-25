<?php
namespace Cblink\BaiduCloudAiSdk;

use GuzzleHttp\Client;

class ApiClient
{
    public $config;

    public $baseUri = 'https://aip.baidubce.com/';

    public $token;

    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function getAppSecret()
    {
        return $this->config['app_secret'];
    }

    public function getAppKey()
    {
        return $this->config['app_key'];
    }

    public function getToken($api = false)
    {
        if (!$api) {
            return $this->token;
        }

        $api = (new ApiService())->getTokenApi($this->getAppKey(), $this->getAppSecret());

        $response = $this->client->get($this->baseUri . $api->apiPath, ['query' => $api->params]);
        $this->token = json_decode($response->getBody()->getContents(), true)['access_token'];

        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public function request(ApiDto $api)
    {
        $response = $this->client->post($this->getBaseUri() . $api->apiPath, [
            'json' => $api->params,
            'query' => ['access_token' => $this->getToken()]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response, true);
    }
}