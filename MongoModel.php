<?php


class MongoModel
{
    private $mgr;
    const _constring = "mongodb://localhost:27017";

    function __construct(){
        if(!$this->mgr) {
            $this->mgr = new MongoDB\Driver\Manager(self::_constring);
        }
    }

    function authenticate($username, $password) {
        $filter = ['userName'=>$username, 'password' => $password];
        $options = [
            'sort' => ['_id' => -1],
        ];
        $query = new MongoDB\Driver\Query($filter, $options);
        $results = $this->mgr->executeQuery('Pets.users', $query);
        return $results;
    }

    function registerUser($userData) {
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['userName' => $userData['userName'], 'password' => $userData['password']]);
        $cursor = $this->mgr->executeBulkWrite('Pets.users', $bulk);
        return $cursor;
    }
}


?>