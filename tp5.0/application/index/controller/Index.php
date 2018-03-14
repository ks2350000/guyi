<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\User as UserModel;

class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }
}
