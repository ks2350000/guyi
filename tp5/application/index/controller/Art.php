<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;
use app\index\model\Art as ArtModel;

class Art extends Controller
{
	public function artist()
    {
      $kk = new Base();
      $kk -> zxc();
      
      return $this->fetch();
    }

    public function artist_detail()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function settled()
    {
      $kk = new Base();
      $kk -> zxc();
      
      return $this->fetch();
    }

    public function zuihou()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }
    
}