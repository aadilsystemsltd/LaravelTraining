<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use \App\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    private $model;

    public function __construct(Model $_model)
    {
        $this->model = $_model;
    }

    public function Add(array $data)
    {
         $Comment = new $this->model($data);
         $Comment->save();
    }
}
