<?php
namespace Transactions;

use Transactions\Model\CurrencyConverter;
use Transactions\Model\Merchant;
use Transactions\Data\TransactionTable;
use Transactions\Data\CurrencyWebservice;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;

class Module implements ConsoleUsageProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Transactions\Model\Merchant' =>  function($sm) {
                    $transactionTable = $sm->get('TransactionTable');
                    return new Merchant($transactionTable);
                },
                'Transactions\Model\CurrencyConverter' =>  function($sm) {
                    $currencyWebService = $sm->get('CurrencyWebService');
                    return new CurrencyConverter($currencyWebService);
                },
                'TransactionTable' => function () {
                    return new TransactionTable();
                },
                'CurrencyWebservice' => function () {
                    return new CurrencyWebservice();
                },
            ),
        );
    }

    /**
     * Returns console usage info
     *
     * @param Console $console
     * @return array
     */
    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'transactions list merchantID'    => 'Get transactions for a merchant',

            // Describe expected parameters
            array( 'merchantID', 'ID of the merchant' ),
        );
    }
}
