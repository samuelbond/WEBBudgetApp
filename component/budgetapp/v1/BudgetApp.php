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

    public function getUserAccounts($userId)
    {
        $this->currentLink = $this->apiRootLink."accounts/";
    }


} 