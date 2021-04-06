<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: Ip.php
 * Description: IP地址定位
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap\Request;


use VenAmap\Contracts\AmapRequestAbstract;

class IP extends AmapRequestAbstract
{
    protected $uri = '/v3/ip';
    protected $method = 'GET';

    /**
     * 设置IP地址
     * @param $ip
     * @return $this
     */
    public function setIP($ip){
        $this->params['ip'] = $ip;
        return $this;
    }
}