<?php

namespace Vendor\UploadHandlerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vendor\UploadHandlerBundle\Entity\Entity;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $status = '---';

        $entity = new Entity();
        $entity = $this->get('doctrine.orm.entity_manager')->getRepository('VendorUploadHandlerBundle:Entity')->find(14);
        $form = $this->createFormBuilder($entity)
            ->add('name')
            ->add('file', 'file')
            ->add('date', 'datetime')
            ->add('save', 'submit')
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isValid()) {
            $entity = $form->getData();
            $em->persist($entity);
            $em->flush();
            $status = 'FLUSHED';
        }

        return $this->render('VendorUploadHandlerBundle:Default:index.html.twig', array(
                'form' => $form->createView(),
                'status' => $status,
                'entity' => $entity
            ));
    }
}
