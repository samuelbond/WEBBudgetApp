<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:30
 */

namespace controller;


use application\BaseController;
use component\budgetapp\BudgetApp;

class indexController extends BaseController{

    public function index(){

        if(isset($_POST['email']))
        {
            $budgetComp = (new BudgetApp())->loadComponent();
            $email = $_POST['email'];
            $passowrd = $_POST['password'];
            $response = $budgetComp->loginUser( $email, $passowrd);

            if($response['status'] == "success")
            {
                $this->startUserSession($response['userId'], $response['fullname'], $response['email']);
                list($id, $name, $email) = $this->getUserSessionData();
                $this->registry->template->fullname = $name;
                $this->registry->template->userId = $id;
                $this->registry->template->email = $email;
                $this->registry->template->loadView("dashboard");
                return;
            }
            else
            {
                $this->registry->template->error = "An error occurred while trying to log you in, please check your details and try again";
                $this->registry->template->loadView("index");
                return;
            }
        }
        elseif(isset($_GET['logout']))
        {
            $this->endUserSession();
            $this->registry->template->loadView("index");
        }
        elseif(isset($_SESSION['userId']))
        {
            list($id, $name, $email) = $this->getUserSessionData();
            $this->registry->template->fullname = $name;
            $this->registry->template->userId = $id;
            $this->registry->template->email = $email;
            $this->registry->template->loadView("dashboard");
            return;
        }
        else
        $this->registry->template->loadView("index");
    }




} 