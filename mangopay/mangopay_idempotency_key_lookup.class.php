<?php

class Idempotency{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getAPIResponse($IdempotencyKey){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/responses/" . $IdempotencyKey);
    }

}