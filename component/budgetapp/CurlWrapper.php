<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 11/8/2014
 * Time: 10:44 PM
 */

namespace component\budgetapp;


class CurlWrapper {

    protected $curl = null;

    function __construct()
    {
        $this->curl = curl_init();
        $this->initializeCurl();
    }


    protected function initializeCurl()
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function Get($url, $dataType = null)
    {
        curl_setopt($this->curl,CURLOPT_URL,$url);

        return (($dataType == "JSON") ? $this->jsonParser($this->curlExecute($this->curl)) : $this->curlExecute($this->curl));
    }

    public function Post($url, array $data, $dataType = "JSON")
    {
        curl_setopt($this->curl,CURLOPT_URL,$url);
        curl_setopt($this->curl, CURLOPT_POST, true);

        if($dataType === "JSON")
        {
            $json = json_encode($data);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $json);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
        }
        else
        {
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        }

        return (($dataType == "JSON") ? $this->jsonParser($this->curlExecute($this->curl)) : $this->curlExecute($this->curl));
    }

    protected function curlExecute($curl)
    {
        $output =  curl_exec($curl);
        if($output === false)
        {
            echo "Error Number:".curl_errno($this->curl)."<br>";
            echo "Error String:".curl_error($this->curl);
        }
        curl_close($curl);

        return $output;
    }

    public function jsonParser($content)
    {
        return json_decode($content, true);
    }
} 