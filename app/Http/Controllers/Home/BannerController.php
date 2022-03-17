<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $url = 'api/goods/topic/carouse-list';
        $url = 'api/goods/explosive-goods-list';
        $params = [
            'pageId' => 2111,
            'pageSize' => 10
        ];
        return DataokeService::getClient()->request($url, $params, 'v1.1.0');
    }

}
