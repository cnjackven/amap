<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: District.php
 * Description: 行政区域查询
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/6
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class District extends AmapRequestAbstract
{
    protected $uri = '/v3/config/district';
    protected $method = 'GET';

    /**
     * 查询关键字
     * @param $val 只支持单个关键词语搜索关键词支持：行政区名称、citycode、adcode 例如，在subdistrict=2，搜索省份（例如山东），能够显示市（例如济南），区（例如历下区）
     * @return $this
     */
    public function setKeywords($val){
        $this->params['keywords'] = $val;
        return $this;
    }

    /**
     * 子集行政区域
     * @param $val  设置显示下级行政区级数（行政区级别包括：国家、省/直辖市、市、区/县、乡镇/街道多级数据） 可选值：0、1、2、3等数字，并以此类推
     *              0：不返回下级行政区；
     *              1：返回下一级行政区；
     *              2：返回下两级行政区；
     *              3：返回下三级行政区；
     * @return $this
     */
    public function setSubdistrict($val){
        $this->params['subdistrict'] = $val;
        return $this;
    }

    /**
     * 查询第几页
     * @param $val
     * @return $this
     */
    public function setPage($val){
        $this->params['page'] = $val;
        return $this;
    }

    /**
     * 最外层返回数据个数
     * @param $val
     * @return $this
     */
    public function setOffset($val){
        $this->params['offset'] = $val;
        return $this;
    }

    /**
     * 返回结果控制
     * @param $val      可选值：base、all;
     *                  base:不返回行政区边界坐标点；
     *                  all:只返回当前查询district的边界值，不返回子节点的边界值；目前不能返回乡镇/街道级别的边界值
     * @return $this
     */
    public function setExtensions($val){
        $this->params['extensions'] = $val;
        return $this;
    }

    /**
     * 根据区划过滤
     * @param $val      按照指定行政区划进行过滤，填入后则只返回该省/直辖市信息需填入adcode，为了保证数据的正确，强烈建议填入此参数
     * @return $this
     */
    public function setFilter($val){
        $this->params['filter'] = $val;
        return $this;
    }

}