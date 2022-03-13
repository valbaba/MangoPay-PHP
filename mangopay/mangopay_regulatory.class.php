<?php

class Regulatory{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getUserBlockedStatus($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/Regulatory/");
    }
}