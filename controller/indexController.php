<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:30
 */

namespace controller;


use application\BaseController;

class indexController extends BaseController{

    public function index(){
        $this->registry->template->loadView("index");
    }

} 