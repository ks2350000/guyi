<?php
namespace app\index\model;

use think\Model;

class Site extends Model
{
	public function sel($uid)
	{
		return $this->where('uid',$uid)->select()->toArray();
	}
}