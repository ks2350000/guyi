<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Session;
<<<<<<< HEAD
use app\index\common\Base;
=======
use app\index\common\Base; 
>>>>>>> dev

use app\index\model\User as UserModel;

class Index extends Controller
{

    public function index()
    {
<<<<<<< HEAD
    	$kk = new Base();
    	$kk -> zxc();
=======
        $kk = new Base();
        $kk -> zxc();

    	if (!empty(session('uid'))) {
    		$shopp = model('Shopping');
    		$count = $shopp->sel();
    		session('count',$count);
    	}
        $comm = model('Commodity');
        $data = $comm->selectIndex(); 
        $this->assign('data',$data);
>>>>>>> dev
    	return $this->fetch();
    }
}
