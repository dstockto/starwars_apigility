<?php
/**
 * Created by PhpStorm.
 * User: dstockton
 * Date: 10/18/16
 * Time: 12:09 PM
 */

namespace Starwars\V1\Rest\People;


use Zend\Db\Sql\Sql;

class StarWarsSqlFactory
{
    public function __invoke($services)
    {
        $db = $services->get('starwars');
        return new Sql($db);
    }
}