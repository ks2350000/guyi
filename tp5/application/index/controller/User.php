<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\common\Base;

class User extends Base
{
	//修改用户
	public function mode()
	{
		$user = model('User');
		$up = $user->up();
		dump($up);
		if ($up) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}

	//修改密码
	public function pass()
	{
		//return input();
		$pass = input('password');
		$pass1 = input('password1');
		$pass2 = input('password2');

		if (empty($pass)) {
			return 1;
		} else if (empty($pass1)) {
			return 2;
		} else if (empty($pass2)) {
			return 3;
		}
		$user = model('User');
		$data = $user->where('name',session('username'))->field('password')->select();
		if ($data[0]['password'] != md5($pass)) {
			return 4;
		}
		if ($pass1 != $pass2) {
			return 5;
		}
		if ($data[0]['password'] == md5($pass1)) {
			return 7;
		}
		$passData = $user->where('name',session('username'))->update(['password'=>md5($pass1)]);
		if ($passData) {
			return 6;
		}
	}
}