<?php
namespace app\admin\model;

use think\Model;

class Category extends Model
{
	public function sel()
	{
		$sel = $this->where('clos',1)->select()->toArray();
		return $sel;
	}
}