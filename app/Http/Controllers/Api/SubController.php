<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\SubService;

class SubController extends Controller
{
    private $subService;

    public function __construct(SubService $subService)
    {
        $this->subService = $subService;
    }

    public function subscribe() {
        return $this->subService->subscribe(request('id'),request('sub_id'));
    }
    public function check() {
        return $this->subService->check(request('id'),request('sub_id'));
    }
    public function unSubscribe() {
        return $this->subService->unSubscribe(request('id'),request('sub_id'));
    }
}

