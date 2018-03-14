<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Image extends Base
{
	public function adsList()
	{
		return $this->fetch('Ads_list');
	}

	public function advertising()
	{
		return $this->fetch('advertising');
	}

	public function sortAds()
	{
		return $this->fetch('Sort_ads');
	}
}