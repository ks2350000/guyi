<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Session;
use app\index\common\Base;

use app\index\model\User as UserModel;

class Index extends Controller
{

    public function index()
    {
    	$kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }
}
