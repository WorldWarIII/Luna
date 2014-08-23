<?php

namespace Luna\ApplicationBundle\Repository;

interface CommonRepository
{
    /**
     * Saves Entity
     *
     * @param $entity
     *
     * @return $entity
     */
    public function save($entity);

    /**
     * Update Entity
     *
     * @param Entity $entity
     *
     * @return Entity $entity
     */
    public function update($entity);

    /**
     * Find all from repository
     *
     * @param int $limit limit of the result
     * @param int $offset starting from th offset
     *
     * @return array
     */
    public function findAll($limit = 5, $offset = 0);

    /**
     * Get entity by id
     *
     * @param int $id
     *
     * @return Entity
     */
    public function findById($id);

    /**
     * Removes entity
     *
     * @param $entity
     *
     * @return
     */
    public function delete($entity);

}
