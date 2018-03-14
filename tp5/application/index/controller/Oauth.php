<?php

namespace app\index\controller;

use think\Db;
use app\index\common\Base;

use think\Session;

class Oauth extends Base
{
    public function qq()
    {
    	$state = md5(uniqid(rand(), TRUE));
    	Session::set('state',$state);
        header("Location:https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101467328&redirect_uri=http://guyi.hellowk.cn/index/oauthhui/qq.html&scope='$state'");
    }
}