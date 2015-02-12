<?php

namespace Vendor\EntityHiddenTypeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vendor\EntityHiddenTypeBundle\Entity\Entity;

class LoadTestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entity0 = new Entity();
        $entity0->setName('name0');
        $manager->persist($entity0);

        $entity1 = new Entity();
        $entity1->setName('name1');
        $manager->persist($entity1);

        $manager->flush();
    }
}