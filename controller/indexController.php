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

    private $countries = array("GBP" => "UK", "USD" => "USA", "EUR" => "EURO ZONE", "PLN" => "POLAND", "HUF" => "HUNGARY");

    public function index(){

        $budgetComp = $this->getNewBudgetComponent();

        if(isset($_POST['password']))
        {

            $email = $_POST['email'];
            $passowrd = $_POST['password'];
            $response = $budgetComp->loginUser( $email, $passowrd);
            if(!isset($response['status']))
            {
                $this->registry->template->error = "Service is not available";
                $this->registry->template->loadView("index");
                return;
            }

            if($response['status'] == "success")
            {
                $this->startUserSession($response['userId'], $response['fullname'], $response['email']);
                list($id, $name, $email) = $this->getUserSessionData();
                $this->registry->template->fullname = $name;
                $this->registry->template->userId = $id;
                $this->registry->template->email = $email;
                $budgetComp = $this->getNewBudgetComponent();
                $acct = $budgetComp->getUserAccounts($id);
                if($acct['status'] == "success")
                {
                    $this->registry->template->accounts = $acct['list'];
                    $this->registry->template->currency = $this;
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
            $budgetComp = $this->getNewBudgetComponent();

            $cError = $gError = $dError = null;
            $created = null;
            $delete = null;

            list($id, $name, $email) = $this->getUserSessionData();
            $this->registry->template->fullname = $name;
            $this->registry->template->userId = $id;
            $this->registry->template->email = $email;

            if(isset($_GET['remove']))
            {
                $accountId = $_GET['remove'];

                $delete = $budgetComp->deleteBankAccount($accountId);
                $dError = $budgetComp->getLastError();
            }

            if(isset($_POST['acc_name']))
            {
                $acctName = $_POST['acc_name'];
                $acctNumber = $_POST['acc_number'];
                $startBalance = ($_POST['balance'] * 100);
                $currency = $_POST['currency'];
                $country = $this->countries[$currency];
                $created = $budgetComp->createNewBankAccount($id, $acctName, $acctNumber, $startBalance, $currency, $country);
                $cError = $budgetComp->getLastError();

            }
            $budgetComp = $this->getNewBudgetComponent();
            $acct = $budgetComp->getUserAccounts($id);



            if($acct['status'] == "success")
            {
                $this->registry->template->accounts = $acct['list'];
                $this->registry->template->currency = $this;
            }
            $gError = $budgetComp->getLastError();

            if(!is_null($cError) && strlen($cError) > 10)
            {
                $this->registry->template->erroralert = "An error has occurred, couldn't create new account";
            }
            elseif(!is_null($dError) && strlen($dError) > 10)
            {
                $this->registry->template->erroralert = "An error has occurred, couldn't remove account";
            }
            elseif(!is_null($gError) && strlen($cError) > 10)
            {
                $this->registry->template->erroralert = "An error has occurred, failed to load account";
            }
            elseif(isset($_POST['acc_name']))
            {
                if(is_array($created) && isset($created['status']))
                {
                    if($created['status'] == "success")
                    {
                        $this->registry->template->success = "Account created successfully!";
                    }
                    else
                    {
                        $this->registry->template->erroralert = "An error has occurred, couldn't create new account";
                    }
                }

            }
            elseif(isset($_GET['remove']))
            {
                if($delete['status'] == "success")
                {
                    $this->registry->template->success = "Account removed successfully!";
                }
                else
                {
                    $this->registry->template->erroralert = "An error has occurred, couldn't remove account";
                }
            }

            if(isset($_POST['budgetAccount']) && isset($_POST['bud_name']))
            {
                $budgetComp = $this->getNewBudgetComponent();
                $userId = $_SESSION['userId'];
                $accountId = $_POST['budgetAccount'];
                $budgetName = $_POST['bud_name'];
                $budgetAmountMax = "".($_POST['bud_max']*100)."";
                $budgetDescription = $_POST['bud_desc'];


                $response = $budgetComp->createNewBudget($accountId, $userId, $budgetName, $budgetDescription, $budgetAmountMax);

                if(isset($response['status']))
                {
                    if($response['status'] == "success")
                    {
                        $this->registry->template->success = "New Budget created successfully!";
                    }
                    else
                    {
                        $this->registry->template->erroralert = "Could not create new budget! ".$response['error'];
                    }
                }
                else
                {
                    $this->registry->template->erroralert = "Internal error, action failed please try again later";
                }

            }
            $budgetComp = $this->getNewBudgetComponent();
            $budgets = $budgetComp->getAllUserBudget($_SESSION['userId']);

            if(is_array($budgets) && sizeof($budgets) > 0)
            {
                if($budgets['status'] == "success" && isset($budgets['list']))
                {
                    $this->registry->template->budgets = $budgets['list'];
                }
            }

            $this->registry->template->loadView("dashboard");
            return;
        }
        else
        $this->registry->template->loadView("index");
    }

    public function getCurrencyCode($code)
    {
        if(strtoupper($code) === "GBP")
        {
            $code = "<span class='icon-gbp'></span>";
        }
        elseif(strtoupper($code) === "USD")
        {
            $code = "<span class='icon-usd'></span>";
        }
        elseif(strtoupper($code) === "EUR")
        {
            $code = "<span class='icon-euro'></span>";
        }

        return $code;
    }



} 