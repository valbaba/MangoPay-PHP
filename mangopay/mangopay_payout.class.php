<?php

class PayOut
{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createPayOut($vendorMangoId, $transferredMoney, $vendorWalletId, $bankAccountId, $invoiceLabel = "", $payement_mode_requested = "STANDARD")
    {
        $transferredMoney = number_format($transferredMoney, 2, '', '');
        $body = '{
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
                    "PayoutModeRequested": "' . $payement_mode_requested . '"
                }';
        return $this->requests->do_post_request($this->requests->defaultRequest . "/payouts/bankwire/", $body);
    }

    function checkPayoutEligibility($vendorMangoId, $transferredMoney, $vendorWalletId, $bankAccountId, $invoiceLabel = "", $payement_mode_requested = "STANDARD")
    {
        $body = '{
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
                    "PayoutModeRequested": "' . $payement_mode_requested . '"
                }';
        return $this->requests->do_post_request($this->requests->defaultRequest . "/payouts/reachability/", $body);
    }

    function getPayout($payout_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/payouts/" . $payout_id);
    }
    function getPayoutAndModeApplied($payout_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/payouts/bankwire/" . $payout_id);
    }

}