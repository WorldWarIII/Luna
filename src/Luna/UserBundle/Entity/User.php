<?php

namespace Luna\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="UserModule", mappedBy="user")
     */
    private $userModules;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->userModules = new ArrayCollection();
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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


}