<?php


namespace App\Http\Controllers\Api;

use App\Services\UsersTopService;
use App\Http\Controllers\Controller;

class UsersTopController extends Controller
{
    private $usersTopService;

    public function __construct(UsersTopService $usersTopService)
    {
        $this->usersTopService = $usersTopService;

    }
    public function getUsersComp()
    {
        return $this->usersTopService->getUsersComp();
    }
}
