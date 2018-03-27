<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Add extends Controller
{
	//收货地址
	public function addSite()
	{

		$data = [
			'sit_name'=>input('uname'),
			'sit_phone'=>input('uphonenum'),
		];

		$validate = validate('Site');
		if(!$validate->check($data)){
			return $validate->getError();
		}

		if (empty(input('shengfen')) || empty(input('shi')) || empty(input('xianqu'))){
			return 3;
		}
		if (empty(input('xiangxi'))) {
			return 4;
		}
		$site = model('Site');
		$siteData = [
			'uid' 		=>	session('uid'),
			'site_name'	=>	input('uname'),
			'site_phone'=>	input('uphonenum'),
			'usite'		=>	input('shengfen') .','. input('shi') .','. input('xianqu') .','. input('xiangxi'),
			'zip'		=>	input('zip')
		];
		$in = $site->save($siteData);
		if ($in) {
			return 6;
		}
	}

	public function checkOut()
	{
		
		$buy = model('Buy');
		$data = [
			'uid'	=>	session('uid'),
			'coid'	=>	input('comid'),
			'com_num'	=>	input('comnum'),
			'site_id'	=>	input('siteid'),
			'com_pirce'	=>	input('total'),
		];
		if ($buy->save($data)) {
			$bid = $buy->id;
			$this->redirect('fund/fukuan',['siteid'=>input('siteid'),'bid'=>$bid,'compirce'=>input('total'),'comid'	=>	input('comid'),'com_num'	=>	input('comnum')]);
		}
	}

	//删除收货地址
	public function delSite()
	{
		$res = request()->param();
		dump($res['sid']);
		$site = model('Site');
		$up = $site->where('site_id',$res['sid'])->update(['close'=>1]);
		if ($up) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}