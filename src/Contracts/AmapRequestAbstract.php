<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: AmapRequestAbstract.php
 * Description:
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap\Contracts;


use VenAmap\AmapClient;

abstract class AmapRequestAbstract
{
    protected $params   = [];
    protected $method   = [];
    protected $uri      = [];

    public function setParam($field,$value){
        $this->params[$field] = $value;
        return $this;
    }

    public function setParams($data){
        $this->params = $data;
        return $this;
    }

    public function getParam($field){
        return $this->params[$field];
    }

    public function getParams(){
        return $this->params;
    }

    public function send(){
        return AmapClient::getInstance()->send($this->uri,$this->params,$this->method);
    }

}