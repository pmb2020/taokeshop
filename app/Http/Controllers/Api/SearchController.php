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
     * 搜索建议（联想词）
     * $type 1.大淘客搜索 2.联盟搜索 3.超级搜索
     */
    public function suggestion(Request $request){
        $url = 'api/goods/search-suggestion';
        $params = $request->only('keyWords','type');
        $res = DataokeService::getClient()->request($url,$params,'v1.0.2');
        return apiSuccess($res);
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
