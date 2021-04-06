<?php
/**
 * ---------------------------------------------------------------------------------------------------------------------
 * FileName: FactoryInterface.php
 * Description:
 * ---------------------------------------------------------------------------------------------------------------------
 * Author: jackven <jackven@qq.com>
 * Date:    2021/4/2
 * Version: 1.0
 */

namespace VenAmap\Contracts;


interface FactoryInterface
{
    /**
     * @param $driver
     * @return mixed
     */
    public function driver($driver);
}