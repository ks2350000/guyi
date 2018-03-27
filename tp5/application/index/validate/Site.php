<?php
namespace app\index\validate;

use think\Validate;
class Site extends Validate
{
	protected $rule = [
		'sit_name' => 'require',
		'sit_phone'=>['require','regex'=>'^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$'],
		
	];
}