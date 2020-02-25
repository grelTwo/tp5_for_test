<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 11:19 上午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\backend\controller;
use app\common\exception\baseException;
use app\common\model\UnitModel;
use app\common\vo\Connection;
use think\Exception;
use think\facade\View;

class Index extends BackendBaseController
{
    public function index(){
        return View::fetch('index');
    }
}