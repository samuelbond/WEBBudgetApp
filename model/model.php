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


use component\logs\Logs;

class model {

    private static $databaseInstance = null;


    private function __construct(){

    }

    public static function createDatabase(Db $dbObject, $new = null)
    {
        $conn = null;

        if(!$new)
        {
            if(!self::$databaseInstance)
            {
                try{
                    if($dbObject->getDbDriver() == "mysqli")
                    {
                        self::$databaseInstance = (new databaseutil($dbObject))->mysqliConnection();
                        return self::$databaseInstance;
                    }
                    else
                    {
                         self::$databaseInstance = (new databaseutil($dbObject))->pdoConnection();
                         return self::$databaseInstance;
                    }
                }catch (\Exception $ex)
                {
                    (new Logs())->doLogging($ex->getMessage());
                    return null;
                 }
            }
        }
        else
        {
            try{
                if($dbObject->getDbDriver() == "mysqli")
                {
                    self::$databaseInstance = (new databaseutil($dbObject))->mysqliConnection();
                    return self::$databaseInstance;
                }
                else
                {
                    self::$databaseInstance = (new databaseutil($dbObject))->pdoConnection();
                    return self::$databaseInstance;
                }
            }catch (\Exception $ex)
            {
                (new Logs())->doLogging($ex->getMessage());
                return null;
            }
        }

    }


    private function __clone()
    {

    }

}