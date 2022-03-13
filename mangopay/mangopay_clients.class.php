<?php

class Clients
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

//    function updateClient(){
//
//
//        return $this->requests->do_put_request($this->requests->defaultRequest . "/bankingaliases/" . $banking_alias_id, $body);
//    }
}

