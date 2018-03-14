<?php
namespace app\admin\controller;
use app\admin\common\Base;

class News extends Base
{
	//意见反馈
	public function feedback()
	{
		return $this->fetch('Feedback');
	}

	//留言
	public function guestbook()
	{
		return $this->fetch('Guestbook');

	}
}