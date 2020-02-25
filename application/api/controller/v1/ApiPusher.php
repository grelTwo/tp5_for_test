<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/25 9:39 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\api\controller\v1;


class ApiPusher extends ApiBaseController
{
    public function test(){
        halt($this->connection);
        halt($this->getUnitInfo()->getDate());
        halt($this->getManagerInfo()->getDate());
    }
}