<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 1:13 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model;


class UnitModel extends BaseModel
{
    protected $connection = [];
    protected $table = 'unit';
    public function __construct($connection = [])
    {
        $this->connection = $connection;
        parent::__construct($this->connection,$this->table);
    }
}