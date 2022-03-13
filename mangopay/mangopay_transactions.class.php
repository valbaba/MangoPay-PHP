<?php

class Transactions
{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getUserTransactions($user_id)
    {
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/transactions/");
    }

    function getWalletTransactions($wallet_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/wallets/" . $wallet_id . "/transactions/");
    }

    function getDisputeTransactions($dispute_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/transactions/");
    }

    function getClientWalletTransactions($fund_type, $currency = "EUR")
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/clients/wallets/" . $fund_type . "/" . $currency . "/transactions/");
    }

    function getPreAuthorizationTransactions($preauthorization_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/preauthorizations/" . $preauthorization_id . "/transactions/");
    }

    function getBankAccountTransactions($bank_account_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/bankaccounts/" . $bank_account_id . "/transactions/");
    }

    function getCardTransactions($card_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/cards/" . $card_id . "/transactions/");
    }

    function getMandateTransactions($mandate_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/mandates/" . $mandate_id . "/transactions/");
    }
}