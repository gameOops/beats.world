<?php


namespace App\Services;

use App\User;

class UsersTopService
{
    public function getUsersComp() {
        return User::inRandomOrder()->take(5)->get();
    }
}
