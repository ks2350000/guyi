<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;

class Orderid extends Model
{
	public function sel()
	{
		return $this->where('close',0)->select()->toArray();
	}

	public function search($oid) 
	{
		return $this->where('close',0)
					->where('order','like','%'.$oid.'%')
					->select()->toArray();
	}

	public function cot()
	{
		return $this->field('oid')->count();
	}
}