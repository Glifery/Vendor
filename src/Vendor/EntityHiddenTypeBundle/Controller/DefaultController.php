<?php

namespace Vendor\EntityHiddenTypeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vendor\EntityHiddenTypeBundle\Entity\Entity;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $entityRepo = $this->get('doctrine.orm.entity_manager')->getRepository('VendorEntityHiddenTypeBundle:Entity');
        $entities = $entityRepo->findAll();
        /** @var Entity $entity */
        $entity = $entities[0];

        $formBuilder = $this->createFormBuilder();
        $form = $formBuilder
            ->add('entity', 'entity_hidden', array(
                    'class' => 'VendorEntityHiddenTypeBundle:Entity',
                    'property' => 'name',
                    'label' => 'EntityHidden'
                ))
            ->add('name', 'text', array(
                    'label' => 'Text'
                ))
            ->add('save', 'submit', array(
                    'label' => 'Save'
                ))
            ->getForm()
        ;

        $form->get('entity')->setData($entity);
        $form->get('name')->setData($entity->getName());

        $newEntity = null;
        $form->handleRequest($request);
        if ($form->isValid()) {
            $newEntity = $form->get('entity')->getData();
        }

        return $this->render('VendorEntityHiddenTypeBundle:Default:index.html.twig', array(
                'form' => $form->createView(),
                'newEntity' => $newEntity
            ));
    }
}
