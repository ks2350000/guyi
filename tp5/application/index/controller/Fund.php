<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;

use app\index\model\Fund as FundModel;

class Fund extends Controller
{
	public function zhye()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function zxcz()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function zxtx()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function jiesuan()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function fukuan()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }
}