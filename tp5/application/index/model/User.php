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

	public function selrbac($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		$id = $arr['0']['id'];
		$arr1 = db('role_access')->where('role_id',$id)->select();
		$access_id = $arr1['0']['access_id'];

		return $access_id;
	}
<<<<<<< HEAD
=======

	public function up()
	{
		if (!empty(request()->file('image'))) {

			$files = request()->file('image');
			$info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
			$path =  DS . 'uploads/' . $info->getSavename(); 
			$path = str_replace('\\', '/', $path);
			$data = [
				'name'		=>	input('username'),
				'sex'		=>	input('sex'),
				'phone'		=>	input('phone'),
				'user_qq'	=>	input('qq'),
				'email'		=>	input('email'),
				'user_img'	=>	$path,
			];

			return $this->where('id',session('uid'))->update($data);
		} else {
			$data = [
				'name'		=>	input('username'),
				'sex'		=>	input('sex'),
				'phone'		=>	input('phone'),
				'user_qq'	=>	input('qq'),
				'email'		=>	input('email'),
				
			];

			return $this->where('id',session('uid'))->update($data);
		}	
	}

	public function upsh()
	{
		if (!empty(request()->file('f'))) {

			$files = request()->file('f');
			$info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
			$path =  DS . 'uploads/' . $info->getSavename(); 
			$path = str_replace('\\', '/', $path);
			$data = [
				'zname'		=>	input('zname'),
				'phone'		=>	input('phone'),
				'email'		=>	input('email'),
				'city'		=>	input('shengfen') .','. input('shi') .','.input('xianqu'),
				'user_img'	=>	$path,
				'is_admin'	=> 	2,
			];

			return $this->where('id',session('uid'))->update($data);
		} else {
			$data = [
				'zname'		=>	input('zname'),
				'phone'		=>	input('phone'),
				'email'		=>	input('email'),
				'is_admin'	=>	2,
				'city'		=>	input('shengfen') .','. input('shi') .','.input('xianqu'),
			];

			return $this->where('id',session('uid'))->update($data);
		}	
	}
>>>>>>> dev
}