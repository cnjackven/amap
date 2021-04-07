<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: AmapClient.php
 * Description:
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap;

use VenAmap\Contracts\FactoryInterface;
use InvalidArgumentException;

class AmapClient implements FactoryInterface
{
    protected $output           = "JSON";
    protected $version          = 'v3';
    protected $gateway_uri      = 'http://restapi.amap.com/';
    protected $app_key          = '';
    protected $app_private_key  = '';
    private static $instance;

    /**
     * The array of created "drivers".
     */
    protected $requests = [];

    /**
     * 默认封装提供的接口封装
     * @var string[]
     */
    protected $defaultDriver = [
        'geo'                   => 'Geo',
        'ip'                    => 'IP',
        'regeo'                 => 'ReGeo',
        'walking'               => 'Walking',
        'distance'              => 'Distance',
        'convert'               => 'Convert',
        'weatherinfo'           => 'WeatherInfo',
        'district'              => 'District',
        'poitext'               => 'PoiText',
        'transitintegrated'     => 'TransitIntegrated',
        'bicycling'             => 'Bicycling'
    ];

    private function __construct(array $config = []){
        $this->setConfig($config);
    }

    /**
     * 设置接口请求配置信息
     * @param $config
     */
    private function setConfig($config){
        if(!empty($config) && isset($config['key'])){
            $this->app_key = $config['key'];
        }

        if(!empty($config) && isset($config['private_key'])){
            $this->app_private_key = $config['private_key'];
        }

        if(!empty($config) && isset($config['output'])){
            $this->output = $config['output'];
        }
    }

    /**
     * 获取请求对象
     * @param $driver
     * @return mixed
     */
    public function driver($driver){
        $driver = strtolower($driver);
        if (!isset($this->requests[$driver])) {
            $this->requests[$driver] = $this->createRequest($driver);
        }
        return $this->requests[$driver];
    }

    /**
     * send interface request
     * @param $uri
     * @param $params
     * @param string $method
     * @return mixed
     * @throws \HttpException
     */
    public function send($uri,$params,$method='GET'){
        $params['key']      = $this->app_key;
        $params['output']   = $this->output;
        if(!is_null($this->app_private_key) && !empty($this->app_private_key)){
            $params['sig']     =    $this->getSign($params);
        }
        return $this->requestGateway($this->gateway_uri.$uri,$params,$method);
    }

    /**
     * Instantiate object
     * @param array $config
     * @return AmapClient
     */
    public static function getInstance( $config = []){
        if(is_null(self::$instance)){
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    /**
     * 创建请求对象
     * @param $driver
     * @return mixed
     */
    private function createRequest($driver){

        if(!isset($this->defaultDriver[$driver])){
            throw new InvalidArgumentException("Driver [$driver] not supported.");
        }

        $request = $this->defaultDriver[$driver];
        $request = __NAMESPACE__.'\\Request\\'.$request;
        return new $request();
    }

    /**
     * build request sign
     * @param $params
     * @return string
     */
    private function getSign($params){
        ksort($params);
        $strArr = [];
        foreach($params as $k=>$v) $strArr[] = $k.'='.$v;
        return md5(implode('&',$strArr).$this->app_private_key);
    }

    /**
     * Encapsulate requests based on GuzzleHttp
     * @param $uri
     * @param $params
     * @param string $method
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \HttpException
     */
    private function requestGateway($uri,$params,$method='GET'){

        $client = new \GuzzleHttp\Client();
        switch ($method){
            case 'GET':
                $respone = $client->get($uri,['query'=>$params]);
                break;
            case 'POST':
                $respone = $client->post($uri,['form_params'=>$params]);
                break;
            default:
                $respone = $client->post($uri,['form_params'=>$params]);
        }

        try {
            $respone = $respone->getBody();
            return json_decode($respone,true);
        }catch (\Exception $e){
            throw new \HttpException($e->getMessage(),$e->getCode());
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}