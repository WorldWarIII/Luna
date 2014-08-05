<?php

namespace Luna\ReceptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reservationId;

    /**
     * @var Guest
     *
     * @ORM\ManyToOne(targetEntity="Guest", inversedBy="reservations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guest_id", referencedColumnName="guest_id")
     * })
     */
    private $guest;

    /**
     * @var Room
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="reservations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="room_id", referencedColumnName="room_id")
     * })
     */
    private $room;

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
     * @var \DateTime
     *
     * @ORM\Column(name="reserved_from", type="datetime")
     */
    private $reservedFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reserved_to", type="datetime")
     */
    private $reservedTo;

    /**
     * @param Room $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param Guest $guest
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
    }

    /**
     * @return Guest
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param int $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * @return int
     */
    public function getReservationId()
    {
        return $this->reservationId;
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
     * @param \DateTime $reservedFrom
     */
    public function setReservedFrom($reservedFrom)
    {
        $this->reservedFrom = $reservedFrom;
    }

    /**
     * @return \DateTime
     */
    public function getReservedFrom()
    {
        return $this->reservedFrom;
    }

    /**
     * @param \DateTime $reservedTo
     */
    public function setReservedTo($reservedTo)
    {
        $this->reservedTo = $reservedTo;
    }

    /**
     * @return \DateTime
     */
    public function getReservedTo()
    {
        return $this->reservedTo;
    }


    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }


}
