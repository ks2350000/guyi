<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Login extends Base
{
    
    public function index()
    {
    	/*$user = model('User');
    	$data = $user->sel('小花');
    	dump($data);
    	if (empty($data)) {
    		echo 'kkkk';
    	}
    	die();*/
    	
    	return $this->fetch('login');
    }

    public function check()
    {	
    	//助手函数请求数据
    	$request = request();
    	$status = 1;
    	//获取当前请求的变量
    	$data = $request->param();
    	//使用model助手函数实例化User模型
		$user = model('User');
    	$data_user = $user->sel($data['username']);
    	if (empty($data_user)) {
    		$status = 1;
    	} else if (md5($data['password']) != $data_user[0]['password']) {
    		$status = 2;
    	} else {
    		$status = 0;
    	}
    	
    	return ['status'=>$status];
    }
    
}
