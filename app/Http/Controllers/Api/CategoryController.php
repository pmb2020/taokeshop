<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DataokeService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $url = 'api/category/get-super-category';
        $res = DataokeService::getClient()->request($url,[],'v1.1.0');
        $newRes[]=['id'=>0,'name'=>'首页'];
        foreach ($res as $k=>$v){
            $newRes[$k+1]['id']=$v['cid'];
            $newRes[$k+1]['name']=$v['cname'];
        }
        array_multisort(array_column($newRes, 'id'), SORT_ASC, $newRes);
        return apiSuccess($newRes);
    }
}
