<?php

namespace App\Services\Interfaces;
use Illuminate\Http\UploadedFile;


interface BlogServicesInterface
{
    function Get();
    function Find($id);
    function Create(array $input);
    function Update(int $id, array $data);
    function UploadImageAndRetrunImageName(UploadedFile $image);
    function Delete($id);
}
