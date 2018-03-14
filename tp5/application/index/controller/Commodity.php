<?php
namespace app\index\controller;

use app\index\common\Base;

class Commodity extends Base
{
	public function pro_detail()
    {
       return $this->fetch();
    }

}