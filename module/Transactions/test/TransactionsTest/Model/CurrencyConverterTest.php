<?php

namespace Transactions\Model;

use Transactions\Data\CurrencyWebservice;
use Zend\Http\Response;
use PHPUnit_Framework_TestCase;

class CurrencyWebserviceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CurrencyWebservice
     */
    protected $currencyWebservice;

    protected function setUp()
    {
        $this->currencyWebservice = $this->getMock('Transactions\Data\CurrencyWebservice', ['getExchangeRate']);
    }

    public function testConvertUSD()
    {
        $this->currencyWebservice->expects($this->once())
            ->method('getExchangeRate')
            ->with('USD')
            ->will($this->returnValue(0.5));

        $currencyConverter = new CurrencyConverter($this->currencyWebservice);

        $currencyConverter->setCurrencyCode('USD');
        $this->assertEquals(5.25, $currencyConverter->convert(10.5));
    }


}