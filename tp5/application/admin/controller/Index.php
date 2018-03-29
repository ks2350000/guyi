<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
    	$kk = new Base();
        $kk -> rbac();

        $this->assign([
            'name'=>session('username')
        ]);
        return $this->fetch();
    }

    public function home()
    {
    	$kk = new Base();
        $kk -> rbac();
    	return $this->fetch();
    }

}
