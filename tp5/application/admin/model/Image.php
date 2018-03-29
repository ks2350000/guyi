<?php
namespace app\admin\model;
use think\Db;

use think\Model;

class Image extends Model
{
	public function upxt($arr)
	{
		$pic_name = $arr['0'];
		$pi_id = $arr['1'];


		$zxc =  Db::table('sc_pic')
				->where("pi_id = '$pi_id'")
				->update(['pic_name' => $pic_name]);
		return $zxc;
	}

	public function sel() 
	{
		$arr = Db::table('sc_banner')
				//->join('sc_role_access w','a.id = w.role_id')
				//->where('w.access_id != 1')
				//->field('name')
				->select();
		
		return $arr;
	}


	public function del($xx)
	{
		if (is_array($xx)) {
			foreach ($xx as $value) {
				$arr = Db::table('sc_banner')
				->where("id = '$value'")
				->update(['ban_status' => '0']);
			}
		} else {
			$arr = Db::table('sc_banner')
				->where("id = '$xx'")
				->update(['ban_status' => '0']);
		}
		
		
		return $arr;
	}


	public function rec($xx)
	{
		$arr = Db::table('sc_banner')
				->where("id = '$xx'")
				->update(['ban_status' => '1']);
		
		return $arr;
	}


	public function seljs() 
	{
		$arr = Db::table('sc_banner')
				->count('id');
		
		return $arr;
	}

	public function shan($xx)
	{
		$arr = Db::table('sc_banner')
				->where("id = '$xx'")
				->delete();
		
		return $arr;
	}
}