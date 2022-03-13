<?php

class Requests
{
    public $listUsers = "v2.01/poseidon/users/?per_page=100";
    public $defaultUsersRequest = "v2.01/poseidon/users/";
    public $defaultRequest = "v2.01/poseidon/";
    public $transferRequest = "v2.01/poseidon/transfers/";
    public $payoutRequest = "v2.01/poseidon/payouts/bankwire/?per_page=100";
    public $eventRequest = "v2.01/poseidon/events/";
    public $reportRequest = "v2.01/poseidon/reports/";


    function do_get_request($url)
    {

        $auth = new AuthToken;
        // Curl authentification
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $auth->getAuthToken(),
            "Content-Type: application/x-www-form-urlencoded",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);


        $result = curl_exec($curl);

        if ($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        return json_decode($result);


    }

    function createTransfer($url, $vendorMangoId, $clientMangoId, $transferredMoney, $orderId, $vendorWalletId, $clientWalletId)
    {


        $moneyToVendor = $transferredMoney / 1.1;
        $fee = $transferredMoney - $moneyToVendor;
        $fee = number_format($fee, 2, '', '');
        if ($fee[0] == "0") {
            $fee = substr($fee, 1);
        }

        $transferredMoney = number_format($transferredMoney, 2, '', '');
//        echo $fee . "<br>";
//        echo $moneyToVendor . "<br>";
//        echo $transferredMoney . "<br>";
        $auth = new AuthToken;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $auth->getAuthToken(),
            "Content-Type: application/json; charset=utf-8",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '{
			"Tag": "' . $orderId . ',transfer",
			"AuthorId": "' . $clientMangoId . '",
			"CreditedUserId": "' . $vendorMangoId . '",
			"DebitedFunds": {
			"Currency": "EUR",
			"Amount": ' . $transferredMoney . '
			},
			"Fees": {
			"Currency": "EUR",
			"Amount": ' . $fee . '
			},
			"DebitedWalletId": "' . $clientWalletId . '",
			"CreditedWalletId": "' . $vendorWalletId . '"
		}');

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            print curl_error($curl);
        } else {
            curl_close($curl);
        }

        return $result;


    }

    function createPayOut($url, $vendorMangoId, $transferredMoney, $vendorWalletId, $bankAccountId, $invoiceLabel)
    {
        $transferredMoney = number_format($transferredMoney, 2, '', '');
        $auth = new AuthToken;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $auth->getAuthToken(),
            "Content-Type: application/json; charset=utf-8",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '{
            "AuthorId": "' . $vendorMangoId . '",
            "DebitedFunds": {
                "Currency": "EUR",
                "Amount": ' . $transferredMoney . '
            },
            "Fees": {
                "Currency": "EUR",
                "Amount": 0
            },
            "BankAccountId": "' . $bankAccountId . '",
            "DebitedWalletId": "' . $vendorWalletId . '",
            "BankWireRef": "' . $invoiceLabel . '",
            "PayoutModeRequested": "STANDARD"
        }');

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            print curl_error($curl);
        } else {
            curl_close($curl);
        }

        return $result;
    }

    function do_post_request($url, $body)
    {

        $auth = new AuthToken;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $auth->getAuthToken(),
            "Content-Type: application/json; charset=utf-8",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            print curl_error($curl);
        } else {
            curl_close($curl);
        }

        return $result;

    }

    function do_put_request($url, $body = "")
    {
        $auth = new AuthToken;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $auth->getAuthToken(),
            "Content-Type: application/json; charset=utf-8",
            "Accept:application/json, text/javascript, */*; q=0.01"
        ));
        curl_setopt($curl, CURLOPT_URL, "https://api.mangopay.com/" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            print curl_error($curl);
        } else {
            curl_close($curl);
        }
        return $response;
    }

}
