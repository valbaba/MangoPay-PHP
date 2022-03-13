<?php

class SSO{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createSSO($user_first_name, $user_last_name, $user_email, $permission_group_id){
        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Email": "' . $user_email . '",
                "PermissionGroupId": "' . $permission_group_id . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/clients/SSOs/", $body);
    }

    function updateSSO($user_first_name, $user_last_name, $user_email, $permission_group_id, $sso_id){
        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Email": "' . $user_email . '",
                "PermissionGroupId": "' . $permission_group_id . '"
                }';

        return $this->requests->do_put_request($this->requests->defaultRequest . "/clients/SSOs/" . $sso_id, $body);
    }

    function getSSO($sso_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . "/clients/SSOs/" . $sso_id);
    }


    function getAllSSO($sso_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . "/clients/SSOs/");
    }

    function extendSSOInvitation($sso_id){
        return $this->requests->do_put_request($this->requests->defaultRequest . "/clients/SSOs/" . $sso_id . "/extendinvitation/");
    }

    function getAllSSOPermissionGroup($sso_group_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/clients/PermissionGroups/" . $sso_group_id . "/SSOs/");
    }


}