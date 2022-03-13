<?php

class UBODeclarations
{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createUboDeclaration($user_id)
    {
        return $this->requests->do_post_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/");
    }

    function createUbo($user_id, $ubo_declaration_id, $user_first_name, $user_last_name, $user_address, $user_additional_address, $user_city, $user_region, $user_postal_code, $user_country, $user_birthday, $user_birth_city, $user_birth_country = "FR", $user_nationality = "FR")
    {
        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Address": {
                        "AddressLine1": "' . $user_address . '",
                        "AddressLine2": "' . $user_additional_address . '",
                        "City": "' . $user_city . '",
                        "Region": "' . $user_region . '",
                        "PostalCode": "' . $user_postal_code . '",
                        "Country": "' . $user_country . '"
                        },
                        "Nationality": "' . $user_nationality . '",
                        "Birthday": ' . $user_birthday . ',
                        "Birthplace": {
                            "City": "' . $user_birth_city . '",
                            "Country": "' . $user_birth_country . '"
                        }
                }';
        return $this->requests->do_post_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/" . $ubo_declaration_id . "/ubos/", $body);
    }

    function submitUBODeclaration($user_id, $ubo_declaration_id, $status)
    {
        /*
         * CREATED,
         * VALIDATION_ASKED,
         * INCOMPLETE,
         * VALIDATED,
         * REFUSED
         * */

        $body = '{
                    "Status": "' . $status . '"
                }';
        return $this->requests->do_put_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/" . $ubo_declaration_id, $body);
    }

    function updateUBO($user_id, $ubo_declaration_id, $ubo_id , $user_first_name, $user_last_name, $user_address, $user_additional_address, $user_city, $user_region, $user_postal_code, $user_country, $user_birthday, $user_birth_city, $user_birth_country = "FR", $user_nationality = "FR"){
        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Address": {
                        "AddressLine1": "' . $user_address . '",
                        "AddressLine2": "' . $user_additional_address . '",
                        "City": "' . $user_city . '",
                        "Region": "' . $user_region . '",
                        "PostalCode": "' . $user_postal_code . '",
                        "Country": "' . $user_country . '"
                        },
                        "Nationality": "' . $user_nationality . '",
                        "Birthday": ' . $user_birthday . ',
                        "Birthplace": {
                            "City": "' . $user_birth_city . '",
                            "Country": "' . $user_birth_country . '"
                        }
                }';
        return $this->requests->do_put_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/" . $ubo_declaration_id . "/ubos/" . $ubo_id, $body);
    }

    function getUBO($user_id, $ubo_declaration_id, $ubo_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/" . $ubo_declaration_id . "/ubos/" . $ubo_id);
    }

    function getUserUBO($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id . "/kyc/ubodeclarations/");
    }

}