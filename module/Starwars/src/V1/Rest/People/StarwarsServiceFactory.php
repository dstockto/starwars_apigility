<?php
/**
 * Created by PhpStorm.
 * User: dstockton
 * Date: 10/18/16
 * Time: 11:59 AM
 */
namespace Starwars\V1\Rest\People;

class StarwarsServiceFactory
{
    public function __invoke($services)
    {
        $sql = $services->get('starwars-sql');
        return new StarwarsService($sql);
    }
}