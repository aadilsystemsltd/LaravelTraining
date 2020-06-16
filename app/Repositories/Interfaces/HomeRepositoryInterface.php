<?php

namespace App\Repositories\Interfaces;

interface HomeRepositoryInterface
{
    public function updateProfile(int $id, array $data);
    public function resetPassword(int $id, string $password);
}
