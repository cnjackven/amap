<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: Walking.php
 * Description: 步行路径规划
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class Walking extends AmapRequestAbstract
{
    protected $uri = '/v3/direction/walking';
    protected $method = 'GET';

    /**
     * 起始点经纬度坐标
     * @param $val
     * @return $this
     */
    public function setOrigin($val){
        $this->params['origin'] = $val;
        return $this;
    }

    /**
     * 目的地经纬度坐标
     * @param $val
     * @return $this
     */
    public function setDestination($val){
        $this->params['destination'] = $val;
        return $this;
    }
}