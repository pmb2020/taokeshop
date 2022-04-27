<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function friendCircle(){
        $url = 'api/goods/friends-circle-list';
        $res = DataokeService::getClient()
            ->request($url,[],' v1.3.0');
        return apiSuccess($res['list']);
    }
}
