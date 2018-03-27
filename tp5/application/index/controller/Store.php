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
        $data = $comm->selectComIndex();
        $page = new Page($data,2);
        if (!empty(session('uid'))) {
            $collect = model('Collect');
            $collData = $collect->where('clos',1)
                                ->where('uid',session('uid'))
                                ->field('coid')
                                ->select()->toArray();
                                
            $this->assign('collData',$collData);
        }
        $this->assign('data',$page);
        $this->assign('cdata',$cate_data);
        
    	return $this->fetch();
    }

    public function shopping()
    {
      $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }
  
}