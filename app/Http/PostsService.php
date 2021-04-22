<?php


namespace App\Http;


class PostsService
{
    public function getById($id)
    {
        return User::where('id', '=', $id)
            ->with('comments')
            ->first();
    }

    public function updateUser($request, $user)
    {
        $firstName = $request->get('first_name');
        $user->first_name = $firstName;
        $user->save();
    }

}
