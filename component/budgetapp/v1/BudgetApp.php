<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 11/7/2014
 * Time: 9:40 PM
 */

namespace component\budgetapp\v1;


use component\budgetapp\CurlWrapper;

class BudgetApp extends \component\budgetapp\BudgetApp{


    protected $curlWrapper;

    protected $apiRootLink = "http://localhost:8080/BudgetAPI_war_exploded/webresources/co.uk.platitech.budget.";

    protected $currentLink = "";

    function __construct()
    {
        $this->curlWrapper = new CurlWrapper();
    }


    public function registerNewUser($fullName, $email, $password)
    {
        $this->currentLink = $this->apiRootLink."users/register";
        return $this->curlWrapper->Post($this->currentLink, array("fullname" => $fullName, "email" => $email, "password" => $password));
    }

    public function loginUser($email, $password)
    {
        $this->currentLink = $this->apiRootLink."users/login";
      return $this->curlWrapper->Post($this->currentLink, array("email" => $email, "password" => $password));
    }

    public function getAccountTransaction($userId, $accountId, $fetchBudget = null)
    {
        $this->currentLink = $this->apiRootLink."accounts/transaction";
        return $this->curlWrapper->Post($this->currentLink,
            (!(is_null($fetchBudget)) ?  array(
                "account_id" => $accountId,
                "user_id" => $userId,
                "budget" => $fetchBudget
            ) :  array(
                "account_id" => $accountId,
                "user_id" => $userId
            ))
        );
    }


    public function addNewTransaction($userId, $accountId, $transactionName, $transactionAmount, $transactionType, $transactionDate, $budget = null)
    {
        $this->currentLink = $this->apiRootLink."accounts/transaction/add";
        $data = array(
            "account_id" => $accountId,
            "user_id" => $userId,
            "trx_name" => $transactionName,
            "trx_amount" => $transactionAmount,
            "type" => $transactionType,
            "trx_date" => $transactionDate,
            "transaction_type" => ((is_null($budget)) ? "account" : "budget")
        );

        if(!is_null($budget))
        {
            $data['budget_id'] = $budget;
        }

        return $this->curlWrapper->Post($this->currentLink, $data);
    }

    public function getUserAccounts($userId)
    {
        $this->currentLink = $this->apiRootLink."accounts/".$userId;
        return $this->curlWrapper->Get($this->currentLink);
    }

    public function createNewBankAccount($userId, $accountName, $accountNumber, $startingBalance, $currency, $country)
    {
        $this->currentLink = $this->apiRootLink."accounts/create";
       return $this->curlWrapper->Post($this->currentLink,
           array(
               "account_name" => $accountName,
               "account_number" => $accountNumber,
               "user_id" => $userId,
               "start_balance" => intval($startingBalance),
               "currency_code" => $currency,
               "currency_country" => $country
           ));
    }


    public function deleteBankAccount($accountId)
    {
        $this->currentLink = $this->apiRootLink."accounts/delete";
        return $this->curlWrapper->Post($this->currentLink,
            array(
                "account_id" => $accountId
            ));
    }

    public function createNewBudget($accountId, $userId, $budgetName, $budgetDescription, $budgetMaxAmount)
    {
        $this->currentLink = $this->apiRootLink."accounts/create/budget";
        return $this->curlWrapper->Post($this->currentLink,
            array(
                "account_id" => $accountId,
                "user_id" => $userId,
                "budget_name" => $budgetName,
                "budget_description" => $budgetDescription,
                "budget_amount" => $budgetMaxAmount
            ));
    }

    public function getAllUserBudget($userId)
    {
        $this->currentLink = $this->apiRootLink."accounts/budgets";
        return $this->curlWrapper->Post($this->currentLink,
            array(
                "user_id" => $userId
            ));
    }

    /**
     * @return null|string
     */
    public function getLastError()
    {
        return (($this->curlWrapper->isError()) ? $this->curlWrapper->getErrorMessage() : null);
    }


} 