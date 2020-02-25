<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 12:43 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\vo;


class UnitInfo
{
    private $name = '';         //单位名
    private $unit_ip = '';      //单位ip
    private $unit_sql = '';     //单位数据库
    private $flag = '';         //单位标记
    private $bucket = '';       //单位阿里云ossBucket
    private $cate_id = '';      //单位阿里云视频分类
    private $master_secret = '';//单位极光推送master_secret
    private $app_key = '';      //单位极光推送app_key
    private $status = 0;       //单位ip检测

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