<?php

namespace Luna\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Luna\UserBundle\Repository\ModuleRepository")
 * @ORM\Table(name="module")
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="module_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $moduleId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255)
     */
    protected $route;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var integer
     * @ORM\Column(name="parent", type="integer")
     */
    protected $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="UserModule", mappedBy="module")
     */
    private $userModules;

    /**
     * @var integer
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userModules = new ArrayCollection();
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $link
     */
    public function setRoute($link)
    {
        $this->route = $link;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $moduleId
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    /**
     * @return mixed
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $userModules
     */
    public function setUserModules($userModules)
    {
        $this->userModules = $userModules;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserModules()
    {
        return $this->userModules;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

}