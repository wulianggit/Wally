<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Exception\RepositoryException;

/**
 * Class Repository
 * @package App\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * Repository constructor.
     *
     * @param $app
     */
    public function __construct (App $app )
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     * @author wuliang
     */
    abstract public function model ();

    /**
     * Create Eloquent Model to instantiate
     *
     * @return Model
     * @throws \App\Repositories\Exception\RepositoryException
     * @author wuliang
     */
    public function makeModel ()
    {
        $model = $this->app->make($this->model());

        if (! $model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function all ($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function find ($id, $columns = ['*'])
    {
        return $this->model->select($columns)->find($id);
    }

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
    public function findByField ($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, $value)->get($columns)->toArray();
    }

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     * @author wuliang
     */
    public function findWhere (array $where, $columns = ['*'])
    {
        $model = $this->model;

        foreach ($where as $field => $value)
        {
            if (is_array($value)) {
                if (count($value) === 3) {
                    list($field, $operator, $search) = $value;
                    $model = $model->where($field, $operator, $search);
                } elseif (count($value) === 3) {
                    list($field, $search) = $value;
                    $model = $model->where($field, '=', $search);
                }
            } else {
                $model = $model->where($field, '=', $value);
            }
        }

        return $model->get($columns);
    }

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
    public function findWhereIn ($field, array $value, $columns = ['*'])
    {
        return $this->model->whereIn($field, implode(',', $value))->get($columns);
    }

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     * @author wuliang
     */
    public function create (array $attributes)
    {
        $model = new $this->model;
        return $model->fill($attributes)->save();
    }

    /**
     * Update a entity in repository by field
     *
     * @param array  $attributes
     * @param        $id
     *
     * @return mixed
     * @author wuliang
     */
    public function update (array $attributes, $id)
    {
        $model = $this->find($id);
        $model->fill($attributes);
        return $model->save();
    }

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return mixed
     * @author wuliang
     */
    public function delete ($id)
    {
        $model = $this->find($id);
        return $model->delete();
    }
    

    /**
     * Load relations
     *
     * @param $relations
     *
     * @return mixed
     * @author wuliang
     */
    public function with ($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }
}
