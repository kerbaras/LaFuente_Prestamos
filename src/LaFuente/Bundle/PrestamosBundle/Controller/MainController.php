<?php

namespace LaFuente\Bundle\PrestamosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('PrestamosBundle:Main:index.html.twig');
    }
}
