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

    public function gouwuche()
    {
      $kk = new Base();
      $kk -> zxc();
      //收货地址
      $site = model('Site');
      $siteData = $site->where('uid',session('uid'))->select()->toArray();

      $num = input()['num'];
      $cid = input()['cid'];
      $zj = input()['zj'];

      $comm = model('Commodity');
      $number = array_combine($cid,$num);
      foreach ($cid as $val) {
        $data[] = $comm->alias('c')
                ->where('c.id',$val)
                ->join('sc_pic p','p.cid=c.id')
                ->field('c.id as cid,c.name as cname, c.money as cmoney, p.pic_name')
                ->group('p.cid')
                ->select()->toArray();
      }
      
      foreach ($data as $value) {
        foreach ($value as $values) {
         $comData[] = $values;
          
        }
      }
      $this->assign('num',$number);
      $this->assign('zj',$zj);
      $this->assign('comData',$comData);
      $this->assign('siteData',$siteData);
      return $this->fetch('gouwuche');
    }

    public function checkOuts()
    {
      $kk = new Base();
      $kk -> zxc();
      
      $cid = input()['cid'];
      $num = input()['num'];
      $siteid = input('siteid');
      $zj = input('zj');
      $cn = array_combine($cid,$num);
      //生成订单编号
      $order = mt_rand('11111111111','99999999999');
      $or = '11510' . $order;
      $ord = model('Orderid');
      $ord->data(['order'=>$or,'money'=>$zj,'shid' =>  $siteid,]);
      $ord->save();
      $oid = $ord->oid;
      //插入购物表
      foreach ($cn as $key=>$val) {
          
          $buy = model('Buy');
          $data = [
              'uid'     =>  session('uid'),
              'coid'    =>  $key,
              'com_num' =>  $val,
              'site_id' =>  $siteid,
              'com_pirce' =>  $zj,
              'order_id'  =>  $oid,
          ];
          $cc = $buy->insert($data);
      }
      if ($cc) {
        foreach ($cid as $val) {
          $sho = model('Shopping');
          $sho->where('coid',$val)->update(['close'=>1]);
        }
      }
      //收货地址
      $site = model('Site');
      $siteData = $site->where('site_id',$siteid)->select()->toArray();
      //商品详情 
      $comm = model('Commodity');
      foreach ($cid as $value) {
        $commD[] = $comm->where('id',$value)->field('name,id')->select()->toArray();
      }

      foreach ($commD as $v) {
        foreach ($v as $a) {
            $commData[] = $a;
        }
      }
      
      $this->assign('siteData',$siteData);
      $this->assign('commData',$commData);
      $this->assign('compirce',$zj);
      $this->assign('num',$cn);
      return $this->fetch('fukuangouwuche');

    }
}