<?php
namespace app\index\validate;

use think\Validate;
class Dl extends Validate
{
	protected $rule = [
		'username' => 'require',
		'password'=>'require',
		
	];

	protected $message = [
		'username.require' => '名称必须',
		'password.require' => '密码必须',
		
		
	
}