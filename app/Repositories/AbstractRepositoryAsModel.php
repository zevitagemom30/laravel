<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;
use App\Models\AbstractModel;

abstract class AbstractRepositoryAsModel extends AbstractRepository
{
    protected AbstractModel $model;

    public function setModel(AbstractModel $model)
    {
        $this->model = $model;
    }

    public function getModel(): AbstractModel
    {
        return $this->model;
    }

    public function getTable(): string
    {
        return $this->getModel()->getTable();
    }

    public function getDeletedAtColumn()
    {
        return $this->model::COLUMN_DELETED_AT;
    }

    public function store(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function updateOrCreate(array $condition, array $data)
    {
        return $this->getModel()->updateOrCreate($condition, $data);
    }

    public function deleteByCondition(array $condition)
    {
        return $this->getModel()->where($condition)->delete();
    }

    public function insert(array $data)
    {
        return $this->getModel()->insert($data);
    }

    public function update(AbstractModel $model)
    {
        return $model->save();
    }

    public function delete(AbstractModel $model)
    {
        return $model->delete();
    }

    public function getActives()
    {
        return $this->getModel()->where([
                'active' => 1
            ])->get();
    }

    public function get()
    {
        return $this->getModel()->get();
    }

    public function destroy(int $id)
    {
        return $this->getModel()->destroy($id);
    }

    public function getById(int $id)
    {
        return $this->getModel()->find($id);
    }
}
