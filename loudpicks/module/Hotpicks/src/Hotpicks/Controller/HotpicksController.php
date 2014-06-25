<?php

namespace Hotpicks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HotpicksController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

