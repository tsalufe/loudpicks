<?php

namespace Loudpicks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoudpicksController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

