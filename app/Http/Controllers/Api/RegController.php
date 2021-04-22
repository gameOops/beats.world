<?php

namespace App\Http\Controllers\Api;
use App\User;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function reg() {
        $userCheck = User::whereEmail(request('regmail'))->first();

        if(!request('regmail')) {
            return response()->json([
                'message' => 'Введите имя!',
                'status' => 422
            ], 422);
        }
        if($userCheck) {
            return response()->json([
                'message' => 'Пользователь с таким Email уже существует!',
                'status' => 422
            ], 422);
        }
        if(strlen(request('regpassword')) < 8) {
            return response()->json([
                'message' => 'Пароль должен быть больше 8 символов!',
                'status' => 422
            ], 422);
        }
        if(strlen(request('regname')) == 0) {
            return response()->json([
                'message' => 'Введите имя!',
                'status' => 422
            ], 422);
        }

        $user = new User;
        $user->password = Hash::make(request('regpassword'));
        $user->email = request('regmail');
        $user->name = request('regname');
        $user->save();
        return request('regmail');


    }
}
