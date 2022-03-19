<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $url = 'api/goods/topic/carouse-list';
        $res = DataokeService::getClient()->request($url,[],'v2.0.0');
        foreach ($res as &$v){
            if ($v['sourceType'] == 2){
                $v['click_url']=$this->test($v['activityId'])['click_url'];
            }
        }
        return apiSuccess($res);
    }

    /**
     * 获取淘宝活动会场链接
     * @param $activityId
     */
    public function test($activityId){
        $url = 'api/tb-service/activity-link';
        $params = [
            'promotionSceneId' =>$activityId
        ];
        $res = DataokeService::getClient()->request($url,$params,'v1.0.0');
        return $res;
    }
}
