<?php

class DisputeDocument{

    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createDisputeDocument($dispute_id, $dispute_document_type){
        /*
        All types :
            - DELIVERY_PROOF
            - INVOICE
            - REFUND PROOF
            - USER_CORRESPONDANCE
            - USER_ACCEPTANCE_PROOF
            - PRODUCT_REPLACEMENT_PROOF
            - OTHER
        */
        $body = '{
                    "Type": "'. $dispute_document_type .'"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/documents/");

    }

    function createDisputeDocumentPage($dispute_id, $dispute_document_id, $dispute_document){
        /*
        Dispute document must be less than 7MB and base64encoded
        */
        $body = '{
                    "File": "'. $dispute_document .'"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/documents/" . $dispute_document_id . "/pages/");
    }

    function submitDisputeDocument($dispute_id, $dispute_document_id, $status){
        /*
        All Status :
            - CREATED
            - VALIDATION_ASKED
            - VALIDATED
            - REFUSED
            - OUT_OF_DATE
         */
        $body = '{
                    "Status": "'. $status .'"
                }';
        return $this->requests->do_put_request($this->requests->defaultRequest . "/disputes/" . $dispute_id . "/documents/" . $dispute_document_id);
    }

    function getDisputeDocument($dispute_document_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/dispute-documents/" . $dispute_document_id);
    }
    function getAllDisputeDocument(){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/dispute-documents/");
    }
    function getAllDocumentsFromDispute($dispute_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/dispute/" . $dispute_id . "/documents/");
    }
    function getDisputeDocumentPages($dispute_document_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/disputes-documents/" . $dispute_document_id . "/consult/");
    }

}