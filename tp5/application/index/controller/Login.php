<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\validate\User;
use app\index\validate\Dl;
use lib\Ucpaas;
use think\Validate;
class Login extends Base
{
    public function index()
    {
    	
        return $this->fetch('sign');
    }

    public function dl()
    {
        $user = model('User');
        $username = input('post.username');
        $password = input('post.password');

        $validate = new Validate([
            'username' => 'require',
            'password' => 'require'
        ]);
        $data = [
            'username' => $username,
            'password' => $password
        ];
        if (!$validate->check($data)) {
            return $validate->getError();
        }
        if (is_numeric($username)) {
            $data_name = $user->where('phone',$username)->find();
            if (empty($data_name->id)) {
                return 2;
            }
            session('username',$data_name->name, 'think');
        } else {
            $data_name = $user->where('name',$username)->find();
            if (empty($data_name->id)) {
                return 2;
            }
            session('username',$username, 'think');
        }
        if (($data_name->password != md5($password))) {
            return 3;
        }
        if (input('post.check') == 1) {
            cookie('username', $username, 3600*3);
        }
        
        return session('username');
        
    }
    public function login()
    {
        $username = input('post.username');
        $phone = input('post.phone');
        $captcha = input('post.code');
        $phonenum = input('post.phonenum');
        $password = input('post.password');

    	$data = [
			'username'=>$username,
			'phone'=>$phone,
            'captcha'=>$captcha,
            'phonenum'=>$phonenum,
			'password'=>$password,
			'password1'=>input('post.password1'),
		];
		$validate = validate('User');
		if(!$validate->check($data)){
			return $validate->getError();
		}

        $user = model('User'); 
        $data_user = $user->sel($username);
        if (!empty($data_user)){
            return '2';
        }
        
        if (input('post.phonenum') != cookie('telyzm') ) {
            return '1';
        }

        $user->data([
            'name'  =>  $username,
            'password'  =>  md5($password),
            'phone'  =>  $phone,
            'updated_time'  =>  time(),
            'created_time'  =>  time(),
        ]);
        $user->save();
    }
    public function reg()
    {	 

    	return $this->fetch('register');
    }

    public function dx()
    {
    	// dump(123);    
        //初始化必填
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='6e99d284e21e3a041e56cc187d4aa532';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='f51776ecb63f96d7031f325256c8499a';

        //初始化 $options必填
        $appid = "1a948d2524c54fbcac93583f10143d2f";
        $ucpass = new Ucpaas($options); 

        $a = rand(1000,9999);
        //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "276143";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $param = $a; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
        //return $mobile = $_POST['phonenum'];
        $mobile = input('phonenum');
        $uid = "";

        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

        $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
        $_SESSION['telyzm'] = $a;
        cookie('telyzm', $a, 3600);
        $_SESSION['time'] = time();
    }


}
