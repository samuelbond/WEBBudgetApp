<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:11
 */

namespace component\mycomponent;


use application\AbstractEntityManager;
use application\BaseEntityManager;

class EntityManager implements BaseEntityManager{

    private static $entityManagerInstance = null;

    public function reconfigure()
    {
        $em = new AbstractEntityManager();
        //Configure Namespace
        $em->setProxyNamespace("model\mycomponent\proxy");
        $em->setProxyPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."mycomponentt".DIRECTORY_SEPARATOR."proxy");
        $em->setEntityPath(_SITE_PATH."model".DIRECTORY_SEPARATOR."mycomponent");
        return $em;
    }

    public static function createEntityManager()
    {
        if(!EntityManager::$entityManagerInstance)
        {
            self::$entityManagerInstance = self::reconfigure()->createEntityManager();
            return self::$entityManagerInstance;
        }

        return self::$entityManagerInstance;
    }
} 