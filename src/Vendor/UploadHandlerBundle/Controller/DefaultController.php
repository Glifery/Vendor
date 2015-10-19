<?php

namespace Vendor\UploadHandlerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VendorUploadHandlerBundle:Default:index.html.twig', array('name' => $name));
    }
}
