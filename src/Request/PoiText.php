<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: PoiText.php
 * Description:
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class PoiText extends AmapRequestAbstract
{
    protected $uri = '/v3/geocode/regeo';
    protected $method = 'GET';

    /**
     * 检索关键字
     * @param $val
     * @return $this
     */
    public function setKeywords($val){
        $this->params['keywords'] = $val;
        return $this;
    }

    /**
     * 查询的POI代码类型
     * @param $val  分类代码 或 汉字
     * @return $this
     */
    public function setTypes($val){
        $this->params['types'] = $val;
        return $this;
    }

    /**
     * 查询的城市（设置该项有助于提高精度）
     * @param $val
     * @return $this
     */
    public function setCity($val){
        $this->params['city'] = $val;
        return $this;
    }

    /**
     * 仅返回指定城市数据
     * @param $val 可选值：true or false
     * @return $this
     */
    public function setCityLimit($val){
        $this->params['citylimit'] = $val;
        return $this;
    }

    /**
     * 是否按照层级展示子POI数据(仅在extensions=all的时候生效)
     * @param $val 当为0的时候，子POI都会显示。 当为1的时候，子POI会归类到父POI之中。
     * @return $this
     */
    public function setChildren($val){
        $this->params['children'] = $val;
        return $this;
    }

    /**
     * 设置每页查询的个数
     * @param $val
     * @return $this
     */
    public function setOffset($val){
        $this->params['offset'] = $val;
        return $this;
    }

    /**
     * 设置获取第几页
     * @param $val
     * @return $this
     */
    public function setPage($val){
        $this->params['page'] = $val;
        return $this;
    }

    /**
     * 返回结果控制
     * @param $val  此项默认返回基本地址信息；取值为all返回地址信息、附近POI、道路以及道路交叉口信息。
     * @return $this
     */
    public function setExtensions($val){
        $this->params['extensions'] = $val;
        return $this;
    }

}