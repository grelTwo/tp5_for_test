<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 11:32 上午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\constants;


class sessionCacheConstants
{
    /**
     * 登录相关参数
     */
    const UNIT_FLAG_SESSION = 'UNIT_FLAG_SESSION_VALUE';//单位标记常量
    const UNIT_LOGIN_SESSION = 'UNIT_LOGIN_SESSION_VALUE';//后台登录常量
    const UNIT_LOGIN_SESSION_PREFIX = 'UNIT_LOGIN_SESSION_PREFIX_VALUE';//后台登录常量字母
    const UNIT_SQL_SESSION = 'UNIT_SQL_SESSION_VALUE';//数据库配置常量
    const UNIT_SQL_SESSION_PREFIX = 'UNIT_SQL_SESSION_PREFIX_VALUE';//数据库配置常量字母
    const UNIT_INFO_SESSION = 'UNIT_INFO_SESSION_VALUE';//单位信息常量
    const UNIT_INFO_SESSION_PREFIX = 'UNIT_INFO_SESSION_PREFIX_VALUE';//单位信息常量字母

    const TOKEN_EXPIRE_IN = 3600*4;//缓存失效时间

    /**
     *
     */
}