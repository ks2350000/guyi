<?php
namespace app\index\model;

use think\Model;

class User extends Model
{
	public function sel($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		return $arr;
	}

	public function insert($data)
	{
		$arr = db('user')->insert($data);
		return $arr;
	}
}