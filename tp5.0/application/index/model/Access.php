<?php
namespace app\admin\model;

use think\Model;

class Access extends Model
{
	public function sel($username) 
	{
		$arr = db('user')->where('username',$username)->select();
		
		return $arr;
	}
}