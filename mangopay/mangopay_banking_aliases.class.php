<?php

class BankingAlias
{
    public $requests;

    function __construct()
    {
        $this->requests = new Requests();
    }

    function createIBANBankingAlias($user_wallet_id, $owner_name, $owner_country, $tag = "")
    {
        $body = '{
                    "OwnerName": "' . $owner_name . '",
                    "Tag": "' . $owner_country . '",
                    "Country": "' . $tag . '"
                }';

        return $this->requests->do_post_request($this->requests->defaultRequest . "/wallets/" . $user_wallet_id . "/bankingaliases/iban/", $body);
    }

    function deactivateBankingAlias($user_id, $banking_alias_id)
    {
        $body = '{
                    "Active": "false"
                }';

        return $this->requests->do_put_request($this->requests->defaultRequest . "/bankingaliases/" . $banking_alias_id, $body);
    }

    function getUserBankingAlias($banking_alias_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/bankingaliases/" . $banking_alias_id);
    }

    function getWalletBankingAlias($wallet_id)
    {
        return $this->requests->do_get_request($this->requests->defaultRequest . "/wallets/" . $wallet_id . "/bankingaliases/");
    }

}