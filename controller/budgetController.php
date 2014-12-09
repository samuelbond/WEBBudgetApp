<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 08/12/14
 * Time: 17:24
 */

namespace controller;


use application\BaseController;

class budgetController extends BaseController{

    use TransactionHelper;

    private $pageSize = 10;



    public function index()
    {

        if(isset($_SESSION['userId']))
        {

            $accountId = null;
            $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);

            if(isset($_POST['budgetAccount']) && isset($_POST['bud_name']))
            {
                $budgetComp = $this->getNewBudgetComponent();
                $userId = $_SESSION['userId'];
                $accountId = $_POST['budgetAccount'];
                $budgetName = $_POST['trx_name'];
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
                        $this->registry->template->error = "Could not new budget !";
                    }
                }
                else
                {
                    $this->registry->template->error = "Internal error, action failed please try again later";
                }

            }

            if(is_null($accountId))
            {
                if(isset($_GET['show']))
                {
                    $accountId = $_GET['show'];
                }
            }

            $budgetComp = $this->getNewBudgetComponent();

            if(!is_null($accountId))
            {

                $transactions = $budgetComp->getAccountTransaction($_SESSION['userId'], $accountId);

                if(isset($transactions['status']))
                {
                    if($transactions['status'] == "success")
                    {
                        if(isset($transactions['list']))
                        {
                            $this->registry->template->transactions = $transactions['list'];
                            $this->registry->template->totalPages = $this->calculateTotalPages(sizeof($transactions['list']), $this->pageSize);
                            list($pStart, $pStop) = $this->getStartAndStop($currentPage, sizeof($transactions['list']), $this->pageSize);
                            $this->registry->template->pageStart = $pStart;
                            $this->registry->template->pageStop = $pStop;
                            $this->registry->template->currentPage = $currentPage;
                            $this->registry->template->accountId = $accountId;
                        }
                        $this->registry->template->currentBalance = number_format(($transactions['balance']/100), 2);
                        $this->registry->template->lastBalance = number_format(($transactions['last_balance']/100), 2);
                        $this->registry->template->currency = $this->getCurrencyCode($transactions['currency']);
                        if(!isset($_POST['trx_name']))
                            $this->registry->template->info = ((isset($transactions['list'])) ? count($transactions['list'])." transactions were loaded successfully" : "There are no transactions yet in this account");
                    }
                    else
                    {
                        if(!isset($_POST['trx_name']))
                            $this->registry->template->error = "Could not load transactions for the account provided";
                    }
                }
                else
                {
                    if(!isset($_POST['trx_name']))
                        $this->registry->template->error = "Internal error, could not load transactions";
                }
            }
            else
            {
                if(!isset($_POST['trx_name']))
                    $this->registry->template->error = "Invalid action, trying to initiate an invalid action";
            }
            $this->registry->template->loadView("transactions");
        }
        else
            $this->registry->template->loadView("index");
    }
} 