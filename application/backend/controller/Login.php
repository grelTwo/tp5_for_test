<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 12:15 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\backend\controller;


use app\common\constants\commonConstants;
use app\common\constants\sessionCacheConstants;
use app\common\model\ManagerModel;
use app\common\service\impl\UnitServiceImpl;
use app\common\vo\ManagerInfo;
use app\common\vo\Connection;
use app\common\vo\UnitInfo;
use think\facade\Cache;
use think\facade\Session;
use think\facade\View;

class Login extends BackendBaseController
{
    protected function initialize()
    {
    }
    /**
     * 后台登录入口
     * @param string $unit
     * @return string
     */
    public function index($unit=''){
        if(empty($unit)){
            $this->error('请看浏览器路径参数缺失单位信息=> unit=\'xxx\' ','','',60);
        }
        Cache::set(sessionCacheConstants::UNIT_FLAG_SESSION.$this->request->ip(),$unit);
        $connection = new Connection();
        //获取单位信息
        $unitService = new UnitServiceImpl($connection->getDate());
        $unitInfo = $unitService->getUnitInfo($unit);
        if(!empty($unitInfo)){
            //获取简化单位信息
            $unitVo = new UnitInfo($unitInfo);
            Session::set(sessionCacheConstants::UNIT_INFO_SESSION,$unitVo->getDate(),sessionCacheConstants::UNIT_INFO_SESSION_PREFIX);
            $this->assign('unitInfo',$unitVo->getDate());
        }
        $connection = new Connection($unitInfo);
        Session::set(sessionCacheConstants::UNIT_SQL_SESSION,$connection->getDate(),sessionCacheConstants::UNIT_SQL_SESSION_PREFIX);
        return View::fetch('index');
    }
    /**
     * 后台系统登录
     * @return \think\response\Json
     * @throws \think\Exception
     */
    public function doLogin(){
        if(!$this->request->isPost()){
            return show(commonConstants::ERROR,'非法操作!');
        }
        $username = 'tlrbzgl';
        $password = 'f334b3b884a04876c1ffefd6764529d6';
        $captcha = '1234';
        if(!$this->checkFlag()){
            $this->redirect(commonConstants::LOGIN_URL.Cache::get(sessionCacheConstants::UNIT_FLAG_SESSION.$this->request->ip()));
        }
        //todo 反
        //登录限制
        if(!is_super_admin()){
            //检测单位是否有权登录
            if($this->getUnitInfo()->getStatus()==0){
                if($this->getUnitInfo()->getUnitIp() != $this->request->ip()){
                    return show(commonConstants::ERROR,'ip已被限制登录,请联系开发公司');
                }
            }
        }
        $managerModel = new ManagerModel($this->connection);
        $manager = $managerModel->baseFind(['username'=>$username]);
        $managerInfo = new ManagerInfo($manager);
        //验证用户名，密码，验证码
        if(!captcha_check($captcha)){
            return show(commonConstants::ERROR,'验证码错误');
        }
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
        $data = [
            'last_login_time'=>time(),
            'last_login_ip' => $this->request->ip()
        ];
        $managerModel->baseUpdateItems(['id'=>$data['id']],$data);//更新登录用户信息
        Session::set(sessionCacheConstants::UNIT_LOGIN_SESSION,$managerInfo->getDate(),sessionCacheConstants::UNIT_LOGIN_SESSION_PREFIX);
        return show(commonConstants::SUCCESS,'登录成功');
    }

}