<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\common\Base;

class Del extends Base
{
	public function shoppdel()
	{
		$sid = request()->param()['sid'];
		$shopp = model('Shopping');
		$res = $shopp->where('id',$sid)->update(['close'=>1]);
		if ($res) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}