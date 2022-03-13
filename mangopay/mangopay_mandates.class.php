<?php

class Mandates
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getMandate($mandate_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/mandates/" . $mandate_id);
    }
    function cancelMandate($mandate_id)
    {
        /* The mandate must have the "SUBMITTED" or "ACTIVE" status to be acceptable */
        return $this->requests->do_put_request($this->requests->defaultRequest . "/mandates/" . $mandate_id . "/cancel");
    }

    function getAllMandates(){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/mandates/");
    }

    function getUserMandates($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/mandates/");
    }
    function getBankAccountMandates($user_id, $bank_account_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/bankaccounts/" . $bank_account_id . "/mandates/");
    }
}