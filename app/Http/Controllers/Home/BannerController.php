<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $url = 'https://openapi.dataoke.com/api/goods/topic/carouse-list';
        $appKey= config('taoke.dataoke.app_key');
        $appSecret =config('taoke.dataoke.app_secret');
        $data  =[
            'appKey' =>$appKey,
            'version' => 'v2.0.0'
        ];
        $data['sign'] = $this->makeSign($data,$appSecret);
        $url = $url .'?'. http_build_query($data);
        return myCurl($url);
    }


    public function makeSign($data, $appSecret)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        $sign = strtoupper(md5($str . '&key=' . $appSecret));
        return $sign;
    }
}
