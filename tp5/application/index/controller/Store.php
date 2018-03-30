<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Store as StoreModel;
use app\index\common\Base;

use think\Page;
//商城
class Store extends Controller 
{
	public function mall()
    {
        $cate = model('Category');
        $cate_data = $cate->sel();
        $kk = new Base();
    	$kk -> zxc();
        $comm = model('commodity');

        if (!empty(input('content'))) {
            $key = input('content');
            $data = $comm->search($key);
            $page = new Page($data,2);
            //销量
            $xiaoliang = $comm->xl();
            $xiao = new Page($xiaoliang,2);

            //新品
            $xinpin = $comm->xp();
            $xin = new Page($xinpin,2);
            $this->assign('data',$page);
            $this->assign('ccid',0);
             $this->assign('xiao',$xiao);
            $this->assign('xin',$xin);
        } else {
            $data = $comm->selectComIndex();
            $page = new Page($data,2); 
            //销量
            $xiaoliang = $comm->xl();
            $xiao = new Page($xiaoliang,2);

            //新品
            $xinpin = $comm->xp();
            $xin = new Page($xinpin,2);
            
            $this->assign('ccid',0);
            $this->assign('data',$page);
            $this->assign('xiao',$xiao);
            $this->assign('xin',$xin);
        }

        $this->assign('cdata',$cate_data);

    	return $this->fetch();
    }

    public function shopping()
    {

        $kk = new Base();
    	$kk -> zxc();
        if (empty(session('username'))) {

            $this->redirect('login/sign');
        }

        $shopp = model('Shopping');
        $shoppData = $shopp->selShopp();
        if (empty($shoppData)) {
            $shoppData = 0;
        } else {
            $money = 0;
            foreach ($shoppData as $val) {
                $money += $val['cmoney'] * $val['snum'];
                
            }
            $this->assign('money',$money);
        }
        $this->assign('sData',$shoppData);
    	return $this->fetch();
    }

    public function shaixuan()
    {
        //筛选
        if (!empty(request()->param()['cgid'])) {

            $cgid = request()->param()['cgid'];
            $data = $comm->shaixuan($cgid);
            $page = new Page($data,2);
            $this->assign('ccid',$cgid);
            $this->assign('data',$page);

        } else if (!empty(request()->param()['jgid'])) {

            $cgid = request()->param()['jgid'];
            $data = $comm->shaixuan(0,$cgid);
            $page = new Page($data,2);
            $this->assign('ccid',$cgid);
            $this->assign('data',$page);

        } else if (!empty(request()->param()['cgid']) && !empty(request()->param()['jgid']))
        {
            $cgid = request()->param()['cgid'];
            $jgid = request()->param()['jgid'];
            $data = $comm->shaixuan($jgid,$jgid);
            $page = new Page($data,2);
            $this->assign('ccid',$cgid);
            $this->assign('data',$page);

        } 

    }
  
}