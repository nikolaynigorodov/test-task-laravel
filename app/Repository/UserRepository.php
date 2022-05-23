<?php


namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function created(array $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'position_id' => $request['position'],
            'photo' => $request['photo'],
        ]);
    }
}
