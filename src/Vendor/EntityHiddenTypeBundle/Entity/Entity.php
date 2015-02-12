<?php

namespace Vendor\EntityHiddenTypeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="entity_hidden_type_entity")
 */
class Entity
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}