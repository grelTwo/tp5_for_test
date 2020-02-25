<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 1:17 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\poho;


class Unit
{
    private $id = 0;//id
    private $name = '';//单位名
    private $address = '';//单位地址
    private $phone = '';//单位联系方式
    private $email = '';//单位邮箱
    private $unit_num = '';//单位编号
    private $unit_ip = '';//单位ip地址
    private $status = 1;//单位状态
    private $unit_sql = '';//单位数据库
    private $img = '';//单位图
    private $favicon_ico = '';//单位网站图标
    private $flag = '';//单位表示
    private $cate_id = '';//单位阿里云音视频分类
    private $bucket = '';//单位阿里云ossBucket
    private $bg = '';//单位登录页面背景图
    private $db_host = '';//单位数据库 host
    private $db_user = '';//单位数据库用户名
    private $db_charset = 'utf8';//单位数据库编码
    private $db_port = '';//单位数据库端口
    private $db_pw = '';//单位数据密码
    private $db_type = '';//单位数据库类型
    private $master_secret = '';//极光推送master_secret
    private $app_key = '';//极光推送app_key
    private $create_time = 0;
    private $update_time = 0;
    private $delete_time = '';

    public function __construct(array $arr=[])
    {
        foreach ($arr as $key=>$value) {
            if(isset($this->{$key})){
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUnitNum(): string
    {
        return $this->unit_num;
    }

    /**
     * @param string $unit_num
     */
    public function setUnitNum(string $unit_num)
    {
        $this->unit_num = $unit_num;
    }

    /**
     * @return string
     */
    public function getUnitIp(): string
    {
        return $this->unit_ip;
    }

    /**
     * @param string $unit_ip
     */
    public function setUnitIp(string $unit_ip)
    {
        $this->unit_ip = $unit_ip;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUnitSql(): string
    {
        return $this->unit_sql;
    }

    /**
     * @param string $unit_sql
     */
    public function setUnitSql(string $unit_sql)
    {
        $this->unit_sql = $unit_sql;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img)
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getFaviconIco(): string
    {
        return $this->favicon_ico;
    }

    /**
     * @param string $favicon_ico
     */
    public function setFaviconIco(string $favicon_ico)
    {
        $this->favicon_ico = $favicon_ico;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag(string $flag)
    {
        $this->flag = $flag;
    }

    /**
     * @return string
     */
    public function getCateId(): string
    {
        return $this->cate_id;
    }

    /**
     * @param string $cate_id
     */
    public function setCateId(string $cate_id)
    {
        $this->cate_id = $cate_id;
    }

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->bucket;
    }

    /**
     * @param string $bucket
     */
    public function setBucket(string $bucket)
    {
        $this->bucket = $bucket;
    }

    /**
     * @return string
     */
    public function getBg(): string
    {
        return $this->bg;
    }

    /**
     * @param string $bg
     */
    public function setBg(string $bg)
    {
        $this->bg = $bg;
    }

    /**
     * @return string
     */
    public function getDbHost(): string
    {
        return $this->db_host;
    }

    /**
     * @param string $db_host
     */
    public function setDbHost(string $db_host)
    {
        $this->db_host = $db_host;
    }

    /**
     * @return string
     */
    public function getDbUser(): string
    {
        return $this->db_user;
    }

    /**
     * @param string $db_user
     */
    public function setDbUser(string $db_user)
    {
        $this->db_user = $db_user;
    }

    /**
     * @return string
     */
    public function getDbCharset(): string
    {
        return $this->db_charset;
    }

    /**
     * @param string $db_charset
     */
    public function setDbCharset(string $db_charset)
    {
        $this->db_charset = $db_charset;
    }

    /**
     * @return string
     */
    public function getDbPort(): string
    {
        return $this->db_port;
    }

    /**
     * @param string $db_port
     */
    public function setDbPort(string $db_port)
    {
        $this->db_port = $db_port;
    }

    /**
     * @return string
     */
    public function getDbPw(): string
    {
        return $this->db_pw;
    }

    /**
     * @param string $db_pw
     */
    public function setDbPw(string $db_pw)
    {
        $this->db_pw = $db_pw;
    }

    /**
     * @return string
     */
    public function getDbType(): string
    {
        return $this->db_type;
    }

    /**
     * @param string $db_type
     */
    public function setDbType(string $db_type)
    {
        $this->db_type = $db_type;
    }

    /**
     * @return string
     */
    public function getMasterSecret(): string
    {
        return $this->master_secret;
    }

    /**
     * @param string $master_secret
     */
    public function setMasterSecret(string $master_secret)
    {
        $this->master_secret = $master_secret;
    }

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->app_key;
    }

    /**
     * @param string $app_key
     */
    public function setAppKey(string $app_key)
    {
        $this->app_key = $app_key;
    }

    /**
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->create_time;
    }

    /**
     * @param string $create_time
     */
    public function setCreateTime(string $create_time)
    {
        $this->create_time = $create_time;
    }

    /**
     * @return string
     */
    public function getUpdateTime(): string
    {
        return $this->update_time;
    }

    /**
     * @param string $update_time
     */
    public function setUpdateTime(string $update_time)
    {
        $this->update_time = $update_time;
    }

    /**
     * @return string
     */
    public function getDeleteTime(): string
    {
        return $this->delete_time;
    }

    /**
     * @param string $delete_time
     */
    public function setDeleteTime(string $delete_time)
    {
        $this->delete_time = $delete_time;
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
            if($i == 'create_time'||$i == 'update_time')$v =time();
            $arr[$i] = $v;
        }
        return $arr;
    }


}