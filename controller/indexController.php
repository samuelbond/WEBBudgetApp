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
            elseif($_GET['remove'])
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

            $this->registry->template->loadView("dashboard");
            return;
        }
        else
        $this->registry->template->loadView("index");
    }

    /**
     * @return $this|\component\budgetapp\v1\BudgetApp
     */
    public function getNewBudgetComponent()
    {
        return (new BudgetApp())->loadComponent();
    }




} 