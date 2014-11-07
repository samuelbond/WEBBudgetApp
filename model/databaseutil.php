<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace model;


use exceptions\DatabaseException;

class databaseutil {

    private $db;


    public function __construct(Db $db)
    {
        $this->db = $db;   //Db("mysqli", "mydb", "mydb_pass", "mydb_user", "localhost");
    }
    
    public function mysqliConnection()
    {
        $mysqli = new \mysqli($this->db->getHost(), $this->db->getDbUsername(), $this->db->getDbPassword(), $this->db->getDbName());

        if($mysqli->connect_errno)
        {
            $oldEx = $mysqli->connect_error;
            $mysqli = new \mysqli("127.0.0.1", $this->db->getDbUsername(), $this->db->getDbPassword(), $this->db->getDbName(), 3306);

            if($mysqli->connect_errno)
            {
                throw new DatabaseException("Failed to connect to database using host ".$this->db->getHost()." with message ".$oldEx."
                                            Tried again using host 127.0.0.1 with message".$mysqli->connect_error);
            }

        }

        return $mysqli;
    }

    public function pdoConnection()
    {
        $pdo = null;
        try {
            $pdo = new \PDO($this->db->getDatabaseType().":host=".$this->db->getHost().";dbname=".$this->db->getDbName(), $this->db->getDbUsername(), $this->db->getDbPassword());
        } catch(\PDOException $ex)
        {
            throw new DatabaseException("Failed to connect to database using host".$this->db->getHost()." with message ".$ex->getMessage());
        }

        return $pdo;
    }


    
    
}