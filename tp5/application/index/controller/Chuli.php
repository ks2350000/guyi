<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Chuli extends Controller
{
	public function chuli()
	{

		Session::delete('username');
		Session::delete('password');
		Session::delete('openid');
		Session::delete('idstr');
		Session::delete('xlwbtx');
		$this->redirect('Index/index');
	}
}