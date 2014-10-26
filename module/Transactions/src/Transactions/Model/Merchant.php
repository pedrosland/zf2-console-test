<?php

namespace Transactions\Model;

use Transactions\Data\TransactionTable;

class Merchant
{

    /**
     * @param TransactionTable $transactionTable
     */
    public function __construct(TransactionTable $transactionTable){
        $this->transactionTable = $transactionTable;
    }

    /**
     * @param $merchantID string
     */
    public function getTransactions($merchantID)
    {

    }
}