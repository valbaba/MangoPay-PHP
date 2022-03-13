<?php

class Disputes
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getDispute($dispute_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/disputes/" . $dispute_id);
    }

    function updateDispute($dispute_id){
        /* not enough infos on mangopay api docs to do something */
    }

    function closeDispute($dispute_id){
        return $this->requests->do_put_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/close/");
    }

    function submitDispute($dispute_id, $money, $currency = "EUR"){
        $money = number_format($money, 2, '', '');
        $body = '{
                    "ContestedFunds": {
                        "Currency": "'.$currency.'",
                        "Amount": '.$money.'
                    }
                }';

        return $this->requests->do_put_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/submit/", $body);
    }

    function reSubmitDispute($dispute_id){
        return $this->requests->do_put_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/submit/");
    }

    function getUserDisputes($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/disputes/");
    }

    function getWalletDisputes($wallet_id){
        return $this->requests->do_get_request($this->requests->defaultRequest  . "/wallets/" .  $wallet_id . "/disputes/");
    }

    function getAllDisputes($wallet_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/disputes/");
    }
    function getAllNeededSettlingDisputes(){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/disputes/pendingsettlement/");
    }
}

