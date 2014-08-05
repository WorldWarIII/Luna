<?php

namespace Luna\ReceptionBundle\Handler;

use Luna\ReceptionBundle\Entity\Room;
//use Luna\ReceptionBundle\EventListener\FilterRoomEvent;
//use Luna\ReceptionBundle\Event\CompanyEvent;
use Luna\ReceptionBundle\Repository\RoomRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RoomService
{
    private $dispatcher;
    private $roomRepository;

    public function __construct(EventDispatcherInterface $dispatcher, RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Room $room
     * @return Room
     */
    function saveRoom(Room $room)
    {
        $this->roomRepository->save($room);

        // Company is created, dispatch event to all listeners
        // TODO: use dependency injection
//        $event = new FilterCompanyEvent($room);
//        $this->dispatcher->dispatch(RoomEvent::ROOM_CREATED, $event);

        return $room;
    }

    /**
     * @param Room $room
     * @return Room
     */
    function updateRoom(Room $room)
    {
        $this->roomRepository->save($room);

        // Company is created, dispatch event to all listeners
        // TODO: use dependency injection
//        $event = new FilterRoomEvent($room);
//        $this->dispatcher->dispatch(RoomEvent::ROOM_CREATED, $event);

        return $room;
    }


    /**
     * Get a list of Rooms.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function findAll($limit = 5, $offset = 0)
    {
        return $this->roomRepository->findAll($limit,$offset);
    }

    /**
     * @param $id
     * @return mixed
     */
    function findById($id)
    {
        return $this->roomRepository->findById($id);
    }

    function removeCompany(Room $room)
    {
        return $this->roomRepository->delete($room);
    }


}
