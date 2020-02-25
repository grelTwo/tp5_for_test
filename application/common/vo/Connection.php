<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/24 11:08 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\vo;
class Connection
{
    private $type='mysql';           //数据库类型
    private $hostname='127.0.0.1';   //服务器地址
    private $database='xxxxxx';    //数据库名
    private $username='xxxxxx';        //用户名
    private $password = 'xxxxxxx'; //密码
    private $hostport='3306';        //端口
    private $charset='utf8';         //数据库编码默认采用utf8
    private $prefix='xxxx_';     //数据库表前缀

    public function __construct(array $arr=[])
    {
        foreach ($arr as $key=>$value) {
            if(isset($this->{$key})){
                $this->{$key} = $value;
            }
        }
        $this->prefix = $this->database.'_';
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function getDate():array {
        $arr = [];
        foreach ($this as $i=>$v) {
            $arr[$i] = $v;
        }
        return $arr;
    }
}