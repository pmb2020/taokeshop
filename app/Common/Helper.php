<?php

function apiSuccess($data=[]){
    return response()->json([
        'code' => 0,
        'msg' => 'success',
        'data' => $data
    ]);
}

function apiError(array $codeResponse){
    return response()->json([
        'code' => $codeResponse[0],
        'msg' => $codeResponse[1],
        'data' => []
    ]);
}

/**
 * 封装的curl
 * @param $url
 * @return mixed
 */
function myCurl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}
