<?php
namespace app\index\common;

use think\Validate;
class User extends Validate
{
	protected $rule = [
		'username' => 'require|max:25',
		'phone' => 'require|max:11',
	];
}