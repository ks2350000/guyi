<?php
namespace app\index\model;
use think\Model;

class Category extends Model
{
	public function sel() 
	{
		$map['cid'] = array('neq',0);
		$ma['cid'] = array('neq',1);
		$m['cid'] = array('neq',2);
		return $this->where($map)
			->where('clos',1)
			->where($ma)
			->where($m)
			->select()->toArray();
	}
}