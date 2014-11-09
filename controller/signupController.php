<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 11/8/2014
 * Time: 10:33 PM
 */

namespace controller;


use application\BaseController;
use component\budgetapp\BudgetApp;

class signupController extends BaseController{

    public function index()
    {
        if(isset($_POST['name']))
        {
            $budgetComp = (new BudgetApp())->loadComponent();
            $fullName = $_POST['name'];
            $email = $_POST['email'];
            $passowrd = $_POST['password'];
            $response = $budgetComp->registerNewUser($fullName, $email, $passowrd);

            if($response['status'] == "success")
            {
                $this->registry->template->success = "Your account has been created successfully click <a href='index'>here</a> to login";
            }
            else
            {
                $this->registry->template->error = "An error occurred while trying to create your account, please check your details and try again";
            }
        }


        $this->registry->template->loadView("signup");


    }
} 