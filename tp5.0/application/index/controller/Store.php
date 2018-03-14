<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Store as StoreModel;

class Store extends Controller
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