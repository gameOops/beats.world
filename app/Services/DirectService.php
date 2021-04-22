<?php


namespace App\Services;
use App\Direct;
use App\Dialog;

class DirectService
{
    public function getDialogs($id) {
        return Dialog::with(['fromu','tou'])->where('from_id',$id)->orWhere('to_id',$id)->get();

    }
}
