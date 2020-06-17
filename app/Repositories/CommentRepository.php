<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    private $model;

    public function __construct(Model $_model)
    {
        $this->model = $_model;
        parent::__construct($this->model);
    }
}
