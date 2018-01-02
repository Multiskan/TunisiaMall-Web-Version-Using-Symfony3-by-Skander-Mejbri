<?php

namespace Tunisa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TunisaUserBundle:Default:index.html.twig');
    }
    public function loginAction()
    {
        return $this->render('TunisaUserBundle:Security:login.html.twig');
    }
}
