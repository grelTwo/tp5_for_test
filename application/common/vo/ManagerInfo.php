<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 12:43 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\vo;


class ManagerInfo
{
    private $username = '';       //用户名
    private $is_admin = 0;        //是否超级管理
    private $status = 1;          //用户状态
    private $gender = 0;          //性别
    private $nickname = '';       //昵称
    private $email_verified = 0;  //邮箱验证状态
    private $email = '';          //邮箱
    private $avatar = '';         //头像
    private $mobile = '';         //手机号

    public function __construct(array $arr=[])
    {
        foreach ($arr as $key=>$value) {
            if(isset($this->{$key})){
                $this->{$key} = $value;
            }
        }
    }
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getIsAdmin(): int
    {
        return $this->is_admin;
    }

    /**
     * @param int $is_admin
     */
    public function setIsAdmin(int $is_admin)
    {
        $this->is_admin = $is_admin;
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
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender(int $gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return int
     */
    public function getEmailVerified(): int
    {
        return $this->email_verified;
    }

    /**
     * @param int $email_verified
     */
    public function setEmailVerified(int $email_verified)
    {
        $this->email_verified = $email_verified;
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
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile(string $mobile)
    {
        $this->mobile = $mobile;
    }

    public function getDate():array {
        $arr = [];
        foreach ($this as $i=>$v) {
            $arr[$i] = $v;
        }
        return $arr;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}