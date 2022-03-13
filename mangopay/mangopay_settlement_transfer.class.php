<?php

class SettlementTransfer{

    function createSettlementTransfer($user_id, $repudiation_id , $transferred_money , $fees, $currency = "EUR"){
        $transferred_money = number_format($transferred_money, 2, '', '');
        $fees = number_format($fees, 2, '', '');
        $body = '{
                    "AuthorId": "' . $user_id . '",
                    "DebitedFunds": {
                        "Currency": "' . $currency . '",
                        "Amount": ' . $transferred_money . '
                    },
                    "Fees": {
                        "Currency": "' . $currency . '",
                        "Amount": ' . $fees . '
                    }
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/repudiations/" . $repudiation_id . "/settlementtransfer/", $body);
    }

    function getSettlementTransfer($settlement_id){
        return $this->requests->do_get_request($this->requests->defaultRequest . "/settlements/" . $settlement_id);
    }
}