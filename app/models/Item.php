<?php
namespace app\models;

use php\base\Model;
use php\db\Db;

/**
 * 用户Model
 */
class Item extends Model
{

    protected $table = 'item';

    public function search($keyword)
    {
        $sql = "select * from `$this->table` where `item_name` like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}