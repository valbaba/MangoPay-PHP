<?php

class Reporting{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createTransactionReport($callback_url, $sort = "CreationDate:DESC", $preview = "false"){
        /*
         * Sort : CreationDate:ASC OR CreationDate:DESC */
        $body = '{
                    "CallbackURL": "' . $callback_url . '",
                    "DownloadFormat": "CSV",
                    "Sort": "CreationDate:DESC",
                    "Preview": false,
                    "Filters": 
                        {
                        "BeforeDate": 1463440221,
                        "AfterDate": 1431817821,
                        "Type": [ "PAYIN" ],
                        "Status": [ "SUCCEEDED" ],
                        "Nature": [ "REGULAR" ],
                        "MinDebitedFundsAmount": 430,
                        "MinDebitedFundsCurrency": "EUR",
                        "MaxDebitedFundsAmount": 8790,
                        "MaxDebitedFundsCurrency": "EUR",
                        "MinFeesAmount": 120,
                        "MinFeesCurrency": "EUR",
                        "MaxFeesAmount": 450,
                        "MaxFeesCurrency": "EUR",
                        "AuthorId": "8494514",
                        "WalletId": "8494559"
                        },
                    "Columns": [ "Id", "CreationDate" ]
                }';


    }

}