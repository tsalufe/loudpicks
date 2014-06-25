<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function AddAction()
    {
        return new ViewModel();
    }

    public function EditAction()
    {
        return new ViewModel();
    }


}

