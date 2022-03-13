<?php

class UserEmoney{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getUserEMoney($user_id, $year = "", $month = ""){
        if(isset($year) && isset($month)){
            return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/emoney/" . $year . "/" .$month);
        }
        if(isset($month) && !isset($year)){
            return "The year is required";
        }
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/emoney/");
    }
}