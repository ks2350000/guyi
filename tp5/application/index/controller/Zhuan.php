<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Session;
use app\index\model\Zhuan as ZhuanModel;
use app\index\common\Base;

class Zhuan extends Controller
{
	public function special()
    {
       $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }

    public function special_detail()
    {
       $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }
}