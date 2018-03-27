<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Xiaoxi as XiaoxiModel;
use app\index\common\Base;

class Xiaoxi extends Controller
{
	public function xiexin()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function zixun()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function znx()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function znxdetail()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }
}