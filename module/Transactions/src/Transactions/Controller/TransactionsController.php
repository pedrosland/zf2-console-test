<?php

namespace Transactions\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;

class TransactionsController extends AbstractActionController
{

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

        return "MerchantID: $merchantID";
    }


}

