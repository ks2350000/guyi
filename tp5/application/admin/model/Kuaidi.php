<?php
namespace app\admin\model;
use think\Model;

class Kuaidi extends Model
{
	public function sel()
	{
		return $this->where('close',1)->select()->toArray();
	}
}