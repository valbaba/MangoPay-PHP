<?php

class Refunds
{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createPayingRefund($user_id, $debited_funds, $payin_id, $fees = "", $tag = "", $currency = "EUR")
    {

        $debited_funds = number_format($debited_funds, 2, '', '');

        $body = '{
                    "AuthorId": "' . $user_id . '",
                    "DebitedFunds": {
                        "Currency": "' . $currency . '",
                        "Amount": ' . $debited_funds . '
                    },
                    "Tag": "' . $tag . '",
                    "Fees": {
                        "Currency": "' . $currency . '",
                        "Amount": ' . $fees . '
                    }
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/payins/" . $payin_id . "/refunds/");
    }

    function createTransferRefund($user_id, $transfer_id)
    {
        $body = '{
                    "AuthorId": "' . $user_id . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/transfers/" . $transfer_id . "/refunds/", $body);
    }

    function getRefund($refund_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/refunds/" . $refund_id);
    }

    function getPayoutRefunds($payout_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/payouts/" . $payout_id . "/refunds/");
    }

    function getPayinRefunds($payin_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/payins/" . $payin_id . "/refunds/");
    }

    function getTransferRefunds($transfer_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/transfers/" . $transfer_id . "/refunds/");
    }

    function getRepudiationsRefunds($repudiation_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/repudiations/" . $repudiation_id . "/refunds/");
    }
}