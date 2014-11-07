<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace autoloader;

/**
 * Class Autoloader
 * @package autoloader
 */
class Autoloader
{

    /**
     * Loads a given class
     * @param $className
     */
    public static function load($className)
    {

        $path = _SITE_PATH. str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
        if(file_exists($path))
        {
            require_once $path;
        }

    }
}
