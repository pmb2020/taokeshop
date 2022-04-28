<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function friendCircle(Request $request){
        $url = 'api/goods/friends-circle-list';
        $params = $request->only('pageSize','pageId','cid');
        $res = DataokeService::getClient()
            ->request($url,$params,' v1.3.0');
        return apiSuccess($res['list']);
    }
}
