<?php

namespace Transactions\Data;

use TransactionsTest\Bootstrap;
use Zend\Http\Response;
use PHPUnit_Framework_TestCase;

class TransactionTableTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TransactionTable
     */
    protected $transactionTable;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->transactionTable = $serviceManager->get('TransactionTable');
        $this->transactionTable->csvFile = '../../../data/transactions.csv';
        $this->transactionTable->open();
    }

    public function testReadAll()
    {
        $result = $this->transactionTable->readAll();

        $this->assertCount(8, $result);

        $firstRow = $result[0];

        $this->assertEquals(1, $firstRow['merchant']);
    }

    public function testReadMerchant()
    {
        $result = $this->transactionTable->readMerchant(1);

        $this->assertCount(4, $result);

        $this->assertEquals('£50.00', $result[0]['value']);
        $this->assertEquals('$23.05', $result[3]['value']);
    }


}