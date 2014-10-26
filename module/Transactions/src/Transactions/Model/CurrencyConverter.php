<?php

namespace Transactions\Model;

use Transactions\Data\CurrencyWebservice;

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    /**
     * @var \Transactions\Data\CurrencyWebservice
     */
    protected $currencyWebService;

    /**
     * @var string Currency code
     */
    protected $currencyCode;

    /**
     * @param CurrencyWebservice $currencyWebService
     */
    public function __construct(CurrencyWebservice $currencyWebService){
        $this->currencyWebService = $currencyWebService;
    }

    /**
     * Set currency
     *
     * @param $currencyCode 3-character currency code
     */
    public function setCurrencyCode($currencyCode){
        $this->currencyCode = $currencyCode;
    }

    /**
     * Convert $amount of selected currency to GBP
     *
     * @param $amount float
     * @return float
     */
    public function convert($amount)
    {
        $exchangeRate = $this->currencyWebService->getExchangeRate($this->currencyCode);

        return round($amount * $exchangeRate, 2);
    }
}