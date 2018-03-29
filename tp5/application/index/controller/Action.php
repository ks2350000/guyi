<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\common\Base;

class Action extends Base
{
	//收藏
	public function  storeUp()
	{	
		//获取商品id
		$comid = request()->param()['id'];
		if (empty(session('username'))) {
			return 3;
		}
		$collect = model('Collect');
		$data = $collect->where('uid',session('uid'))
				->where('coid',$comid)
				->select()->toArray();
		if ($data) {
			return 2;
		}
		if ($collect->in($comid)) {
			return 1;
		} 
	}
	
	//删除收藏
	public function storedel()
	{
		$cmid = request()->param()['cmid'];
		$coll = model('Collect');
		$data = $coll->where('uid',session('uid'))->where('coid',$cmid)->update(['clos'=>0]);
		if ($data) {
			$this->redirect('geren/wdsc');
		}
	}
	public function shopping()
	{	
		if (empty(session('username'))) {
			return 3;
		}
		//获取商品id
		$comid = request()->param()['id'];
		
		//return $comid;
		$shopp = model('Shopping');
		$data = $shopp->where('uid',session('uid'))
				->where('coid',$comid)
				->where('close',0)
				->select()->toArray();
		
		if ($data) {
			$num = $data[0]['num'];
			$up = $shopp->where('coid',$comid)->update(['num' => ++$num]);
			//return($up);
			if ($up) {
				return 1;
			}
		}
		$shopp->data([
			'uid'	=>	session('uid'),
			'coid'	=>	$comid,
			'num'	=>	1,
		]);
		
		if ($shopp->save()) {
			return 1;
		}
	}

	public function shoppings()
	{
		if (empty(session('username'))) {
			return 3;
		}
		//获取商品id
		$comid = input('comid');
		$number = input('number');
		$comm = model('Commodity');
		$comData =  $comm->where('id',$comid)
					->field('num')
					->select()->toArray();
		
		$shopp = model('Shopping');
		$data = $shopp->where('uid',session('uid'))
				->where('coid',$comid)
				->where('close',0)
				->select()->toArray();
		
		if ($data) {
			$num = $data[0]['num'];
			if ($num + $number > $comData[0]['num']) {
				return 4; 
			}
			$up = $shopp->where('coid',$comid)->update(['num' => $num + $number]);
			//return($up);
			if ($up) {
				return 1;
			}
		}
		$shopp->data([
			'uid'	=>	session('uid'),
			'coid'	=>	$comid,
			'num'	=>	$number,
		]);
		
		if ($shopp->save()) {
			return 1;
		}
	}

	//评价
	public function pj()
	{
		$comm = model('Commodity');
		$buy = model('Buy');
		//传过来的数据
		$res = request()->param();
		$cmid = $res['cmid'];
		$content = $res['conten'];
		$oid = $res['oid'];
		//增加评价数量
		$comData = $comm->selects($cmid);
		$evanum = $comData[0]['evanum'];
		$comm->upaa($cmid,++$evanum);
		//修改购物表字段 
		$buy->up($oid);

		//上传评价
		$eva = model('Evaluat');
		if ($eva->insert()) {
			$this->redirect('indent/pjsd');
		}
	}
}