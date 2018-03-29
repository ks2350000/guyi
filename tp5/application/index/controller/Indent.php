<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\Indent as IndentModel;
use app\index\common\Base;
use page\Page;
class Indent extends Controller
{ 
	public function wddd()
    {
      $kk = new Base();
      $kk -> zxc();
      $buy = model('Buy');
      $img = model('Pic');
      $data = $buy->buy();
      $ord = model('Orderid');
      $odata = $ord->select();
      $pic = $img->group('cid')->select();
      //dump($pic);
      $this->assign('data',$data);
      $this->assign('odata',$odata);
      $this->assign('pic',$pic);
      return $this->fetch();
    } 

    public function sqsh()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    //评价商品
    public function pjsd()
    {
       $kk = new Base();
      $kk -> zxc();

      $buy = model('Buy');
     
      return $this->fetch();
    }

    public function pjsd_pj()
    {
       $kk = new Base();
      $kk -> zxc();
      //查询商品
      $comm = model('Commodity');
      $cmid = request()->param()['cmid'];
      $comData = $comm->selgoumai($cmid);
      $oid = request()->param()['oid'];
      $this->assign('comData',$comData);
      $this->assign('oid',$oid);
      return $this->fetch();
    }

    public function ypj()
    {
       $kk = new Base();
      $kk -> zxc();
      //查询商品
     
      return $this->fetch();
    }

    public function lljl()
    {
       $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function pages()
    {
        $buy = model('Buy');
        $count = $buy->where('evaluat',0)
                    ->where('uid',session('uid'))
                    ->group('order_id')->count();

        $page = new Page(2, $count); 
        $limit = $page->limit();
        $data = $buy->alias('b')
                    ->where('b.uid',session('uid'))
                    ->where('b.evaluat',0)
                    ->join('sc_commodity c','c.id=b.coid')
                    ->join('sc_pic i','i.cid=c.id')
                    ->field('c.id as cmid, c.name as cname, c.money, c.evanum, i.pic_name, b.order_id')
                    ->group('b.order_id')
                    ->limit($limit)->select()->toArray();
       
        $users[] = $data;
        
        $url = $page->allPage();
        $arr = ['user'=>$users, 'url'=>$url];
        echo json_encode($arr);
    }

    public function page()
    {
        $buy = model('Buy');
        $count = $buy->where('evaluat',0)
                    ->where('uid',session('uid'))
                    ->group('order_id')->count();

        $page = new Page(2, $count); 
        $limit = $page->limit();
        $data = $buy->alias('b')
                    ->where('b.uid',session('uid'))
                    ->where('b.evaluat',1)
                    ->join('sc_commodity c','c.id=b.coid')
                    ->join('sc_pic i','i.cid=c.id')
                    ->field('c.id as cmid, c.name as cname, c.money, c.evanum, i.pic_name, b.order_id')
                    ->group('i.cid')
                    ->limit($limit)->select()->toArray();
       
        $users[] = $data;
        
        $url = $page->allPage();
        $arr = ['user'=>$users, 'url'=>$url];
        echo json_encode($arr);
    }
}