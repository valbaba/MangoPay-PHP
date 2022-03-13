<?php

class Wallets{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createWallet($wallet_owner, $wallet_description, $currency = "EUR", $tag = ""){
        $body = '{
                "Owners": [ "' . $wallet_owner . '" ],
                "Description": "' . $wallet_description . '",
                "Currency": "' . $currency . '",
                "Tag": "' . $tag . '"
                }';
        return $this->requests->do_post_request($this->requests->defaultRequest . "/wallets/", $body);
    }

    function updateWallet($wallet_id, $wallet_description){
        $body = '{
                "Description": "' . $wallet_description . '"
                }';
        return $this->requests->do_put_request($this->requests->defaultRequest . "/wallets/" . $wallet_id, $body);
    }

    function getWallet($wallet_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/wallets/" . $wallet_id);
    }

    function getUserWallets($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/wallets/");
    }
}