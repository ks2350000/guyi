<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;
use page\Page;
use app\index\model\Geren as GerenModel;

class Geren extends Controller
{
	public function grxx()
    {
       $kk = new Base();
      $kk -> zxc();
      $user = model('User');
      $userData = $user->where('name',session('username'))->select();
      
      $this->assign('data',$userData);
      return $this->fetch();
    }

    public function shdz()
    {
      $kk = new Base();
      $kk -> zxc();
      $site = model('Site');
      $data = $site->where('uid',session('uid'))
                    ->where('close',0)
                    ->select()->toArray();
      $this->assign('siteData',$data);
      return $this->fetch();
    }

    public function wdgz()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }
    
    //收藏
    public function wdsc()
    {
       $kk = new Base();
      $kk -> zxc();
     
      return $this->fetch();
    }

    public function xgmm()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function pages()
    {
        $collect = model('Collect');
        $count = $collect->alias('c')
                    ->where('clos',1)
                    ->where('uid',session('uid'))
                    ->count();

        $page = new Page(2, $count); 
        $limit = $page->limit();
        $data = $collect->alias('c')
                    ->where('c.clos',1)
                    ->where('c.uid',session('uid'))
                    ->join('sc_commodity m','m.id=c.coid')
                    ->join('sc_pic p','p.cid=m.id')
                    ->field('m.id as mid,m.name as mname,m.money as money, m.dmoney as dmoney, p.pic_name as pname')
                    ->group('p.cid')
                    ->limit($limit)->select()->toArray();
       
        $users[] = $data;
        
        $url = $page->allPage();
        $arr = ['user'=>$users, 'url'=>$url];
        echo json_encode($arr);
    }

}