<?php


namespace App\Services;

use App\User;

class UserService
{
    public function getById($id)
    {
        if($id <=0) {
            return response()->json([
                'message' => 'Введите id пользователя',
                'status' => 422
            ], 422);
        }
        return User::where('id',$id)->first();
    }
}
