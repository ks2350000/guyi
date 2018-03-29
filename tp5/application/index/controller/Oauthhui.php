<?php 
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Request;
use sina\SaeTOAuthV2;

class oauthhui extends Controller
{
    //应用的APPID
    public $app_id = "101467328";
    //应用的APPKEY
    public $app_secret = "fc3538def16e91add261b2a954f724e4";
    //成功授权后的回调地址
<<<<<<< HEAD
    public $my_url = "http://www.hellowk.cn/index/oauthhui/qq.html";
=======
    public $my_url = "http://guyi.hellowk.cn/index/oauthhui/qq.html";
>>>>>>> dev
    
    public function qq()
    {
        //Step1：获取Authorization Code
        $code = Request::instance()->get('code');

        if(empty($code) != true) 
        {
            //拼接URL
            $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            . "client_id=" . $this->app_id . "&redirect_uri=" . urlencode($this->my_url)
            . "&client_secret=" . $this->app_secret . "&code=" . $code;
            $response = file_get_contents($token_url);
            if (strpos($response, "callback") !== false)
            {
                $lpos = strpos($response, "(");
                $rpos = strrpos($response, ")");
                $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
                $msg = json_decode($response);
                if (isset($msg->error))
                {
                   echo "<h3>error:</h3>" . $msg->error;
                   echo "<h3>msg  :</h3>" . $msg->error_description;
                   exit;
                }
             }
            //使用Access Token来获取用户的OpenID
            $params = array();
            parse_str($response, $params);
            $token = $params['access_token'];
            $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=$token";
            $params['access_token'];
            $str  = file_get_contents($graph_url);
            if (strpos($str, "callback") !== false)
            {
                $lpos = strpos($str, "(");
                $rpos = strrpos($str, ")");
                $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
            }
            $user = json_decode($str);
            if (isset($user->error))
            {
                echo "<h3>error:</h3>" . $user->error;
                echo "<h3>msg  :</h3>" . $user->error_description;
                exit;
            }
            //获取到openID用来获取用户信息
            $openid = $user->openid;
            Session::delete('openid');
            session('openid', $openid);

            $openid_url = "https://graph.qq.com/user/get_user_info?access_token=". $token . '&oauth_consumer_key=' . $this->app_id . '&openid='. $openid;
            //第三方返回数据都是json格式，要进行转换
            $zxcv = file_get_contents($openid_url);
            $qwe = json_decode($zxcv,true);
         
            Session::delete('username');
            Session::delete('password');
            Session::delete('xlwbtx');
            Session::delete('idstr');
            
            session('username', $qwe['nickname']);
            //session('gender', $qwe['gender']);//性别

            $this->redirect('Index/index');

        } else {
           $state = md5(uniqid(rand(), TRUE));
            Session::set('state',$state);

<<<<<<< HEAD
           header("Location:https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101467328&redirect_uri=http://www.hellowk.cn/index/oauthhui/qq.html&scope='$state'");
=======
           header("Location:https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101467328&redirect_uri=http://guyi.hellowk.cn/index/oauthhui/qq.html&scope='$state'");
>>>>>>> dev
        }

    }

  //对象数组转成普通数组(已经没用了)
    public function object_to_array($obj){
        $_arr = is_object($obj) ? get_object_vars($obj) :$obj;
        foreach ($_arr as $key=>$val){
            $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val):$val;
            $arr[$key] = $val;
        }
        return $arr;
   }






    public function weibo () {


<<<<<<< HEAD
        $callback_url = "http://www.hellowk.cn/index/oauthhui/weibo.html";//回调地址,必须是提交网站域名下的某一个url
        $client_id = '1062608125';
        $client_secret = 'a5f8c6a7ede6da0a79003ec0ec7d3f3d';
        $url = "http://www.hellowk.cn";//最后返回的页面
=======
        $callback_url = "http://guyi.hellowk.cn/index/oauthhui/weibo.html";//回调地址,必须是提交网站域名下的某一个url
        $client_id = '2970462500';
        $client_secret = '5bb606796660ce0bf48292397ed46600';
        $url = "http://guyi.hellowk.cn";//最后返回的页面
>>>>>>> dev
        $obj = new SaeTOAuthV2($client_id, $client_secret);//$client_id就是App Key  $client_secret就是App 
        
         $code = Request::instance()->get('code');

        if(empty($code) != true) 
        {
            $keys["code"] = $code;
            $keys["redirect_uri"] = $callback_url;
            $a = $obj->getAccessToken($type="code",$keys); //$a是一个数组,里面有uid（用户的编号）和access_token.

            $info = file_get_contents("https://api.weibo.com/2/users/show.json?access_token={$a['access_token']}&uid={$a['uid']}");

            $ccc[] = json_decode($info,true);

            session('username', null);
            Session::delete('password');
            Session::delete('openid');

            session('username', $ccc[0]['screen_name']);//新浪用户名
            session('xlwbtx', $ccc[0]['profile_image_url']);//新浪头像
            session('idstr', $ccc[0]['status']['idstr']);//唯一标示
           
            header("Location:".$url);

        } else {
           $weibo_login_url = $obj->getAuthorizeURL($callback_url);
           header("Location:".$weibo_login_url);
        }
    }

}


$zxc = new oauthhui();

 
