<?php

namespace App\Services;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Log;

class DataokeService
{
    private string $host = 'https://openapi.dataoke.com/';
    private static $client;

    public function __construct(){
    }
    private function __clone(){
    }

    /**
     * @return static
     */
    public static function getClient(): static
    {
        if (! self::$client instanceof self){
            self::$client=new static();
        }
        return self::$client;
    }

    /**
     * @param $url
     * @param array $params
     * @param $version
     * @return mixed
     * @throws ApiException
     */
    public function request($url,$params=[],$version)
    {
        $appSecret =config('taoke.dataoke.app_secret');
        $params['appKey'] = config('taoke.dataoke.app_key');
        $params['version'] = $version;
        $params['sign'] = $this->makeSign($params,$appSecret);
        $url = $this->host.$url .'?'. http_build_query($params);
        $res = myCurl($url);
        if ($res['code'] !=0){
            Log::error('大淘客接口异常：',$res);
            throw new ApiException([$res['code'],'dtk：'.$res['msg']]);
        }
        return $res['data'];
    }

    /**
     * 大淘客签名
     * @param $data
     * @param $appSecret
     * @return string
     */
    private function makeSign($data, $appSecret)
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
