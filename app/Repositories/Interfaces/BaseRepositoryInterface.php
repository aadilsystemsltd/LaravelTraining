<?php

namespace App\Repositories\Interfaces;
interface BaseRepositoryInterface
{
    function Get();
    function Find($id);
    function Create(array $data);
    function Update(int $id, array $data);
    function Delete($id);
}

