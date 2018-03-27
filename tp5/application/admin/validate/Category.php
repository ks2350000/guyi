<?php
namespace app\admin\validate;

use think\Validate;
class Category extends Validate
{
	protected $rule = [
		'name' => 'require',
		'num'=>'require',
		'money'=>'require',
		'dmoney'=>'require',
		
	];

	protected $message = [
		'name.require' => '名称必须',
	];
	
}