<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: WeatherInfo.php
 * Description: 天气信息查询
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class WeatherInfo extends AmapRequestAbstract
{

    protected $uri = '/v3/weather/weatherInfo';
    protected $method = 'GET';

    /**
     * 城市编码
     * @param $val
     * @return $this
     */
    public function setOrigin($val){
        $this->params['city'] = $val;
        return $this;
    }

    /**
     * 气象类型
     * @param $val 可选值：base/all  base:返回实况天气   all:返回预报天气
     * @return $this
     */
    public function setExtensions($val){
        $this->params['extensions'] = $val;
        return $this;
    }
}