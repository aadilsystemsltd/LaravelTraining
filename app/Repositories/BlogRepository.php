<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BlogRepository implements BlogRepositoryInterface
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

    public function Save(array $data)
    {
        $o = new $this->model($data);
        $o->save();
    }

    public function Delete($id)
    {
        $this->model->find($id)->delete();
    }

    public function Find($id)
    {
        return $this->model->find($id);
    }

    public function Update(int $id, array $data)
    {
        $this->model->find($id)->update($data);
    }
}
