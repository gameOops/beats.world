<?php

namespace App\Http\Controllers\Api;
use App\User;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function auth()
    {
        // Проверяем существует ли пользователь с указанным email адресом
        $user = User::whereEmail(request('username'))->first();

        if (!$user) {
            return response()->json([
                'message' => 'Wrong email',
                'status' => 422
            ], 422);
        }

        // Если пользователь с таким email адресом найден - проверим совпадает
        // ли его пароль с указанным
        $password = request('password');
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'message' => $user->password,
                'status' => 422
            ], 422);
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $newToken = Hash::make($randomString);

        $user->remember_token = $newToken;

        $user->save();


        return response()->json([
            'token' => $newToken,
            'image' => $user->image,
            'name' => $user->name,
            'desc' => $user->desc,
            'id' => $user->id,
        ]);




        // Убедимся, что Password Client существует в БД (т.е. Laravel Passport

    }
    public function getImage() {
        $user = DB::table('users')->where('remember_token', request('token'))->first();

        return $user->image;
    }
}
