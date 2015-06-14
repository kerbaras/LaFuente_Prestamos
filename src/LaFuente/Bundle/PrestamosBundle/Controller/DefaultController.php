<?php

namespace LaFuente\Bundle\PrestamosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PrestamosBundle:Default:index.html.twig', array('name' => $name));
    }
}
