<?php
namespace Fizzbuzz\V1\Rest\FizzBuzzApi;

class FizzBuzzApiResourceFactory
{
    public function __invoke($services)
    {
        return new FizzBuzzApiResource();
    }
}
