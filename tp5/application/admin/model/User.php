<?php
namespace app\admin\model;

use think\Model;

class User extends Model 
{
	public function sel($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		
		return $arr;
	}

	public function rbac($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		$id = $arr[0]['id'];
		$arr1 = db('role_access')->where('role_id',$id)->select();
		$access_id = $arr1['0']['access_id'];
		return $access_id;
	}
} 