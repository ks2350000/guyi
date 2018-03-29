<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Administrator extends Base
{
	//管理权限
	public function adminCompetence()
	{
		return $this->fetch('admin_Competence');
	}

	//个人信息管理
	public function adminInfo()
	{
		$kk =  model('User');
		$name = session('username');
		$data = $kk->where('name',$name)->select()->toArray();

		//dump($data);
		$this->assign('data',$data);

		return $this->fetch('admin_info');
	}

	//管理员
	public function administrator()
	{
		return $this->fetch('administrator');
	}

	//添加权限
	public function competence()
	{
		return $this->fetch('Competence');
	}


	public function ddd()
	{
		//$name = session('username');
		$password = request()->param()['password'];
		$newpass = request()->param()['newpass'];
		$userid = request()->param()['userid'];
		//return $userid;
		$kk =  model('User');
		$data = $kk->where('name',$userid)->select()->toArray();
		$pass = $data[0]['password'];


		if (md5($password)!=$pass) {
			return 1;
		}
		$apassword = md5($newpass);
		$dat = $kk->where('name',$userid)->update(['password' => $apassword]);
		if ($dat) {
			return 2;
		}

		
	}
}