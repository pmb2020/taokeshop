<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){
        $url = 'api/comment/get-comment-list';
        $params = $request->only('id','goodsId','type','sort');
        $res = DataokeService::getClient()->request($url,$params,'v1.0.0');
        return apiSuccess($res);
    }
}
