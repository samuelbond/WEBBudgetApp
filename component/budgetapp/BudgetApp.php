<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 11/7/2014
 * Time: 9:39 PM
 */

namespace component\budgetapp;


use application\BaseComponent;

class BudgetApp extends BaseComponent{
    /**
     * Loads a component based on current version
     * @return $this|\component\budgetapp\v1\BudgetApp
     */
    public function loadComponent()
    {
        return $this->selectVersion($this->getCurrentVersion());
    }


    /**
     * Selects the given version of this component
     *
     * @param $version
     * @return $this|\component\budgetapp\v1\BudgetApp
     */
    private function selectVersion($version)
    {
        switch($version)
        {
            case "1.0":
                return new \component\budgetapp\v1\BudgetApp();
            default:
                return $this;
        }
    }
} 