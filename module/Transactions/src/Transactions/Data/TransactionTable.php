<?php

namespace Transactions\Data;

use EasyCSV\Reader;

/**
 * Source of transactions, can read data.csv directly for simplicity, 
 * should behave like a database (read only)
 *
 */
class TransactionTable
{

    /**
     * @var string Path to CSV file
     */
    public $csvFile = 'data/transactions.csv';

    /**
     * @var Reader
     */
    protected $csvReader;

    /**
     * Open CSV File
     */
    public function open(){
        $this->csvReader = new Reader($this->csvFile);
        $this->csvReader->setDelimiter(';');
    }

    /**
     * Read all records in CSV file
     *
     * @return Array
     */
    public function readAll(){
        return $this->csvReader->getAll();
    }

    /**
     * Dispose of Reader
     */
    public function close(){
        $this->csvReader = null;
    }

}