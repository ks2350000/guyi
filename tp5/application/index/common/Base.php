<?php
namespace app\index\common;

use think\Controller;
use think\Session;
use think\Db;

class Base extends Controller
{
	public function zxc()
	{
		//dump(Session::get());
    	$this->assign([              
           'username' =>Session::get('username'),     
           'openid'=>Session::get('openid')
        ]);

<<<<<<< HEAD
=======

>>>>>>> dev
    	if (!empty(Session::get('username'))) {
    		$this->rbac();
    	}
	}

	public function rbac()
	{
		$openid = Session::get('openid');
		$idstr = Session::get('idstr');
		$name = Session::get('username');
<<<<<<< HEAD
		dump(Session::get());
=======
		//dump(Session::get());
>>>>>>> dev

		
		$result = Db::name('user')
			 ->where('qqopenid',$openid)
			 ->whereOr('wbopenid',$idstr)
			 ->whereOr('name',$name)
			 ->select();

		if (empty($result)) {
			$dizhi = explode('/',$_SERVER['REQUEST_URI']);
			$dizhi = array_pop($dizhi);
			$dizhi = explode('.',$dizhi);
			$dizhi = $dizhi[0];
			dump($openid);
			if (($dizhi != 'bangding') and ($dizhi != 'reg')) {
				$this->redirect('Login/bangding');
			}
		}
<<<<<<< HEAD

		$id = $result[0]['id'];
		$password = $result[0]['password'];
		$res = Db::name('role_access')
			 ->where('role_id',$id)
			 ->select();
		$acce_id = $res[0]['access_id'];
		session('acce_id',$acce_id);
		session('password',$password);

=======
	}

	public function renzheng()
	{
		if (empty(session('username'))) {
			$this->redirect('login/sign');
		}else{
			$user = model('User');
			$data = $user->where('name',session('username'))->select();
			if ($data[0]['is_admin'] == 1){
				$this->redirect('login/sign');
			}
		}
>>>>>>> dev
	}
}