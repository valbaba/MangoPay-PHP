<?php

class BankAccounts
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function getUserSpecificBankAccount($user_id, $bank_account_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest.$user_id."/bankaccounts/".$bank_account_id);
    }
    function getAllUserBankAccounts($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest.$user_id."/bankaccounts/");
    }
    function createUserIBANBankAccount($user_id, $owner_name, $owner_address, $owner_additional_address, $owner_city, $owner_region, $owner_postal_code, $owner_country, $owner_IBAN, $owner_bic = "", $tag = ""){

        $body = '{
                    "OwnerName": "'.$owner_name.'",
                    "OwnerAddress": {
                        "AddressLine1": "'.$owner_address.'",
                        "AddressLine2": "'.$owner_additional_address.'",
                        "City": "'.$owner_city.'",
                        "Region": "'.$owner_region.'",
                        "PostalCode": "'.$owner_postal_code.'",
                        "Country": "'.$owner_country.'"
                    },
                    "IBAN": "'.$owner_IBAN.'",
                    "BIC": "'.$owner_bic.'",
                    "Tag": "'.$tag.'"
                }';

        return $this->requests->do_post_request($this->requests->defaultUsersRequest.$user_id."/bankaccounts/iban/", $body);
    }

    function deactivateUserBankAccount($user_id, $user_bank_account_id){
        $body = '{
                    "Active": false
                }';
        return $this->requests->do_put_request($this->requests->defaultUsersRequest.$user_id."/bankaccounts/".$user_bank_account_id, $body);
    }

}