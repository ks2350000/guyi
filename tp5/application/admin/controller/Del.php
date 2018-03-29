<?php
namespace app\admin\controller;
use app\admin\common\Base;

//推荐 精选
class Del extends Base
{
	public function del()
	{
		$oid = request()->param()['oid'];
		$order = model('Orderid');
		$res = $order->where('oid',$oid)->update(['close'=>1]);
		if ($res) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}