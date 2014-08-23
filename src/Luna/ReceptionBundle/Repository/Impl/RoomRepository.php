<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 6/3/14
 * Time: 3:56 PM
 */

namespace Luna\ReceptionBundle\Repository\Impl;

use Luna\ApplicationBundle\Repository\Impl\CommonRepository;
use Luna\ReceptionBundle\Repository\RoomRepository as RoomRepositoryInterface;

class RoomRepository extends CommonRepository implements RoomRepositoryInterface {

    /**
     * returns entity name associated with repository
     *
     * @return string
     */
    protected function getEntityName()
    {
        return 'LunaReceptionBundle:Room';
    }
}