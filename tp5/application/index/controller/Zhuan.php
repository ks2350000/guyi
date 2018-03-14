<?php
namespace app\index\controller;

use think\Db;
use app\index\common\Base;
use app\index\model\Zhuan as ZhuanModel;

class Zhuan extends Base
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