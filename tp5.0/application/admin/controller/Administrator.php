<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Administrator extends Base
{
	//管理权限
	public function adminCompetence()
	{
		return $this->fetch('admin_Competence');
	}

	//个人信息管理
	public function adminInfo()
	{
		return $this->fetch('admin_info');
	}

	//管理员
	public function administrator()
	{
		return $this->fetch('administrator');
	}

	//添加权限
	public function competence()
	{
		return $this->fetch('Competence');
	}
}