<?php

namespace Luna\ReceptionBundle\Repository;

Interface RoomRepositoryInterface {

    function save($entity);
    function findAll();
    function findById($id);
    function delete($entity);
    function update($entity);
    function isRoomActive($entity);
    function isRoomCleaned($entity);

} 