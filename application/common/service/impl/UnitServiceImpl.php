<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 1:11 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\service\impl;


use app\common\model\UnitModel;
use app\common\service\iUnitService;
use think\Exception;

class UnitServiceImpl implements iUnitService
{
    protected $connection = [];
    public function __construct($connection=[])
    {
        $this->connection = $connection;
    }

    public function getUnitInfo($flag)
    {
        $item = [];
        try {
            $unitModel = new UnitModel($this->connection);
            $item = $unitModel->baseFind(['flag'=>$flag]);
            return $item;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }
}