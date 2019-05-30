<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Repository implement repository pattern to make proccess over database's data
 * 
 * @package App\Repositories
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class Repository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    /**
     * Constructor
     * 
     * @param Model $model model name
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get model data by id
     * 
     * @param int $id model id
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    
    /**
     * List all model data exist in the DB
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get specific data after filtering it
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Save new instance in the DB
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update exist raw in the DB
     */
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    /**
     * remove from DB
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Get relation with another model
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * Implement filteration over the data
     */
    public function where($key, $value)
    {
        return $this->model->where($key, $value);
    }

    /**
     * Get model name
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}
