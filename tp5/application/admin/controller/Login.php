<?php
namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\common\Rbac;
use think\Config;
use think\Controller;

class Login extends Controller
{
    
    public function index()
    {
    	
        $kk = new Rbac();
        //$kk -> rbac();
    	return $this->fetch('login');
    }

    public function check()
    {	
    	//助手函数请求数据
    	$request = request();
    	$status = 1;
    	//获取当前请求的变量
    	$data = $request->param();
        $username = $data['username'];

    	//使用model助手函数实例化User模型
		$user = model('User');
        $abc = 'qazxsw';
    	$data_user = $user->sel($username);
    	if (empty($data_user)) {
    		$status = 1;

    	} else if (md5($data['password']) != $data_user[0]['password']) {
    		$status = 2;
    	} else {
            $access_id = $user->rbac($username);
            if ($access_id == 3) {
               $status = 0;
               session('username',$username);
               session('uid',$data_user[0]['id']);
            } else {
                $status = 3;
            }
    	}
    	return ['status'=>$status];
    }
    
}
