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

    private $countries = array("GBP" => "UK", "USD" => "USA", "EUR" => "EURO ZONE");

    public function index(){

        $budgetComp = (new BudgetApp())->loadComponent();

        if(isset($_POST['password']))
        {

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
                $acct = $budgetComp->getUserAccounts($id);
                if($acct['status'] == "success")
                {
                    $this->registry->template->accounts = $acct['list'];
                }
                $error = $budgetComp->getLastError();
                if(!is_null($error))
                {
                    $this->registry->template->erroralert = $error;
                }
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
            $acct = $budgetComp->getUserAccounts($id);

            if(isset($_POST['acc_name']))
            {
                $acctName = $_POST['acc_name'];
                $acctNumber = $_POST['acc_number'];
                $startBalance = ($_POST['balance'] * 100);
                $currency = $_POST['currency'];
                $country = $this->countries[$currency];
                $budgetComp->createNewBankAccount($id, $acctName, $acctNumber, $startBalance, $currency, $country);
                echo $error = $budgetComp->getLastError();
                return;
            }

            if($acct['status'] == "success")
            {
                $this->registry->template->accounts = $acct['list'];
            }
            $error = $budgetComp->getLastError();
            if(!is_null($error))
            {
                $this->registry->template->erroralert = $error;
            }

            $this->registry->template->loadView("dashboard");
            return;
        }
        else
        $this->registry->template->loadView("index");
    }




} 