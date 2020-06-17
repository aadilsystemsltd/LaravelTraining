<?php

namespace App\Services;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Services\Interfaces\CommentServicesInterface;

class CommentServices implements CommentServicesInterface
{
    private $commentRepository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    function Create(array $data)
    {
        $this->commentRepository->Create($data);
    }

}

