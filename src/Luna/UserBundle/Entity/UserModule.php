<?php

namespace Luna\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserModule
 *
 * @ORM\Table(name="user_module")
 * @ORM\Entity
 */
class UserModule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_module_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userModuleId;


    /**
     * @var Module
     *
     * @Assert\NotNull
     * @ORM\ManyToOne(targetEntity="Module", inversedBy="userModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="module_id", referencedColumnName="module_id")
     * })
     */
    private $module;

    /**
     * @var User
     *
     * @Assert\NotNull
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Module $module
     */
    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * @return Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param int $userModuleId
     */
    public function setUserModuleId($userModuleId)
    {
        $this->userModuleId = $userModuleId;
    }

    /**
     * @return int
     */
    public function getUserModuleId()
    {
        return $this->userModuleId;
    }

    function __toString()
    {
        return (string)$this->getName();
    }

}
