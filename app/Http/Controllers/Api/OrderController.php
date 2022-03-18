<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function taobao(Request $request){
        $url = 'api/tb-service/get-order-details';
        $params = $request->only('queryType','startTime','endTime');
        $res = DataokeService::getClient()->request($url,$params,'v1.0.0');
        return apiSuccess($res);
    }
}
