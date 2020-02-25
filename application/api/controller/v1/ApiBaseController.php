<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 8:47 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\common\constants\sessionCacheConstants;
use app\common\exception\baseException;
use app\common\vo\ManagerInfo;
use app\common\vo\UnitInfo;
use think\Controller;
use think\facade\Cache;
use think\facade\Env;
use think\facade\Lang;
use think\facade\Request;

class ApiBaseController extends Controller
{
    //数据库连接参数
    public $connection = [];
    //单位信息
    public $unitInfo = [];
    //管理员信息
    public $managerInfo = [];
    //单位标记
    public $flag = '';
    /**
     * @throws baseException
     */
    protected function initialize()
    {
        //语言包
        $lang = $this->request->param('lang', 'mn', 'trim');
        $this->loadLang($lang);
        //检测登录
        $this->checkRequestAuth();
        parent::initialize();
    }

    /**
     * 检测登录及数据初始化
     * @throws baseException
     */
    public function checkRequestAuth(){
        $token = Request::header('user-token');
        if(empty($token)){
            throw new baseException(lang('please login'), 401, 401);
        }
        $cache = Cache::get($token);
        if (!$cache) {
            throw new baseException(lang('token is invalid please log in again'), 401, 401);
        }
        Cache::set($token,$cache,sessionCacheConstants::TOKEN_EXPIRE_IN);
        $this->connection = $cache['connection'];
        $this->unitInfo = $cache['unitInfo'];
        $this->managerInfo = $cache['managerInfo'];
    }
    /**
     * 加载语言包
     * @param $lang
     */
    public function loadLang($lang)
    {
        Lang::load(Env::get('app_path') . 'api/lang/' . $lang . '.php');
    }
    //单位信息
    public function getUnitInfo() : UnitInfo {
        return (new UnitInfo($this->unitInfo));
    }
    //登录用户信息
    public function getManagerInfo() : ManagerInfo {
        return (new ManagerInfo($this->managerInfo));
    }
}