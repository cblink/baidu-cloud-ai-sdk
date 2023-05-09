<h1 align="center"> baidu-cloud-ai-sdk </h1>

<p align="center"> 
    百度AI绘画，文心AI绘画，基于百度智能云文心AI绘画相关的 PHP SDK，官方文档地址：https://cloud.baidu.com/doc/NLP/s/Ml9i5amtk
</p>


## Installing

```shell
$ composer require cblink/baidu-cloud-ai-sdk -vvv
```

## Usage

```php
$c = new ApiClient();

//设置appkey和appsecret
$c->setConfig($this->config);
$service = new \Cblink\BaiduCloudAiSdk\ApiService();

//获取token（建议做缓存）
//$token = $c->getToken();

//设置token
$c->setToken($token);

//发起画图请求（异步）
$r = $c->request($service->getWenXinTxt2imgApi('美女', '1024*1024', '二次元'));

//获取画图结果
$r = $c->request($service->getWenXinImgResultApi($r['taskId']));
```

## Tip
- 画图结果违规的话是不会返回数据的

## License

MIT