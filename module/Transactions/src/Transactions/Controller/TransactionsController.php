<?php

namespace Transactions\Controller;

use Transactions\Model\Merchant;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;

class TransactionsController extends AbstractActionController
{

    /**
     * @var Merchant
     */
    protected $merchant;

    public function listAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        // Get user email from console and check if the user used --verbose or -v flag
        $merchantID = $request->getParam('merchantID');

        $this->getMerchant();

        return "MerchantID: $merchantID";
    }

    /**
     * Get Merchant instance
     *
     * @return Merchant
     */
    public function getMerchant()
    {
        if (!$this->merchant) {
            $sm = $this->getServiceLocator();
            $this->merchant = $sm->get('Transactions\Model\Merchant');
        }
        return $this->merchant;
    }

}

