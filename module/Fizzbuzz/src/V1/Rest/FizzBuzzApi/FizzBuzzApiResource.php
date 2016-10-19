<?php
namespace Fizzbuzz\V1\Rest\FizzBuzzApi;

use Zend\Paginator\Adapter\ArrayAdapter;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class FizzBuzzApiResource extends AbstractResourceListener
{
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $number
     * @return ApiProblem|mixed
     */
    public function fetch($number)
    {
        $fizzbuzz = new FizzBuzzApiEntity();
        $fizzbuzz->setNumber($number);
        $fizzbuzz->setWord($this->getFizzBuzz($number));

        return $fizzbuzz;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $fizzbuzzes = [];

        for ($i = 1; $i <= 100; $i++) {
            $fizzbuzz = new FizzBuzzApiEntity();
            $fizzbuzz->setNumber($i);
            $fizzbuzz->setWord($this->getFizzBuzz($i));
            $fizzbuzzes[] = $fizzbuzz;
        }

        $adapter = new ArrayAdapter($fizzbuzzes);
        return new FizzBuzzApiCollection($adapter);
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }

    public function getFizzBuzz($number)
    {
        $word = '';
        if ($number % 3 == 0) {
            $word .= 'Fizz';
        }
        if ($number % 5 == 0) {
            $word .= 'Buzz';
        }

        if ($word == '') {
            $word = $number;
        }

        return $word;
    }
}
