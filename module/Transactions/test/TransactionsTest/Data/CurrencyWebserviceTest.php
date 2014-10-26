<?php

namespace Transactions\Data;

use TransactionsTest\Bootstrap;
use Zend\Http\Response;
use PHPUnit_Framework_TestCase;

class CurrencyWebserviceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CurrencyWebservice
     */
    protected $currencyWebService;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->currencyWebService = $serviceManager->get('CurrencyWebservice');
    }

    public function testGetExchangeRateUSD()
    {
        $exchangeRate = $this->currencyWebService->getExchangeRate('USD');

        $this->assertGreaterThanOrEqual(0.5, $exchangeRate);
        $this->assertLessThanOrEqual(1, $exchangeRate);
    }

    public function testGetExchangeRateInvalid()
    {
        $this->setExpectedException('InvalidArgumentException', "Please enter a valid currency.");

        $this->currencyWebService->getExchangeRate('INV');
    }


}