<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: Geo.php
 * Description: 地址转换为经纬度坐标
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class Geo extends AmapRequestAbstract
{
    protected $uri = '/v3/geocode/geo';
    protected $method = 'GET';

    /**
     * 要转化的地址
     * @param $val
     * @return $this
     */
    public function setAddress($val){
        $this->params['address'] = $val;
        return $this;
    }

    /**
     * 查询地址所属的城市
     * @param $val
     * @return $this
     */
    public function setCity($val){
        $this->params['city'] = $val;
        return $this;
    }

}