<?php
namespace app\admin\common;
use think\Controller;
use think\Config;
use think\Session;
use think\Db;


class Base extends Controller
{
	protected function getSubs($categorys,$catId=0,$level=1)
	{ 

		$subs=array(); 
		foreach($categorys as $item){ 

			if($item['cid']==$catId){ 
				$item['level'] = str_repeat('-',$level);
				$subs[]=$item; 
				$subs=array_merge($subs,$this->getSubs($categorys,$item['cgid'],$level+1)); 

			} 

		} 
		return $subs; 
	} 

	protected function getParents($categorys,$catId){ 
		$tree=array(); 
			foreach($categorys as $item){ 
				if($item['cid']==$catId){ 
					if($item['id']>0) 
					$tree=array_merge($tree,$this->getParents($categorys,$item['id'])); 
					$tree[]=$item;  
					break;  
			} 
		} 
			return $tree; 
	} 

	public function rbac()
	{
		$openid = Session::get('openid');
		$idstr = Session::get('idstr');
		$name = Session::get('username');
		//dump(Session::get());
		if (empty($name)) {
			$this->redirect('/');
		}
		$result = Db::name('user')
			 ->where('qqopenid',$openid)
			 ->whereOr('wbopenid',$idstr)
			 ->whereOr('name',$name)
			 ->select();
			 $username = $result[0]['name'];
			 $password = $result[0]['password'];
			 $uid = $result[0]['id'];
		session('username',$username);
		session('uid',$uid);

			 if (empty($result)) {
			 	$access_id = 4;
			 } else {
			 	$id = $result[0]['id'];
			 	$resulta = Db::name('role_access')
					 ->where('role_id',$id)
					 ->select();

					/* dump($_SESSION);
					 die;*/
				$access_id = $resulta[0]['access_id'];
			 }
		
		if ($access_id!=3) {
			$this->redirect('/');
		}
	}
}