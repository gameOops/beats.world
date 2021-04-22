<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PostsService;

use App\User;

class PostsController extends Controller
{
    private $postsService;

    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;

    }

    public function show()
    {
        return $this->postsService->getAllPosts(request('id'));
    }

    public function getWhere () {
        return $this->postsService->getWhere(request('id'));
    }

    public function createPost() {

    }


}

