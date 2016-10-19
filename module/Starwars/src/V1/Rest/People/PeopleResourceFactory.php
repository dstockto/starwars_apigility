<?php
namespace Starwars\V1\Rest\People;

class PeopleResourceFactory
{
    public function __invoke($services)
    {
        $starwars = $services->get(StarwarsService::class);
        $sql = $services->get('starwars-sql');
        return new PeopleResource($starwars, $sql);
    }
}
