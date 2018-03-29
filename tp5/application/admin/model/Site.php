<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;

class Site extends Model
{
	public function sel()
	{
		return $this->select()->toArray();
	}
}