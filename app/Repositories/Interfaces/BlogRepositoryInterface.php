<?php

namespace App\Repositories\Interfaces;

interface BlogRepositoryInterface
{
    function Get();
    function Save(array $data);
    function Delete($id);
    function Find($id);
    function Update(int $id, array $data);
}
