<?php
namespace Transactions;

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
