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
                           ORDER BY m.priority DESC
            ')
            ->getResult();
    }

    public function findAllUserModulesByPriority($user)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT m,mu,u FROM LunaUserBundle:Module m
                           JOIN m.userModule um
                           JOIN m.user
                           WHERE m.parent = 0 and u = $user
                           ORDER BY m.priority DESC
            ')
            ->getResult();
    }

    public function findAllSubModules($id)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT m FROM LunaUserBundle:Module m
                            WHERE m.parent = 1')
            ->getResult();
    }
} 