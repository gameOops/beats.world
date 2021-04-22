<?php


namespace App\Services;

use App\Post;
use App\Sub;

class PostsService
{
    public function getById($id)
    {
        if($id <=0) {
            return response()->json([
                'message' => 'Введите id пользователя',
                'status' => 422
            ], 422);
        }
        return Post::where('id',$id)->first();
    }

    public function getAllPosts($id)
    {
        $subs = Sub::where('subfrom_id',$id)->get();
        $arr_sub = [];
        foreach ($subs as $sub) {
            array_push($arr_sub,$sub->subto_id);
        }
        return Post::with('user')->whereIn('author_id',$arr_sub)->orderBy('id', 'DESC')->get();

    }

    public function getWhere($id)
    {
        return Post::orderBy('id','desc')->where('author_id',$id)->get();
    }

    public function updateUser($request, $user)
    {
        $firstName = $request->get('first_name');
        $user->first_name = $firstName;
        $user->save();
    }
}
