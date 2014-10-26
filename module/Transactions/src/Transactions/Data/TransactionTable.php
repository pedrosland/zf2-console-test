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
     * Read all records in CSV file
     *
     * @param $merchantID
     * @return array
     */
    public function readMerchant($merchantID){
        $rows = $this->csvReader->getAll();

        // use array_values to re-order list
        return array_values(array_filter($rows, function($rows) use ($merchantID){
            return $rows['merchant'] == $merchantID;
        }));
    }

    /**
     * Dispose of Reader
     */
    public function close(){
        $this->csvReader = null;
    }

}