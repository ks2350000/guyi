<?php
namespace app\admin\validate;

use think\Validate;
class Special extends Validate
{
	protected $rule = [
		'name' => 'require',
		'number'=>'require',
		'content'=>'require'
	];

	protected $message = [
		'name.require' => '特卖名称不能为空',
		'number.require' => '编号不能为空',
		'content.require' => '简介不能为空',
	];
	
}