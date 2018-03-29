<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Store as StoreModel;
use app\index\common\Base;

class Store extends Controller
{
	public function mall()
    {
      $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }

    public function shopping()
    {
      $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }
}