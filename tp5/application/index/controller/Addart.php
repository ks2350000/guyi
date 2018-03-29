<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;
use think\Validate;
class Addart extends Controller
{
	public function add()
	{
		if (empty(session('uid'))) {
			return 2;
		}
		$validate = new Validate([
		    'zname'  => 'require|max:25',
		    'phone'  => ['require','regex'=>'^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$'],
		    'email' => 'require|email'
		]);

		$data = [
		    'zname'  => input('zname'),
		    'phone'  => input('phone'),
		    'email' => input('email')
		];
		if (!$validate->check($data)) {
		    return $validate->getError();
		}
		$user = model('User');
		
		if ($user->upsh()) {
			session('username',null);
			session('uid',null);
			return 1;
		}
	}

	public function cs()
	{
		$user = model('User');
		$user->upsh();
	}
}