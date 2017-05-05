<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatasetArr {
    public function soapResult($result,$type)
    {
        $type = $type."Result";
        $xml = simplexml_load_string($result->$type->any);

        $res = $xml->NewDataSet->Response;
        $response=json_decode(json_encode($res),true);
        $response_result = array();
        foreach ( $response as $key => $value){
            //echo $key . ' => ' . $value . "<br>";
            $response_result[$key] = $value;
        }

        return $response_result;
    }


    public function soapData($result,$type,$type1)
    {
        $type = $type."Result";
        $xml = simplexml_load_string($result->$type->any);

        $info = $xml->NewDataSet->$type1;

        $dataInfo=json_decode(json_encode($info),true);
        $dataInfo_result = array();

        foreach ($dataInfo as $key => $value)
        {
            if(!is_array($value)) {
                //echo $key . ' => ' . $value . "<br>";
                $value = $value;
            }else{
                //echo $key . ' => null<br>';
                $value = "";
            }
            $dataInfo_result[$key] = $value;
        }
        return $dataInfo_result;
    }


    public function soapDataNew($result,$type,$type1,$xmlType)
    {
        $type = $type."Result";
        $xml = simplexml_load_string($result->$type->any);

        $info = $xml->NewDataSet->$type1;

        $dataInfo_result = $this->soapDataConvert($info,$xmlType);

        var_dump($dataInfo_result);
        return $dataInfo_result;
    }


    public function soapDataConvert($info,$xmlType)
    {

        $dataInfo_result = array();

        if($xmlType == "list"){

            $chki = 0;
            foreach ($info as $character) {
                //echo $character->userid;

                $dataInfo=json_decode(json_encode($character),true);

                foreach ($dataInfo as $key => $value)
                {
                    if(!is_array($value)) {
                        echo $key . ' => ' . $value . "<br>";
                        $value = $value;
                    }else{
                        echo $key . ' => null<br>';
                        $value = "";
                    }
                    $dataInfo_result[$chki][$key] = $value;
                }
                $chki++;
            }

        }else{

            $dataInfo=json_decode(json_encode($info),true);
            foreach ($dataInfo as $key => $value)
            {
                if(!is_array($value)) {
                    echo $key . ' => ' . $value . "<br>";
                    $value = $value;
                }else{
                    echo $key . ' => null<br>';
                    $value = "";
                }
                $dataInfo_result[$key] = $value;
            }
        }

        return $dataInfo_result;
    }



    public function customerInfo($result)
    {
        $xml = simplexml_load_string($result->GetCustomerInfoResult->any);

        $user_info = $xml->NewDataSet->CustomerInfo;

        $customerInfo=json_decode(json_encode($user_info),true);
        $customerInfo_result = array();

        foreach ($customerInfo as $key => $value)
        {
            if(!is_array($value)) {
                echo $key . ' => ' . $value . "<br>";
                $value = $value;
            }else{
                echo $key . ' => null<br>';
                $value = "";
            }
            $customerInfo_result[$key] = $value;
        }
        return $customerInfo_result;
    }




    public function validateCustomer($result)
    {
        $xml = simplexml_load_string($result->ValidateCustomerResult->any);

        $user_info = $xml->NewDataSet->CustomerInfo;

        $validateCustomer=json_decode(json_encode($user_info),true);
        $validateCustomer_result = array();

        foreach ($validateCustomer as $key => $value)
        {
            if(!is_array($value)) {
                echo $key . ' => ' . $value . "<br>";
                $value = $value;
            }else{
                echo $key . ' => null<br>';
                $value = "";
            }
            $validateCustomer_result[$key] = $value;
        }
        return $validateCustomer_result;
    }




}