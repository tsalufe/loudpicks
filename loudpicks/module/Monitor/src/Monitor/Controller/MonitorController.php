<?php

namespace Monitor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MonitorController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

