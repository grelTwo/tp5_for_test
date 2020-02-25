<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\facade\Cache;
use app\common\constants\sessionCacheConstants;
use app\common\constants\commonConstants;

//是否超级管理
function is_super_admin(){
    if(Cache::get(sessionCacheConstants::UNIT_FLAG_SESSION.$_SERVER['REMOTE_ADDR'])==commonConstants::SUPER_ADMIN){
        return true;
    }else{
        return false;
    }
}
//是否单位管理员
function is_unit_admin(){
    if(true){
        return true;
    }else{
        return false;
    }
}
//通用json输出
function show($code=0, $message = 'ok', $data = [], $httpCode = 200)
{
    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data,
    ];
    return json($result, $httpCode);
}
//随机字符串
function getRandChar($length)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i = 0;
         $i < $length;
         $i++) {
        $str .= $strPol[rand(0, $max)];
    }
    return $str;
}