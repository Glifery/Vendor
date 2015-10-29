<?php

namespace Vendor\UploadHandlerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vendor\UploadHandlerBundle\Entity\Entity;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('vendor:upload_handler:test')
            ->setDescription('Test SymfonyArt/UploadHandlerBundle');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('start command');

        $entity = new Entity();
        $entity->setName('name');
        $entity->setFile('ddd');

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $em->persist($entity);
        $em->flush();
    }
}