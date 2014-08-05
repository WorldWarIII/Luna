<?php

namespace Luna\ReceptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Room
{
    /**
     * @var integer
     *
     * @ORM\Column(name="room_id", type="integer")
     * @ORM\Id
     */
    private $roomId;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_beds", type="integer")
     */
    private $numberOfBeds;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


    /**
     * @var integer
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="is_cleaned", type="boolean", nullable=true)
     */
    private $isCleaned;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="is_booking_room", type="boolean", nullable=true)
     */
    private $isBookingRoom;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="has_tv", type="boolean", nullable=true)
     */
    private $hasTv;


    /**
     * @var \Boolean
     *
     * @ORM\Column(name="has_climatization", type="boolean", nullable=true)
     */
    private $hasClimatization;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="has_fridge", type="boolean", nullable=true)
     */
    private $hasFridge;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="has_safe", type="boolean", nullable=true)
     */
    private $hasSafe;

    /**
     * @param int $companyId
     */
    public function setRoomId($companyId)
    {
        $this->roomId = $companyId;
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($active)
    {
        $this->isActive = $active;
    }

    /**
     * @param boolean $isBookingRoom
     */
    public function setIsBookingRoom($isBookingRoom)
    {
        $this->isBookingRoom = $isBookingRoom;
    }

    /**
     * @return boolean
     */
    public function getIsBookingRoom()
    {
        return $this->isBookingRoom;
    }

    /**
     * @param boolean $isCleaned
     */
    public function setIsCleaned($isCleaned)
    {
        $this->isCleaned = $isCleaned;
    }

    /**
     * @return boolean
     */
    public function getIsCleaned()
    {
        return $this->isCleaned;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return Currency
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param boolean $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }


    /**
     * @param string $displayId
     */
    public function setNumberOfBeds($displayId)
    {
        $this->numberOfBeds = $displayId;
    }

    /**
     * @return string
     */
    public function getNumberOfBeds()
    {
        return $this->numberOfBeds;
    }

    /**
     * @param boolean $hasClimatization
     */
    public function setHasClimatization($hasClimatization)
    {
        $this->hasClimatization = $hasClimatization;
    }

    /**
     * @return boolean
     */
    public function getHasClimatization()
    {
        return $this->hasClimatization;
    }

    /**
     * @param boolean $hasFridge
     */
    public function setHasFridge($hasFridge)
    {
        $this->hasFridge = $hasFridge;
    }

    /**
     * @return boolean
     */
    public function getHasFridge()
    {
        return $this->hasFridge;
    }

    /**
     * @param boolean $hasSafe
     */
    public function setHasSafe($hasSafe)
    {
        $this->hasSafe = $hasSafe;
    }

    /**
     * @return boolean
     */
    public function getHasSafe()
    {
        return $this->hasSafe;
    }

    /**
     * @param boolean $hasTv
     */
    public function setHasTv($hasTv)
    {
        $this->hasTv = $hasTv;
    }

    /**
     * @return boolean
     */
    public function getHasTv()
    {
        return $this->hasTv;
    }

    function __toString()
    {
        return (string)$this->getRoomId();
    }

}
