<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 9:24 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\common\constants\commonConstants;
use app\common\constants\sessionCacheConstants;
use think\facade\Cache;

class Token
{
    public static function setToken($data)
    {
        $token = self::generateToken();
        $expire_in = sessionCacheConstants::TOKEN_EXPIRE_IN;
        Cache::set($token,$data, $expire_in);
        return $token;
    }

    private static function generateToken()
    {
        //32个字符组成一个随机字符串
        $randChars = getRandChar(32);
        //用三组字符串，进行MD5加密
        $timetamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = commonConstants::SALT;
        return md5($randChars . $timetamp . $salt);
    }
}