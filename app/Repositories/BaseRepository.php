<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class BaseRepository implements BaseRepositoryInterface
{
    private $model;

    public function __construct(Model $_model)
    {
        $this->model = $_model;
    }

    public function Get()
    {
        return $this->model->orderBy('created_at', 'asc')->get();
    }
    public function Find($id)
    {
        return $this->model->find($id);
    }

    public function Create(array $data)
    {
        $o = new $this->model($data);
        $o->save();
    }

    public function Update(int $id, array $data)
    {
        $this->model->find($id)->update($data);
    }

    public function Delete($id)
    {
        $this->model->find($id)->delete();
    }
}

