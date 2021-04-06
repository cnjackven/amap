<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: Convert.php
 * Description: 坐标转换
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class Convert extends AmapRequestAbstract
{
    protected $uri = '/v3/assistant/coordinate/convert';
    protected $method = 'GET';

    /**
     * 原坐标点
     * @param $val
     * @return $this
     */
    public function setLocations($val){
        $this->params['locations'] = $val;
        return $this;
    }

    /**
     * 设置原坐标系
     * @param $val
     * @return $this
     */
    public function setCoordsys($val){
        $this->params['coordsys'] = $val;
        return $this;
    }
}