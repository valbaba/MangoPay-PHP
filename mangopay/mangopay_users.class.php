<?php

class Users{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createNaturalUser($user_first_name, $user_last_name, $user_email, $user_address, $user_additional_address, $user_city, $user_region, $user_postal_code, $use_country, $user_birthday, $user_occupation, $user_income_range, $user_nationality = "FR", $user_country_of_residence = "FR", $tag = ""){

        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Email": "' . $user_email . '",
                "Address": {
                    "AddressLine1": "' . $user_address . '",
                    "AddressLine2": "' . $user_additional_address . '",
                    "City": "' . $user_city . '",
                    "Region": "' . $user_region . '",
                    "PostalCode": "' . $user_postal_code . '",
                    "Country": "' . $use_country . '"
                },
                "Birthday": ' . $user_birthday . ',
                "Nationality": "' . $user_nationality . '",
                "CountryOfResidence": "' . $user_country_of_residence . '",
                "Occupation": "' . $user_occupation . '",
                "IncomeRange": ' . $user_income_range . ',
                "Tag": "' . $tag . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/users/natural/", $body);
    }

    function updateNaturalUser($user_id, $user_first_name, $user_last_name, $user_email, $user_address, $user_additional_address, $user_city, $user_region, $user_postal_code, $use_country, $user_birthday, $user_occupation, $user_income_range, $user_nationality = "FR", $user_country_of_residence = "FR", $tag = ""){

        $body = '{
                "FirstName": "' . $user_first_name . '",
                "LastName": "' . $user_last_name . '",
                "Email": "' . $user_email . '",
                "Address": {
                    "AddressLine1": "' . $user_address . '",
                    "AddressLine2": "' . $user_additional_address . '",
                    "City": "' . $user_city . '",
                    "Region": "' . $user_region . '",
                    "PostalCode": "' . $user_postal_code . '",
                    "Country": "' . $use_country . '"
                },
                "Birthday": ' . $user_birthday . ',
                "Nationality": "' . $user_nationality . '",
                "CountryOfResidence": "' . $user_country_of_residence . '",
                "Occupation": "' . $user_occupation . '",
                "IncomeRange": ' . $user_income_range . ',
                "Tag": "' . $tag . '"
                }';

        return $this->requests->do_put_request($this->requests->defaultRequest . "/users/natural/" . $user_id, $body);
    }

    function createLegalUser($business_address, $business_additional_address, $business_city, $business_region, $business_postal_code, $business_name,
                             $vendor_address, $vendor_additional_address , $vendor_city, $vendor_region, $vendor_postal_code, $vendor_country, $vendor_birthday, $vendor_country_of_residence,
                             $vendor_email,$vendor_first_name, $vendor_last_name, $business_number, $business_email, $tag = "", $vendor_nationality = "FR",
                             $legal_person_type = "BUSINESS" , $business_country = "FR"){
        /*
         * LegalPersonType :
         * BUSINESS,
         * ORGANIZATION,
         * SOLETRADER
        */
        $body = '{
                "HeadquartersAddress": {
                    "AddressLine1": "' . $business_address . '",
                    "AddressLine2": "' . $business_additional_address . '",
                    "City": "' . $business_city . '",
                    "Region": "' . $business_region . '",
                    "PostalCode": "' . $business_postal_code . '",
                    "Country": "' . $business_country . '"
                },
                "LegalPersonType": "' . $legal_person_type . '",
                "Name": "' . $business_name . '",
                "LegalRepresentativeAddress": {
                    "AddressLine1": "' . $vendor_address . '",
                    "AddressLine2": "' . $vendor_additional_address . '",
                    "City": "' . $vendor_city . '",
                    "Region": "' . $vendor_region . '",
                    "PostalCode": "' . $vendor_postal_code . '",
                    "Country": "' . $vendor_country . '"
                },
                "LegalRepresentativeBirthday": ' . $vendor_birthday . ',
                "LegalRepresentativeCountryOfResidence": "' . $vendor_country_of_residence . '",
                "LegalRepresentativeNationality": "' . $vendor_nationality . '",
                "LegalRepresentativeEmail": "' . $vendor_email . '",
                "LegalRepresentativeFirstName": "' . $vendor_first_name . '",
                "LegalRepresentativeLastName": "' . $vendor_last_name . '",
                "Email": "' . $business_email . '",
                "Tag": "' . $tag . '",
                "CompanyNumber": "' . $business_number . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/users/legal/", $body);
    }

    function updateLegalUser($user_id, $business_address, $business_additional_address, $business_city, $business_region, $business_postal_code, $business_name,
                             $vendor_address, $vendor_additional_address , $vendor_city, $vendor_region, $vendor_postal_code, $vendor_country, $vendor_birthday, $vendor_country_of_residence,
                             $vendor_email,$vendor_first_name, $vendor_last_name, $business_number, $business_email, $tag = "", $vendor_nationality = "FR",
                             $legal_person_type = "BUSINESS" , $business_country = "FR"){
        /*
         * LegalPersonType :
         * BUSINESS,
         * ORGANIZATION,
         * SOLETRADER
        */
        $body = '{
                "HeadquartersAddress": {
                    "AddressLine1": "' . $business_address . '",
                    "AddressLine2": "' . $business_additional_address . '",
                    "City": "' . $business_city . '",
                    "Region": "' . $business_region . '",
                    "PostalCode": "' . $business_postal_code . '",
                    "Country": "' . $business_country . '"
                },
                "LegalPersonType": "' . $legal_person_type . '",
                "Name": "' . $business_name . '",
                "LegalRepresentativeAddress": {
                    "AddressLine1": "' . $vendor_address . '",
                    "AddressLine2": "' . $vendor_additional_address . '",
                    "City": "' . $vendor_city . '",
                    "Region": "' . $vendor_region . '",
                    "PostalCode": "' . $vendor_postal_code . '",
                    "Country": "' . $vendor_country . '"
                },
                "LegalRepresentativeBirthday": ' . $vendor_birthday . ',
                "LegalRepresentativeCountryOfResidence": "' . $vendor_country_of_residence . '",
                "LegalRepresentativeNationality": "' . $vendor_nationality . '",
                "LegalRepresentativeEmail": "' . $vendor_email . '",
                "LegalRepresentativeFirstName": "' . $vendor_first_name . '",
                "LegalRepresentativeLastName": "' . $vendor_last_name . '",
                "Email": "' . $business_email . '",
                "Tag": "' . $tag . '",
                "CompanyNumber": "' . $business_number . '"
                }';

        return $this->requests->do_put_request($this->requests->defaultRequest . "/users/legal/" . $user_id, $body);
    }

    function getUser($user_id){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $user_id);
    }

    function getAllUsers(){
        return $this->requests->do_get_request($this->requests->defaultUsersRequest);
    }
}