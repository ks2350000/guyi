


<?php 

use think\Controller;
use think\Session;
use think\Request;


  //应用的APPID
  $app_id = "101467328";
  //应用的APPKEY
  $app_secret = "fc3538def16e91add261b2a954f724e4";
  //成功授权后的回调地址
  $my_url = "http://guyi.hellowk.cn/index/oauthhui/qq.html";
 
  //Step1：获取Authorization Code



    $code = Request::instance()->get('code');
    
  if(empty($code) != true) 
  {
     //拼接URL   
     $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
     . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
     . "&client_secret=" . $app_secret . "&code=" . $code;
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
 	
 	
     //Step3：使用Access Token来获取用户的OpenID
     $params = array();
     parse_str($response, $params);
     //var_dump($params);
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
     echo("Hello " . $user->openid);
     $openid = $user->openid;
     if (!empty($user->openid)) {
     	header("Location:https://graph.qq.com/user/get_user_info?access_token=$token&oauth_consumer_key=$app_id&openid=$openid");
     	
     }
     die;
  }
