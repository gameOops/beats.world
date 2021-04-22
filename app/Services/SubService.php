<?php


namespace App\Services;
use App\Sub;

class SubService
{
    public function subscribe($id, $sub_id) {
        $matchThese = ['subfrom_id' => $id, 'subto_id' => $sub_id];
        $sub = Sub::where($matchThese)->first();
        if(!isset($sub)) {
            Sub::insert([
                'subfrom_id' => $id,
                'subto_id' => $sub_id,
            ]);
            return response()->json([
                'message' => 'Success'
            ],200);
        }
        return response()->json([
            'message' => 'Error'
        ],402);
    }
    public function unSubscribe($id, $sub_id) {
        $matchThese = ['subfrom_id' => $id, 'subto_id' => $sub_id];
        $sub = Sub::where($matchThese)->first();
        if(isset($sub)) {
            $sub->delete();
            return response()->json([
                'message' => 'Success'
            ],200);
        }
        return response()->json([
            'message' => 'Error'
        ],402);
    }
    public function check($id,$sub_id) {
        $matchThese = ['subfrom_id' => $id, 'subto_id' => $sub_id];
        $sub = Sub::where($matchThese)->first();
        if(!isset($sub)) {
            return response()->json([
                'message' => 'nosub'
            ],200);
        }
        return response()->json([
            'message' => 'sub'
        ],200);
    }
}
