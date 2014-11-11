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
    protected $error = false;
    protected $errorMessage = "";


    function __construct()
    {
        $this->curl = curl_init();
        $this->initializeCurl();
    }




    protected function initializeCurl()
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function Get($url, $dataType = "JSON")
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
        $this->error = false;
        $output =  curl_exec($curl);
        if($output === false)
        {
            $this->error = true;
            $this->errorMessage =  "An error has occurred while performing action:".curl_errno($this->curl).curl_error($this->curl);
        }
        curl_close($curl);

        return $output;
    }

    public function isError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }



    public function jsonParser($content)
    {
        return json_decode($content, true);
    }
} 