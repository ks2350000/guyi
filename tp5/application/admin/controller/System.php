<?php
namespace app\admin\controller;
use app\admin\common\Base;

class System extends Base
{
	public function system()
	{
		return $this->fetch('Systems');
	}
}