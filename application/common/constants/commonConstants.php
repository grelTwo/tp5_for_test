<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 12:07 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\constants;

/**
 * 公共常量
 * Class commonConstants
 * @package app\common\constants
 */
class commonConstants
{
    //后台
    const SUPER_ADMIN = 'erensoft';//超级管理员
    const LOGIN_URL = '/backend/login?unit=';//登录入口
    const HOME_URL = '/backend';//后台首页入口
    const SALT = 'erensoft_salt';//盐

    //返回编码及提示
    const SUCCESS = 0; //成功提示
    const ERROR = 1; //失败提示
    const NEED_LOGIN = 401; //需要登录

}