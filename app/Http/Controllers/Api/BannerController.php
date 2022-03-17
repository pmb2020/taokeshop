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
        return apiSuccess($res);
    }
}
