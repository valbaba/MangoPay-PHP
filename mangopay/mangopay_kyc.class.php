<?php

class KYC
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createKYCDocument($user_id, $KYC_document_type)
    {
        /*
         * IDENTITY_PROOF,
         * REGISTRATION_PROOF,
         * ARTICLES_OF_ASSOCIATION,
         * SHAREHOLDER_DECLARATION,
         * ADDRESS_PROOF
         * */
        $body = '{
                    "Type": "' . $KYC_document_type . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultUsersRequest . "/users/" . $user_id . "/documents/", $body);
    }

    function createKYCPage($user_id, $kyc_document_id, $kyc_file){
        /*
         * Following formats are accepted for documents : .pdf, .jpeg, .jpg & .png.
         * Note that minimum accepted size is 1KB for all documents except identity_proof only for which size must be above 32KB.
         * For all documents, maximum size per page is about 7MB (or 10MB when base64 encoded).
         * */
        $body = '"File": "' . $kyc_file . '"';
        return $this->requests->do_post_request($this->requests->defaultUsersRequest . $user_id . "/kyc/documents/" . $kyc_document_id . "/pages/", $body);
    }

    function submitKYCDocument($user_id, $kyc_document_id, $document_status){
        /*
         * CREATED,
         * VALIDATION_ASKED,
         * VALIDATED,
         * REFUSED,
         * OUT_OF_DATE
         * */
        $body = '{
                    "Status": "' . $document_status . '"
                }';

        return $this->requests->do_put_request($this->requests->defaultUsersRequest . $user_id . "/kyc/documents/" . $kyc_document_id, $body);
    }

    function getKYCDocument($kyc_document_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/kyc/documents/" . $kyc_document_id);
    }

    function getUserKYCDocuments($kyc_document_id){
        /*
         * CREATED,
         * VALIDATION_ASKED,
         * VALIDATED,
         * REFUSED,
         * OUT_OF_DATE
         * */
        return $this->requests->do_get_request($this->requests->defaultUsersRequest . $kyc_document_id . "/kyc/documents/");
    }

    function getAllKYCDocuments(){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/kyc/documents/");
    }
}