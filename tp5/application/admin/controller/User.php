<?php
namespace app\admin\controller;
use app\admin\common\Base;

class User extends Base
{
	//会员列表
	public function userList() 
	{
		return $this->fetch('user_list');
	}

	//等级管理
	public function memberGrading()
	{
		return $this->fetch('member-Grading');
	}

	//会员记录
	public function integration()
	{
		return $this->fetch('integration');
	}


	public function memberShow()
	{
		return $this->fetch('member-show');
	}


}