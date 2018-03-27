<?php
namespace app\index\model;

use think\Model;

class Collect extends Model
{
	public function in($comid)
	{
		$data = [
			'uid'	=>	session('uid'),
			'coid'	=>	$comid,
		];

		return $this->save($data);
	}
	
}