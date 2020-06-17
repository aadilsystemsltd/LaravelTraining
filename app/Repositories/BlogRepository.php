<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    private $model;

    public function __construct(Model $_model)
    {
        $this->model = $_model;
        parent::__construct($this->model);
    }
}
