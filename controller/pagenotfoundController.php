<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 14/11/14
 * Time: 16:10
 */

namespace controller;


use application\BaseController;

class pagenotfoundController extends BaseController{

    public function index()
    {
        $this->registry->template->loadView("404");
    }
} 