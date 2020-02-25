<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2019-12-17 18:44
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\exception;


use Exception;
use think\exception\Handle;

class handleException extends Handle
{
    /**
     * http 转态码
     * @var int
     */
    public $httpCode = 500;

    public function render(Exception $e){
        if($e instanceof baseException){
            $this->httpCode = $e->httpCode;
        }
        if(method_exists($e,'getStatusCode')){
            $httpCode = $e->getStatusCode();
        }else{
            $httpCode = $this->httpCode;
        }
        if (config('app_debug') == true) {
            //前端应该如何判断是否系统出错?
            return  json([
                'code'=>$e->getCode(),
                'file'=>$e->getFile(),
                'line'=>$e->getLine(),
                'error'=>$e->getMessage()
            ], $httpCode);
        }else{
            //如果不发送错误信息调试成本会更大
            return  json([
                'code'=>1,
                'error'=>$e->getMessage()
            ], $httpCode);
        }
    }
}