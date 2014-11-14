<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 14/11/14
 * Time: 16:27
 */

namespace controller;


use application\BaseController;

class transactionController extends BaseController{

    public function index()
    {
        if(isset($_SESSION['userId']))
        {
            $accountId = null;

            if(isset($_POST['account']))
            {
                $accountId = $_POST['account'];
            }

            if(is_null($accountId))
            {
                if(isset($_GET['show']))
                {
                    $accountId = $_GET['show'];
                }

            }
        }
        else
            $this->registry->template->loadView("index");
    }

} 