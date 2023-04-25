<?php
namespace Cblink\BaiduCloudAiSdk;

class ApiDto
{
    public $apiPath;

    public $params;

    public function __construct($apiPath,$params)
    {
        $this->apiPath = $apiPath;
        $this->params = $params;
    }

    public function getParam($key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }
}