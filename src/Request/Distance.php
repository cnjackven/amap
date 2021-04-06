<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: Distance.php
 * Description: 距离计算
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class Distance extends AmapRequestAbstract
{
    protected $uri = '/v3/distance';
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

    /**
     * 路径计算的方式和方法
     * @param $val  0：直线距离
     *              1：驾车导航距离（仅支持国内坐标）。必须指出，当为1时会考虑路况，故在不同时间请求返回结果可能不同。此策略和驾车路径规划接口的 strategy=4策略基本一致，策略为“ 躲避拥堵的路线，但是可能会存在绕路的情况，耗时可能较长 ”若需要实现高德地图客户端效果，可以考虑使用驾车路径规划接口
     *              3：步行规划距离（仅支持5km之间的距离）
     * @return $this
     */
    public function setType($val){
        $this->params['destination'] = $val;
        return $this;
    }


}