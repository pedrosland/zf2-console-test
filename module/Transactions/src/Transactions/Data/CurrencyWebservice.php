<?php

namespace Transactions\Data;
use Zend\Math\Rand;

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{

    /**
     * Returns exchange rate for currency
     *
     * Note: Normally, exchange rates would be between currency A and currency B
     * but sticking with the API, I'll assume we are always converting to GBP
     * (which we are).
     *
     * @param $currency string 3-character currency code eg GBP
     * @return float Exchange rate
     * @throws \InvalidArgumentException
     */
    public function getExchangeRate($currency)
    {
        $allowedCurrencies = ['GBP', 'USD', 'EUR'];

        if(!in_array($currency, $allowedCurrencies)){
            throw new \InvalidArgumentException("Please enter a valid currency.");
        }

        // Get random number between 0.5 and 1 to make it remotely realistic
        return Rand::getInteger(500, 1000)/1000;
    }
}