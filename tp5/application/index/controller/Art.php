<?php
namespace app\index\controller;
use app\index\common\Base;

class Art extends Base
{
	public function artist()
    {
       return $this->fetch();
    }

    public function artist_detail()
    {
       return $this->fetch();
    }

    public function settled()
    {
       return $this->fetch();
    }

    public function zuihou()
    {
       return $this->fetch();
    }
    
}