<?php

class Transfers{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createTransfer($url, $vendorMangoId, $clientMangoId, $transferredMoney, $orderId, $vendorWalletId, $clientWalletId, $currency = "EUR"){



        $moneyToVendor = $transferredMoney / 1.1;
        $fee = $transferredMoney - $moneyToVendor;
        $fee = number_format($fee, 2, '', '');
        if($fee[0] == "0"){
            $fee = substr($fee, 1);
        }

        $transferredMoney = number_format($transferredMoney, 2, '', '');

        $body = '{
			"Tag": "'.$orderId.',transfer",
			"AuthorId": "'.$clientMangoId.'",
			"CreditedUserId": "'.$vendorMangoId.'",
			"DebitedFunds": {
                "Currency": "' . $currency . '",
                "Amount": '.$transferredMoney.'
			},
			"Fees": {
                "Currency": "' . $currency . '",
                "Amount": '.$fee.'
			},
			"DebitedWalletId": "'.$clientWalletId.'",
			"CreditedWalletId": "'.$vendorWalletId.'"
		}';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/transfers/", $body);
    }

    function getTransfer($transfer_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/transfers/" . $transfer_id);
    }

}