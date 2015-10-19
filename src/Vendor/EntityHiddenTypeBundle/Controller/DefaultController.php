<?php

namespace Vendor\EntityHiddenTypeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vendor\EntityHiddenTypeBundle\Entity\Entity;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $entityRepo = $this->get('doctrine.orm.entity_manager')->getRepository('VendorEntityHiddenTypeBundle:Entity');
        $entities = $entityRepo->findAll();
        /** @var Entity $entity */
        $entity = $entities[1];

        $formBuilder = $this->createFormBuilder();
        $form = $formBuilder
            ->add('entity', 'entity_hidden', array(
                    'class' => 'VendorEntityHiddenTypeBundle:Entity',
                    'property' => 'name',
                    'data' => $entity,
                    'invalid_message' => 'The entity does not exist.',
                    'em' => $this->get('doctrine')->getManager('default'),
                    'constraints' => new \Symfony\Component\Validator\Constraints\NotBlank()
                ))
            ->add('name', 'text', array(
                    'label' => 'Text'
                ))
            ->add('save', 'submit', array(
                    'label' => 'Save'
                ))
            ->getForm()
        ;

//        $form->get('entity')->setData($entity);
//        $form->get('name')->setData($entity->getName());

        $newEntity = null;
//        $entity = null;
        $form->handleRequest($request);
        if ($form->isValid()) {
            $newEntity = $form->get('entity')->getData();
//            $name = $form->get('name')->getData();
//            $entity = $entityRepo->findOneBy(array('name' => $name));
//            $form->get('entity')->setData($entity);
        }

        return $this->render('VendorEntityHiddenTypeBundle:Default:index.html.twig', array(
                'form' => $form->createView(),
                'newEntity' => $newEntity
            ));
    }
}
