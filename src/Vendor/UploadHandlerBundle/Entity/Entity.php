<?php

namespace Vendor\UploadHandlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SymfonyArt\UploadHandlerBundle\Annotation\Image;

/**
 * @ORM\Entity
 * @ORM\Table(name="uploadable_handler")
 * @ORM\EntityListeners({"SymfonyArt\UploadHandlerBundle\EventListener\UploadListener"})
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
     * @Image("filePath", filter="post_thumbnail")
     */
    private $file;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $filePath;

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

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     * @return $this
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }
}