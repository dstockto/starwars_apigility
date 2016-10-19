<?php
namespace Starwars\V1\Rest\People;

use Zend\Stdlib\ArraySerializableInterface;

class PeopleEntity implements ArraySerializableInterface
{
    private $id;
    private $name;
    private $birthYear;
    private $eyeColor;
    private $gender;
    private $hairColor;
    private $height;
    private $mass;
    private $skinColor;
    private $films;

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $allowed = [
            'id' => 'id',
            'name' => 'name',
            'birth_year' => 'birthYear',
            'eye_color' => 'eyeColor',
            'gender' => 'gender',
            'hair_color' => 'hairColor',
            'height' => 'height',
            'mass' => 'mass',
            'skin_color' => 'skinColor',
            'films' => 'films',
        ];

        foreach ($allowed as $dbField => $classField) {
            if (array_key_exists($dbField, $array)) {
                $this->$classField = $array[$dbField];
            }
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'birth_year' => $this->birthYear,
            'eye_color' => $this->eyeColor,
            'gender' => $this->gender,
            'hair_color' => $this->hairColor,
            'height' => $this->height,
            'mass' => $this->mass,
            'skin_color' => $this->skinColor,
            'films' => $this->films
        ];
    }
}
