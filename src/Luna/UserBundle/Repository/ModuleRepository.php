<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 8/15/14
 * Time: 8:14 PM
 */

namespace Luna\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ModuleRepository extends EntityRepository {

    public function findAllModules()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT m FROM LunaUserBundle:Module m
                           WHERE m.parent = 0
            ')
            ->getResult();
    }

    public function findAllSubModules()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT m FROM LunaUserBundle:SubModule m')
            ->getResult();
    }
} 