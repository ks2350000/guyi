<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Session;
use app\index\model\Zhuan as ZhuanModel;
use app\index\common\Base;
<<<<<<< HEAD

=======
use think\Page;
>>>>>>> dev
class Zhuan extends Controller
{
	public function special()
    {
<<<<<<< HEAD
       $kk = new Base();
    	$kk -> zxc();
=======
        $kk = new Base();
    	$kk -> zxc();
        $spe = model('Special');
        $speData = $spe->sel();
        $comm = model('Commodity');
        $comData = $comm->selectCom();
        $page = new Page($speData,2);
        $this->assign('speData',$page);
        $this->assign('comData',$comData);

>>>>>>> dev
    	return $this->fetch();
    }

    public function special_detail()
    {
<<<<<<< HEAD
       $kk = new Base();
    	$kk -> zxc();
=======
        $kk = new Base();
    	$kk -> zxc();
        $spid = request()->param()['spid'];
        $comm = model('Commodity');
        $spe = model('Special');
        $commData = $comm->selzhuan($spid);
        
        //新品
        $xinpin = $comm->xinpin($spid);
        //销量
        $xiaoliang = $comm->xiaoliang($spid);
        $speData = $spe->where('id',$spid)->field('name')->select();
        $page = new Page($commData,2);
        $page1 = new Page($xinpin,2);
        $page2 = new Page($xiaoliang,2);
        $this->assign('comm',$page);
        $this->assign('xinpin',$page1);
        $this->assign('xiaoliang',$page2);
        $this->assign('spe',$speData);

>>>>>>> dev
    	return $this->fetch();
    }


}