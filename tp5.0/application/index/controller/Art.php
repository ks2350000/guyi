<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Art as ArtModel;

class Art extends Controller
{
	public function artist()
    {
       return $this->fetch();
    }

    public function artist_detail()
    {
       return $this->fetch();
    }

    public function settled()
    {
       return $this->fetch();
    }

    public function zuihou()
    {
       return $this->fetch();
    }
    
}