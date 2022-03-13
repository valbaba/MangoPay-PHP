<?php

class AuthToken
{

//curl -X POST https://api.mangopay.com/v2.01/oauth/token/
// -H "Accept: application/x-www-form-urlencoded"
// -H "Authorization: Basic cG9zZWlkb246WmFBbktxdnpxd1Zid0ZFNnJicmticDBmYnpEYTZWYUc3RkJUVmJLRDVQdmhHOENRSDQ="
// -d "grant_type":"client_credentials"

    public $token = "cG9zZWlkb246WmFBbktxdnpxd1Zid0ZFNnJicmticDBmYnpEYTZWYUc3RkJUVmJLRDVQdmhHOENRSDQ=";


    function generateAuthToken()
    {

        $database = new Database;
        $date = date("d-m-Y_H-i-s");


        // Curl authentification
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic ". $this->token,
            "Content-Type: application/x-www-form-urlencoded",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/v2.01/oauth/token/");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array("grant_type"=>"client_credentials"));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);


        $result = curl_exec($curl);

        if($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        $json = json_decode($result);

        $sql = "UPDATE mangopay SET token='$json->access_token', creation_date='$date' WHERE id='1'";
        $database->conn->query($sql);


    }

    function getAuthToken(){
        $database = new Database;
        $sql = "SELECT * FROM mangopay";
        $result =  $database->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["token"];
    }

}