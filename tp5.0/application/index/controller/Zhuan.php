<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Zhuan as ZhuanModel;

class Zhuan extends Controller
{
	public function special()
    {
       return $this->fetch();
    }

    public function special_detail()
    {
       return $this->fetch();
    }
}