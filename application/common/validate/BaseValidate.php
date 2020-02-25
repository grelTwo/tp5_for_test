<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 7:27 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\validate;


//use app\common\exception\baseException;
use app\common\constants\commonConstants;
use app\common\exception\baseException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 检测所有客户端发来的参数是否符合验证类规则
     * 基类定义了很多自定义验证方法
     * 这些自定义验证方法其实，也可以直接调用
     * @param []
     * @throws baseException
     */
    public function goCheck($params = [])
    {
        //必须设置content-type:application/json
        if (!$this->check($params)) {
            $msg = is_array($this->error) ? implode(';', $this->error) : $this->error;
            throw new baseException($msg, commonConstants::ERROR,200);
        }
    }

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return $field . '必须是正整数';
    }

    protected function isParam($value, $rule = '', $data = '', $field = ''){
        return true;
    }

    protected function isImage($value, $rule='', $data='', $field=''){
        $images = ['jpeg','png','jpg'];
        $ext = explode(".", $value);//拆分获取图片名
        $ext = $ext[count($ext) - 1];
        if(in_array($ext,$images)){
            return true;
        }
        return $field.'文件类型不允许!';
    }
    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value)) {
            if ($value == 0) {
                return true;
            } else {
                return $field . '不允许为空';
            }
        } else {
            return true;
        }
    }
    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}