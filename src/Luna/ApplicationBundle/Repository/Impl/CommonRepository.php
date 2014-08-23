<?php

namespace Luna\ApplicationBundle\Repository\Impl;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use Luna\ApplicationBundle\Repository\CommonRepository as CommonRepositoryInterface;

/**
 * Custom repository abstraction
 */
abstract class CommonRepository implements CommonRepositoryInterface
{
    protected $em;
    protected $repository;

    /**
     * Adds EntityManager instance
     *
     * @param EntityManagerInterface $em
     */
    public function addEntityManager(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Instantiates repository
     *
     * @throws InvalidArgumentException
     */
    public function addRepository()
    {
        if (!is_string($this->getEntityName())) {
            throw new InvalidArgumentException("Entity name must be returned by getEntity() function");
        }
        try {
            $this->repository = $this->em->getRepository($this->getEntityName());
        } catch (Exception $e) {
            $msg = sprintf(
                "Valid entity name must be defined in getEntity function. Entity name %s provided is NOT valid. Exception: %s",
                $this->getEntityName(), $e->getMessage()
            );
            throw new InvalidArgumentException($msg);
        }
    }

    /**
     * returns entity name associated with repository
     *
     * @return string
     */
    abstract protected function getEntityName();

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager()
    {
        return $this->em;
    }

    /**
     * Saves Entity
     *
     * @param $entity
     *
     * @return $entity
     */
    public function save($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    /**
     * Update Entity
     *
     * @param Entity $entity
     *
     * @return Entity $entity
     */
    public function update($entity)
    {
        $this->em->merge($entity);
        $this->em->flush();
        return $entity;
    }

    /**
     * Find all from repository
     *
     * @param int $limit limit of the result
     * @param int $offset starting from th offset
     *
     * @return array
     */
    public function findAll($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Get entity by id
     *
     * @param int $id
     *
     * @return Entity
     */
    public function findById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Removes entity
     *
     * @param $entity
     *
     * @return
     */
    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
        return $entity;
    }

}
