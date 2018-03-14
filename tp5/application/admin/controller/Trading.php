<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Trading extends Base
{
	public function transaction()
	{
		return $this->fetch('transaction');
	}
	
	public function orderform()
	{
		return $this->fetch('Orderform');
	}

	public function orderDetailed()
	{
		return $this->fetch('order_detailed');
	}


}