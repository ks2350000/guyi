<?php
namespace app\admin\controller;
use app\admin\common\Base;
<<<<<<< HEAD
use think\Config;
=======
use app\admin\common\Rbac;
use think\Config;
use think\Controller;
>>>>>>> dev

class Login extends Controller
{
    
    public function index()
    {
    	
<<<<<<< HEAD
        $kk = new Base();
        $kk -> rbac();
=======
        $kk = new Rbac();
        //$kk -> rbac();
>>>>>>> dev
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
<<<<<<< HEAD
       
=======
>>>>>>> dev
    	if (empty($data_user)) {
    		$status = 1;

    	} else if (md5($data['password']) != $data_user[0]['password']) {
    		$status = 2;
    	} else {
            $access_id = $user->rbac($username);
<<<<<<< HEAD
            
            if ($access_id == 3) {
                session('username',$username);
                $status = 0;
            } else if($access_id == 1 or $access_id == 2){
                $status = 4;
            } else{
=======
            if ($access_id == 3) {
               $status = 0;
               session('name',$username);
               session('ucid',$data_user[0]['id']);
            } else {
>>>>>>> dev
                $status = 3;
            }
    	}
    	return ['status'=>$status];
    }
    
}
