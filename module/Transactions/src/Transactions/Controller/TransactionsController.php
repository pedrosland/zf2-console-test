<?php

namespace Transactions\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TransactionsController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function getAction()
    {
        return new ViewModel();
    }


}

