<?php
namespace app\index\validate;

use think\Validate;
class User extends Validate
{
	protected $rule = [
		'username' => 'require|max:6',
		'phone'=>['require','regex'=>'^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$'],
		'captcha'=>'require|captcha',
		'phonenum'=>'require',
		'password'=>'require|alphaDash|length:6,16',
		'password1'=>'require|confirm:password'
	];

	protected $message = [
		'username.require' => '名称必须',
		'username.max' => '名称最多不能超过25个字符',
		'phone.require' => '手机号不能为空',
		'phone.regex' => '手机号格式不正确',
		'captcha.require'=>'请输入验证码',
		'captcha.captcha'=>'验证码错误',
		'password.require'=>'请输入密码',
		'phonenum.require'=>'请输手机验证码',
		'password.alphaDash' => '密码格式不正确,请填写数字，字母，下划线',
		'password.length'=>'密码长度在6~16位之间',
		'password1.require' => '请再次输入密码',
		'password1.confirm' => '两次密码不一致'
	];
	
}