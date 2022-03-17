<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $url = 'api/goods/get-dtk-search-goods';
        $params = $request ->only('pageSize','pageId','keyWords');
        $res = DataokeService::getClient()->request($url,$params,'v2.1.2');
        return apiSuccess($res['list']);
    }

    /**
     * 热搜记录
     * $type 1：买家热搜榜、2：淘客热搜榜
     */
    public function hotSearch(){
        $url = 'api/category/get-top100';
        $params = ['type'=>Request('type',1)];
        $res = DataokeService::getClient()->request($url,$params,'v1.0.1');
        return apiSuccess($res['hotWords']);
    }
}
