<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;

use app\index\model\Fund as FundModel;

class Fund extends Controller
{
	public function zhye()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function zxcz()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    public function zxtx()
    {
      $kk = new Base();
      $kk -> zxc();
      return $this->fetch();
    }

    //立即购买
    public function jiesuan()
    {
      $kk = new Base();
      $kk -> zxc();
      /*dump(input());
      die();*/
      $kk->renzheng();
      $number = input('number');
      $cid = input('comid');
      $bf = model('Buyfailed');
      $bf->buy($cid,$number);
      //收货地址
      $site = model('Site');
      $siteData = $site->sel(session('uid'));
      //商品
      $comm = model('Commodity');
      $comData = $comm->selgoumai($cid);
      $total = $comData[0]['money'] * $number;

      $this->assign('total',$total);
      $this->assign('comData',$comData);
      $this->assign('num',$number);
      $this->assign('cid',$cid);
      $this->assign('siteData',$siteData);

      return $this->fetch();
    }

    //付款
    public function fukuan()
    {
      $kk = new Base();
      $kk -> zxc();
      //获取url传来的参数
      $res = request()->param();
      $comid = $res['comid'];
      $compirce = $res['compirce'];
      $site_id = $res['siteid'];
      $bid = $res['bid'];
      $comnum = $res['com_num'];
      //收货地址
      $site = model('Site');
      $siteData = $site->where('site_id',$site_id)->select()->toArray();
      //商品详情
      $comm = model('Commodity');
      $commData = $comm->where('id',$comid)->field('name')->select()->toArray();

      $this->assign('siteData',$siteData);
      $this->assign('compirce',$compirce);
      $this->assign('commData',$commData);
      $this->assign('bid',$bid);
      $this->assign('num',$comnum);

      return $this->fetch();
    }
}