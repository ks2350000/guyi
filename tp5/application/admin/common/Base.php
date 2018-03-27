<?php
namespace app\admin\common;
use think\Controller;
class Base extends Controller
{
	public function construct() 
	{
		if (empty(session('username'))) {
			$this->error('请登录','login/index');
		} else {
			$user = model('User');
			$data = $user->where('name',session('username'))->select()->toArray();
			if ($data[0]['is_admin'] == 0) {
				$this->error('您不是商户','/index/index');
			}
		}
	}

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

	protected function getParents($categorys,$catId)
	{ 
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

	


}