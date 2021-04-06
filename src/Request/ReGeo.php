<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: ReGeo.php
 * Description: 逆转经纬度坐标
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class ReGeo extends AmapRequestAbstract
{
    protected $uri = '/v3/geocode/regeo';
    protected $method = 'GET';

    /**
     * 设置坐标经纬度
     * @param $val
     * @return $this
     */
    public function setLocation($val){
        $this->params['location'] = $val;
        return $this;
    }

    /**
     * 返回的附近POI类型
     * @param $val
     * @return $this
     */
    public function setPoitype($val){
        $this->params['poitype'] = $val;
        return $this;
    }

    /**
     * 搜索半径
     * @param $val
     * @return $this
     */
    public function setRadius($val){
        $this->params['radius'] = $val;
        return $this;
    }

    /**
     * 返回结果控制
     * @param $val 参数默认取值是 base，也就是返回基本地址信息；extensions 参数取值为 all 时会返回基本地址信息、附近 POI 内容、道路信息以及道路交叉口信息
     * @return $this
     */
    public function setExtensions($val){
        $this->params['extensions'] = $val;
        return $this;
    }

    /**
     * 是否支持批量查询
     * @param $val
     * @return $this
     */
    public function setBatch($val){
        $this->params['extensions'] = $val;
        return $this;
    }

    /**
     * 设置道路等级
     * @param $val 当 extensions 值为 all 时生效， 0 显示所有道路， 1 过滤非主干道路，仅输出主干道路数据
     * @return $this
     */
    public function setRoadlevel(int $val){
        $this->params['roadlevel'] = $val;
        return $this;
    }

}