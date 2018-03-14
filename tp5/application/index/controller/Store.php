<?php
namespace app\index\controller;

use think\Db;
use app\index\common\Base;
use app\index\model\Store as StoreModel;

class Store extends Base
{
	public function mall()
    {
       return $this->fetch();
    }

    public function shopping()
    {
       return $this->fetch();
    }
}