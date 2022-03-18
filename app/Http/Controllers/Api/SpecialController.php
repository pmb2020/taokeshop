<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    /**
     * 每日爆品推荐
     */
    public function dayBlast(Request $request){
        $url = 'api/goods/explosive-goods-list';
        $params = $request->only('pageId','pageSize','cids');
        $res=DataokeService::getClient()->request($url,$params,'v1.0.0');
        return apiSuccess($res['list']);
    }

    /**
     * 9.9包邮
     * $nineCid -1-精选，1 -5.9元区，2 -9.9元区，3 -19.9元区
     */
    public function baoyou99(Request $request){
        $url = 'api/goods/nine/op-goods-list';
        $params = $request->only('pageId','pageSize','nineCid');
        $res=DataokeService::getClient()->request($url,$params,'v2.0.0');
        return apiSuccess($res['list']);
    }
}
