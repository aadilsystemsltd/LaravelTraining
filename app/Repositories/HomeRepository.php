<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\HomeRepositoryInterface;
use App\User;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{
    public function updateProfile(int $id, array $data)
    {
        User::find($id)->update($data);
    }

    public function resetPassword(int $id, string $password)
    {
        $user = User::find($id);
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
    }
}
