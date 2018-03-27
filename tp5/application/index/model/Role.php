<?php
namespace app\index\model;

use think\Model;

class Role extends Model
{
	public function sel($username) 
	{
		$arr = db('user')->where('username',$username)->select();
		
		return $arr;
	}
}