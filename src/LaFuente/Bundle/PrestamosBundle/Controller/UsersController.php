<?php

namespace LaFuente\Bundle\PrestamosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository('UserBundle:User')->findAll();
        return $this->render('PrestamosBundle:Users:index.html.twig', array('users' => $users));
    }

    public function newAction()
    {
        return $this->render('PrestamosBundle:Users:new.html.twig');
    }

    public function createAction(Request $request)
    {
        return $this->render('PrestamosBundle:Users:index.html.twig');
    }

    public function showAction()
    {
        return $this->render('PrestamosBundle:Users:index.html.twig');
    }

    public function upateAction()
    {
        return $this->render('PrestamosBundle:Users:index.html.twig');
    }

    public function switchAction()
    {
        return $this->render('PrestamosBundle:Users:index.html.twig');
    }

    public function photoAction()
    {
        return $this->render('PrestamosBundle:Users:index.html.twig');
    }
}
