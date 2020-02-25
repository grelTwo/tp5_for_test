<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 8:50 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


use app\common\constants\commonConstants;
use app\common\model\ManagerModel;
use app\common\service\impl\UnitServiceImpl;
use app\common\vo\Connection;
use app\common\vo\ManagerInfo;
use app\common\vo\UnitInfo;
use think\facade\Cache;
use think\facade\Env;
use think\facade\Lang;
use think\facade\Request;

class ManagerLogin extends ApiBaseController
{
    public function __construct()
    {
        $lang = Request::param('lang','mn','trim');
        Lang::load(Env::get('app_path').'api/lang/'.$lang.'.php');
    }
    public function initialize()
    {
    }

    public function doLogin(){
        $username = Request::param('username','','trim');
        $password = Request::param('password','','trim');
        $unit = Request::param('unit','','trim');
        if(empty($username)||empty($password)||empty($unit)){
            return show(commonConstants::ERROR,lang('empty'));
        }
        $connection = new Connection();
        //获取单位信息
        $unitService = new UnitServiceImpl($connection->getDate());
        $unitInfo = $unitService->getUnitInfo($unit);
        //数据库连接信息
        $connection = new Connection($unitInfo);
        //单位简化信息
        $unitInfo = new UnitInfo($unitInfo);
        //管理员校对登录信息
        $managerModel = new ManagerModel($connection->getDate());
        $manager = $managerModel->baseFind(['username'=>$username]);
        if(empty($manager)){
            return show(commonConstants::ERROR,'无该用户');
        }
        if($manager['username'] != $username){
            return show(commonConstants::ERROR,'用户名错误');
        }
        if($manager['status'] == 0){
            return show(commonConstants::ERROR,'该用户暂时被禁用');
        }
        if($manager['password'] != $password){
            return show(commonConstants::ERROR,'密码错误');
        }
        //todo 获取当前用户角色
        $managerInfo = new ManagerInfo($manager);
        $data = [
            'connection'=>$connection->getDate(),
            'unitInfo'=>$unitInfo->getDate(),
            'managerInfo'=>$managerInfo->getDate()
        ];
        $token = Token::setToken($data);
        return show(commonConstants::SUCCESS,lang('login successful'),[
            'token'=>$token,
            'managerInfo'=>$managerInfo->getDate()
        ]);
    }
}