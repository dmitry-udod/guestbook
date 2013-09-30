<?php

namespace core;

use MongoClient;
use core\patterns\Singleton;
use models\Post;

class Db extends Singleton
{
    CONST DB_USER = 'admin';
    CONST DB_PASS = 'admin';
    CONST DB_NAME = 'guestbook';

    private $mongo = null;

    public function __construct()
    {
        try {
            $this->mongo = new MongoClient("mongodb://localhost", array(
                "username" => self::DB_USER,
                "password" => self::DB_PASS,
                'db'       => self::DB_NAME,
            ));
        } catch(\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Get mongo manager
     *
     * @return MongoClient|null
     */
    public function getMongoManager()
    {
        return $this->mongo;
    }

    /**
     * Save data to storage
     *
     * @param array $params
     * @return array|bool
     */
    public function save(array $params)
    {
        $collection =  $this->mongo->selectCollection(self::DB_NAME, Post::$table);

        return $collection->insert($params);
    }

    /**
     * Get all data from collection
     *
     * @param string $collectionName
     * @return array
     */
    public function findAll($collectionName)
    {
        $collection = $this->getMongoManager()->selectCollection(Db::DB_NAME, $collectionName);

        return iterator_to_array($collection->find());
    }
}