<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;

/**
 * Class BaseController
 * @package application
 */
Abstract class BaseController {

    protected $registry;

    /**
     * @param $registry
     */
    public function __construct($registry)
    {
        @session_start();
        $this->registry = $registry;
    }

    protected function startUserSession($userId, $userName, $userEmail)
    {
        $_SESSION['userId'] = $userId;
        $_SESSION['userName'] = $userName;
        $_SESSION['userEmail'] = $userEmail;
    }

    protected function endUserSession()
    {
        if(isset($_SESSION['userId']))
        {
            unset($_SESSION['userId']);
            unset($_SESSION['userName']);
            unset($_SESSION['userEmail']);
            session_destroy();
        }
    }

    protected function getUserSessionData()
    {
        $name = ((isset($_SESSION['userName'])) ? $_SESSION['userName'] : "Guest");
        $id = ((isset($_SESSION['userId'])) ? $_SESSION['userId'] : "guestId");
        $email = ((isset($_SESSION['userEmail'])) ? $_SESSION['userEmail'] : "guestEmail");
        return array($id, $name, $email);
    }

    /**
     * The default action for all controllers
     * @return mixed
     */
    abstract public function index();




}
