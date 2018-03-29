<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
<<<<<<< HEAD
    	$kk = new Base();
        $kk -> rbac();

        $this->assign([
            'name'=>session('username')
        ]);
        return $this->fetch();
=======
    	$this->construct();

        return $this->fetch('index');
>>>>>>> dev
    }

    public function home()
    {
<<<<<<< HEAD
    	$kk = new Base();
        $kk -> rbac();
    	return $this->fetch();
=======
    	$this->construct();
        
    	return $this->fetch('home');
>>>>>>> dev
    }

}
