<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
    	$this->construct();

        return $this->fetch('index');
    }

    public function home()
    {
    	$this->construct();
        
    	return $this->fetch('home');
    }

}
