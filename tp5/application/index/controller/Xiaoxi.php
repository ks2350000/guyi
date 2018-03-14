<?php
namespace app\index\controller;

use think\Db;
use app\index\common\Base;
use app\index\model\Xiaoxi as XiaoxiModel;

class Xiaoxi extends Base
{
	public function xiexin()
    {
       return $this->fetch();
    }

    public function zixun()
    {
       return $this->fetch();
    }

    public function znx()
    {
       return $this->fetch();
    }

    public function znxdetail()
    {
       return $this->fetch();
    }
}