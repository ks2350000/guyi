<?php
namespace app\index\model;

use think\Model;

class Buyfailed extends Model
{
	public function buy($cid,$num)
	{
		$data = [
		'com_id'	=> 	$cid,
		'uid'		=>	session('uid'),
		'com_num'	=>	$num,
		];
		return $this->save($data);
	}
	
}