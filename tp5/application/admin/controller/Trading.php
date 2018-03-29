<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Trading extends Base
{
	public function transaction()
	{
		$order = model('Orderid');
		$comm = model('Commodity');
		$count = $order->cot();
		$money = $comm->countMoney();
		$this->assign('count',$count);
		$this->assign('money',$money);
		return $this->fetch('transaction');
	}
	
	//订单列表
	public function orderform()
	{
		$comm = model('Commodity');
		$order = model('Orderid');
		$cate = model('Category');
		$kuai = model('Kuaidi');
		if (!empty(input('order'))) {
			$oid = input('order');
			$data =	$comm->dd();
			$orderData = $order->search($oid);
			$cateData = $cate->sel();
			$kData = $kuai->sel();

			$this->assign('data',$data);
			$this->assign('ord',$orderData);
			$this->assign('cate',$cateData);
			$this->assign('kuai',$kData);
		} else {
			$data =	$comm->dd();
			$orderData = $order->sel();
			$cateData = $cate->sel();
			$kData = $kuai->sel();
			$this->assign('data',$data);
			$this->assign('ord',$orderData);
			$this->assign('cate',$cateData);
			$this->assign('kuai',$kData);
		}
		

		return $this->fetch('Orderform');
	}

	public function orderDetailed()
	{
		$oid = request()->param()['oid'];
		$comm =	model('Commodity');
		$order = model('Orderid');
		$pic = model('Pic');
		$site = model('Site');

		$picData = $pic->sel();
		$commData = $comm->ddgl($oid);
		$orderData = $order->where('oid',$oid)->select()->toArray();
		$siteData = $site->sel();

		$this->assign('order',$orderData);
		$this->assign('pic',$picData);
		$this->assign('comm',$commData);
		$this->assign('site',$siteData);
		
		return $this->fetch('order_detailed');
	}

	public function addord()
	{
		
		$ddan = request()->param()['oid'];

		$data = [
			'ship'		=>	1,	
		];
		$order = model('Orderid');
		$res = $order->where('oid',$ddan)->update($data);
		if ($res) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}