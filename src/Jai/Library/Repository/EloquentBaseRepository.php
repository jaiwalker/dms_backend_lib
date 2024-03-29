<?php namespace Jai\Library\Repository;
/**
 * Class EloquentBaseRepository
 *
 * @author jai beschi jai@Jaibeschi.com
 */

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jai\Library\Exceptions\NotFoundException;
use Jai\Library\Repository\Interfaces\BaseRepositoryInterface;
use Event;

class EloquentBaseRepository implements BaseRepositoryInterface
{
    /**
     * The model: needs to be eloquent model
     * @var mixed
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Create a new object
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a new object
     * @param       id
     * @param array $data
     * @return mixed
     * @throws \Jai\Library\Exceptions\NotFoundException
     */
    public function update($id, array $data)
    {
        $obj = $this->find($id);
        Event::fire('repository.updating', [$obj]);
        $obj->update($data);
        return $obj;
    }

    /**
     * Deletes a new object
     * @param $id
     * @return mixed
     * @throws \Jai\Library\Exceptions\NotFoundException
     */
    public function delete($id)
    {
        $obj = $this->find($id);
        Event::fire('repository.deleting', [$obj]);
        return $obj->delete();
    }

    /**
     * Find a model by his id
     * @param $id
     * @return mixed
     * @throws \Jai\Library\Exceptions\NotFoundException
     */
    public function find($id)
    {
        try
        {
            $model = $this->model->findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            throw new NotFoundException;
        }

        return $model;
    }

    /**
     * Obtains all models
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

}