<?php
namespace app\admin\common;
use think\Controller;
use think\Config;
use think\Session;
use think\Db;
class Rbac extends Controller
{
	public function rbac()
	{

		$openid = Session::get('openid');
		$idstr = Session::get('idstr');
		$name = Session::get('name');
		//dump(Session::get());
		
		$result = Db::name('user')
			 ->where('qqopenid',$openid)
			 ->whereOr('wbopenid',$idstr)
			 ->whereOr('name',$name)
			 ->select();

		if (empty($result)) {
			$access_id = 4;
		} else {
			$id = $result[0]['id'];
			$resulta = Db::name('role_access')
			 ->where('role_id',$id)
			 ->select();
			$access_id = $resulta[0]['access_id'];
		}
		
		if ($access_id!=3) {
			$this->redirect('admin/login');
		}
	}
}