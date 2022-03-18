<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * 商品列表
     */
    public function index(Request $request){
        $url = 'api/goods/get-goods-list';
        $params = $request->only('pageId','pageSize','cids','subcid');
        $res = DataokeService::getClient()->request($url,$params,'v1.2.4');
        return apiSuccess($res['list']);
    }

    /**
     * 商品详情
     */
    public function show(){
        $url = 'api/goods/get-goods-details';
        $params=array();
        if ($id=Request('id')){
            $params=['id'=>$id];
        }else if ($goodsId=Request('goodsId')){
            $params=['goodsId'=>$goodsId];
        }
        $res = DataokeService::getClient()->request($url,$params,'v1.2.3');
        return apiSuccess($res);
    }

    /**
     * 转链
     */
    public function transformLink(Request $request){
        $url = 'api/tb-service/get-privilege-link';
        $params = $request->only('goodsId','couponId');
        $res = DataokeService::getClient()->request($url,$params,'v1.3.1');
        return apiSuccess($res);
    }
}
