<?php

namespace App\Services;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\UploadedFile;
use App\Services\Interfaces\BlogServicesInterface;

class BlogServices implements BlogServicesInterface
{
    private $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    function Get()
    {
        return $this->blogRepository->Get();
    }

    function Find($id)
    {
        return $this->blogRepository->Find($id);
    }

    function Create(array $input)
    {
        $this->blogRepository->Create($input);
    }

    function Update(int $id, array $data)
    {
        $this->blogRepository->Update($id, $data);
    }

    function UploadImageAndRetrunImageName(UploadedFile $image)
    {
        $imageName = $image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
        return $imageName;
    }

    function Delete($id)
    {
        $this->blogRepository->Delete($id);
    }
}

