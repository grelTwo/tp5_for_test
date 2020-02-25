<?php
/**
 * Create By xuzhihua
 * author     : xuzhihua
 * createTime : 2020/2/24 9:43 下午
 * description: 现在的努力是为了小时候吹过的牛逼！
 */

namespace app\common\model;


use think\Db;
use think\Model;

class BaseModel extends Model
{
    protected $connection=[];
    protected $table = '';
    public function __construct($connection = [],$table='')
    {
        $this->connection = $connection;
        $this->table = $table;
        parent::__construct($connection);
    }
    /**
     * 模型保存基础方法
     * @param array $items
     * @return mixed
     * @throws \think\Exception
     */
    public function baseSaveItems($items=[]){
        return Db::connect($this->connection)->table($this->connection['prefix'].$this->table)
            ->strict(false)
            ->insertGetId($items);
    }

    /**
     * 模型更新基础方法
     * @param array $where
     * @param array $items
     * @return mixed
     * @throws \think\Exception
     */
    public function baseUpdateItems($where=[],$items=[]){
        return Db::connect($this->connection)->table($this->connection['prefix'].$this->table)
            ->where($where)
            ->update($items);
    }

    /**
     * 模型获取数据基础方法
     * @param array $where
     * @param array $field
     * @param array $order
     * @return mixed
     * @throws \think\Exception
     */
    public function baseFind($where=[],$field=[],$order=[]){
        return Db::connect($this->connection)
            ->table($this->connection['prefix'].$this->table)
            ->where($where)
            ->withAttr('create_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->withAttr('update_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->useSoftDelete('delete_time')
            ->field($field)
            ->order($order)
            ->findOrEmpty();
    }

    /**
     * 模型获取数据列表方法
     * @param array $where
     * @param array $field
     * @param array $order
     * @return mixed
     * @throws \think\Exception
     */
    public function baseSelect($where=[],$field=[],$order=[]){
        return Db::connect($this->connection)
            ->table($this->connection['prefix'].$this->table)
            ->where($where)
            ->withAttr('create_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->withAttr('update_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->order($order)
            ->select();
    }

    /**
     * 模型获取带分页的数据列表方法
     * @param array $where
     * @param array $field
     * @param array $order
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws \think\Exception
     */
    public function basePaginate($where=[],$field=[],$order=[],$page=1,$limit=20){
        return Db::connect($this->connection)
            ->table($this->connection['prefix'].$this->table)
            ->where($where)
            ->withAttr('create_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->withAttr('update_time', function($value, $data) {
                return date('Y-m-d H:i:s');
            })
            ->order($order)
            ->paginate($limit,'',['page'=>$page])
            ->items();
    }

}