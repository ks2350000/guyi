<?php
namespace app\index\model;

use think\Model;

class Special extends Model
{
	public function sel() 
	{
		return $this->where('clos',0)
					->where('audit',0)
					->select()->toArray();
	}
}