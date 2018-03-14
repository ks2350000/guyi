<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Fund as FundModel;

class Fund extends Controller
{
	public function zhye()
    {
       return $this->fetch();
    }

    public function zxcz()
    {
       return $this->fetch();
    }

    public function zxtx()
    {
       return $this->fetch();
    }

    public function jiesuan()
    {
       return $this->fetch();
    }

    public function fukuan()
    {
       return $this->fetch();
    }
}