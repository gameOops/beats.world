<?php


namespace App\Http\Controllers\Api;
use App\Services\DirectService;

class DirectController
{
    private $directService;

    public function __construct(DirectService $directService)
    {
        $this->directService = $directService;

    }
    public function getDialogs() {

        return $this->directService->getDialogs(request('id'));

    }
}
