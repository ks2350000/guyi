<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Commodity as CommodityModel;

class Commodity extends Controller
{
	public function pro_detail()
    {
       return $this->fetch();
    }

}