<?php
namespace app\index\model;

use think\Model;

class Evaluat extends Model
{
	public function insert()
	{
		if (!empty(request()->file('f'))) {

			$files = request()->file('f');
			$info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
			$path =  DS . 'uploads/' . $info->getSavename(); 
			$path = str_replace('\\', '/', $path);
			$data = [
				'uid'			=>	session('uid'),
				'cmid'			=>	request()->param()['cmid'],
				'econtent'		=>	request()->param()['conten'],
				'img'			=>	$path,
			];
			return $this->save($data);
		} else {
			$data = [
				'uid'			=>	session('uid'),
				'cmid'			=>	request()->param()['cmid'],
				'econtent'		=>	request()->param()['conten'],
				
			];

			return $this->save($data);
		}
	}
}