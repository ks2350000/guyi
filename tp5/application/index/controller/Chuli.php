<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Chuli extends Controller
{
	public function chuli()
	{

		Session::delete('username');
<<<<<<< HEAD
=======
		Session::delete('uid');
		Session::delete('admin');
		Session::delete('count');
>>>>>>> dev
		Session::delete('password');
		Session::delete('openid');
		Session::delete('idstr');
		Session::delete('xlwbtx');
<<<<<<< HEAD
		Session::delete('acce_id');
=======
>>>>>>> dev
		$this->redirect('Index/index');
	}
}