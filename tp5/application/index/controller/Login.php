<?php
namespace app\index\controller;

use app\index\common\Base;
use app\index\validate\User;
use app\index\validate\Dl;
use lib\Ucpaas;
use think\Validate;
use think\Session;
use think\Db;



class Login extends Base
{
    public function sign()
    {
        $kk = new Base();
        $kk -> zxc();
        return $this->fetch();
    }

    //登录
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
           
        } else {
            $data_name = $user->where('name',$username)->find();
            if (empty($data_name->id)) {
                return 2;
            }
          
        }
        if (($data_name->password != md5($password))) {
            
            return 3;
        }
        if ($data_name->is_admin == 1) {
            return 5;
        }
        session('admin',$data_name->is_admin);
        session('username',$username, 'think');
        session('uid',$data_name->id);
        /*$data_user = $user->selrbac($username);
        if ($data_user == 1 or $data_user == 2) {
            return 4;
        }
          
            $abc = 'qazxsw';
            session('password',md5(md5($password).$abc), 'think');
            Session::delete('openid');*/

        if (input('post.check') == 1) {
            cookie('username', $username, 3600*3);
            cookie('password', $password, 3600*3);
        }
       
    }
    
    //注册
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
        $lastid = $user->id;
        $data = ['role_id' => $lastid];
        $zxc = Db::name('role_access')->insert($data);


    }
    public function register()
    {	 
        $kk = new Base();
        $kk -> zxc();
    	return $this->fetch();
    }

    public function bangding()
    {
        $kk = new Base();
        $kk -> zxc();
        return $this->fetch();
    }

     public function reg()
    {    
        $kk = new Base();
        $kk -> zxc();
        return $this->fetch();
    }

    public function bd()
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
            
        } else {
            $data_name = $user->where('name',$username)->find();
            if (empty($data_name->id)) {
                return 2;
            }
          
        }
        if (($data_name->password != md5($password))) {
            return 3;
        }

        $data_user = $user->selrbac($username);
        if ($data_user == 1 or $data_user == 2) {
            return 4;
        }

        $openid = Session::get('openid');
        $idstr = Session::get('idstr');
          if (!empty($openid)) {
                db('user')->where('name',$username)->setField('qqopenid',$openid);
          }elseif(!empty($idstr)) {
              db('user')->where('name',$username)->setField('wbopenid',$idstr);
          }
    }


    public function dx()
    {
    	// dump(123);    
        //初始化必填
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='ad5a82d9d04a18dda50df971b4d1688d';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='12ab76f412ac743c1068a7890e06afe2';

        //初始化 $options必填
        $appid = "bb15a6e8e233439994a9ecc4b0a92d74";
        $ucpass = new Ucpaas($options); 

        $a = rand(1000,9999);
        //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "277567";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
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
