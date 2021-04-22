<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AudioResourceResource;
use Illuminate\Support\Facades\DB;

class AudioController extends Controller
{
    public function index()
    {
        $audios = DB::select('SELECT * FROM audios');
        return json_encode($audios);
        /*foreach ($audios as $audio) {
            return [
                'name' => $audio->name,
                'src' => $audio->src,
                'cover' => $audio->cover,
            ];
        }*/



    }
}
