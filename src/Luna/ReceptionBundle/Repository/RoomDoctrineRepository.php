<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 6/3/14
 * Time: 3:56 PM
 */

namespace Luna\ReceptionBundle\Repository;

use Luna\ReceptionBundle\Entity\Room;
use Luna\ReceptionBundle\Repository\RoomRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoomDoctrineRepository implements RoomRepositoryInterface {

    private $em;
    private $repository;

    function __construct($em, $roomClass)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($roomClass);
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

        //$criteria = array('isActive' => 1);
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Get a Room.
     *
     * @param int $id  roomId
     *
     * @return Company
     */
    function findById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Removes a Room.
     *
     * @param Room $entity
     * @return Room
     */
    function delete($entity)
    {
        try {
            $this->em->remove($entity);
            $this->em->flush($entity);

        } catch (Exception $e) {
            return 'Entity remove failed. '. $e->getCode() .' '. $e->getMessage();
        }
        return $entity;
    }

    /**
     * Saves a Room.
     *
     * @param Room $entity
     * @return Room
     */
    function save($entity)
    {
        try {
            $this->em->persist($entity);
            $this->em->flush($entity);

        } catch (Exception $e) {
            return 'Entity persist failed. '. $e->getCode() .' '. $e->getMessage();
        }
        return $entity;
    }


    function update($entity)
    {
        // TODO: Implement update() method.
    }

    function isRoomCleaned($entity)
    {
        // TODO: Implement update() method.
    }

    function isRoomActive($entity)
    {
        // TODO: Implement isCompanyActive() method.
    }

//    function findBySubdomain($subDomain)
//    {
//        $query = $this->em->createQuery("SELECT c FROM 'Nab\PlatformServiceBundle\Entity\Company' c
//                                         JOIN c.companyConfig cc
//                                         WHERE cc.subDomain = ?1");
//        $query->setParameter(1, $subDomain);
//        $companyInfo = $query->getResult();
//
//
//        if(!$companyInfo){
//            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $subDomain));
//        }
//
//        return $companyInfo;
//    }
}