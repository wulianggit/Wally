<?php

namespace App\Repositories\Contracts;

/**
 * Interface RepositoryInterface
 * @package App\Repositories\Contracts
 */
interface RepositoryInterface
{
    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function all ($columns = ['*']);

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function find ($id, $columns = ['*']);

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function findByField ($field, $value, $columns = ['*']);

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function findWhere (array $where, $columns = ['*']);

    /**
     * Find data by multiple values in one field
     *
     * @param       $field
     * @param array $value
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function findWhereIn ($field, array $value, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     * @author wuliang
     */
    public function create (array $attributes);

    /**
     * Update a entity in repository by id
     *
     * @param array  $attributes
     * @param        $id
     *
     * @return mixed
     * @author wuliang
     */
    public function update (array $attributes, $id);

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return mixed
     * @author wuliang
     */
    public function delete ($id);

    /**
     * Load relations
     *
     * @param $relations
     *
     * @return mixed
     * @author wuliang
     */
    public function with ($relations);
}