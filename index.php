<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */


/**
 * Bootstrap
 */
require_once "bootstrap.php";


/**
 *
 * Registry Settings
 * Here we call necessary configurations
 * such as routing, database e.t.c
 * And we register them so they can be accessible
 * Application Wide
 */


$registry = new \application\Registry();
$registry->router = new \application\Router($registry);
$registry->template = new \application\Template($registry);
$registry->template->setViewPath(_SITE_PATH."view".DIRECTORY_SEPARATOR);
$route = "";
$route = @$_GET['rt'];
$registry->router->loadController($route, _SITE_PATH."controller".DIRECTORY_SEPARATOR);

//End
