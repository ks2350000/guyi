<?php
namespace app\admin\controller;
use app\admin\common\Base;

//推荐 精选
class Advert extends Base
{
	public function recom()
	{
		return $this->fetch('recom');
	}
}