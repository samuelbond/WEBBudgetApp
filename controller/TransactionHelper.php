<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 08/12/14
 * Time: 17:26
 */

namespace controller;


trait TransactionHelper {

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


    public function calculateTotalPages($sizeOfItem, $pageSize)
    {
        $total = ceil($sizeOfItem/$pageSize);

        return $total;
    }

    public function getStartAndStop($page = 1, $sizeOfItem, $pageSize)
    {
        if($page == 0)
        {
            $page = 1;
        }
        $start = $pageSize * ($page - 1);
        $start = (($start > $sizeOfItem) ? $sizeOfItem : $start);
        $stop = $pageSize + ($start - 1);
        $stop = (($stop > $sizeOfItem) ? $sizeOfItem : $stop);
        return array($start, $stop);
    }
} 