<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2019-12-17 18:44
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\exception;


use think\Exception;

class baseException extends Exception
{
    public $message = '';
    public $httpCode = 500;
    public $code = 1;
    public function __construct($message = "HTTP ERROR ", $code = 1, $httpCode=500)
    {
        $this->httpCode = $httpCode;
        $this->message = $message.' HTTP ERROR '.$httpCode;
        $this->code = $code;
    }
}