<?php

class Repudiations{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getRepudiation($repudiation_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/repudiations/" . $repudiation_id);
    }
}