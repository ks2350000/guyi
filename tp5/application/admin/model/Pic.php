<?php
namespace app\admin\model;

use think\Model;

class Pic extends Model
{
<<<<<<< HEAD
	
=======
	public function sel()
	{
		return $this->group('cid')->select()->toArray();
	}
>>>>>>> dev
}