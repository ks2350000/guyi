<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\common\Base;

class Action extends Base
{
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
	
}