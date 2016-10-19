<?php
namespace Starwars\V1\Rest\People;

use Starwars\V1\Rest\Films\FilmsCollection;
use Starwars\V1\Rest\Films\FilmsEntity;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\DbSelect;

class StarwarsService
{
    /**
     * @var Sql
     */
    private $sql;

    public function __construct(Sql $sql)
    {
        $this->sql = $sql;
    }

    public function fetchAllPeople($params)
    {
        $select = $this->sql->select();
        $select->from('people');
        $select->order('id ASC');

        return $select;
    }

    public function fetchById($id)
    {
        $select = $this->fetchAllPeople([]);
        $select->where(['id = ?' => $id]);

        $result = $this->sql->prepareStatementForSqlObject($select)->execute();
        if ($result->count() == 0) {
            return false;
        }

        $data = $result->current();
        $data['films'] = $this->fetchFilmsByPersonId($id);
        $person = new PeopleEntity();
        $person->exchangeArray($data);
        return $person;
    }

    public function fetchFilmsByPersonId($personId)
    {
        $select = $this->sql->select();
        $select->from('people_films');
        $select->columns([]);
        $select->join('films', 'films.id = people_films.films_id');
        $select->where(['people_films.people_id = ?' => $personId]);

        $prototype = new HydratingResultSet(null, new FilmsEntity());
        $adapter = new DbSelect($select, $this->sql, $prototype);
        return new FilmsCollection($adapter);

    }
}