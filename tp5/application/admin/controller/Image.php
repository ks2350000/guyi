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
		$uid = session('uid');
		$cate = model('Commodity');
		$pic = model('Pic');
		$data = $cate->where('uid',$uid)->select()->toArray();
		$count = $cate->where('uid',$uid)->count();
		$dataa = $pic->select()->toArray();

		$this->assign('aaa',$data);
		$this->assign('bbb',$dataa);
		$this->assign('count',$count);



		return $this->fetch('advertising');
	}

	public function sortAds()
	{
		return $this->fetch('Sort_ads');
	}


	public function uppic()
	{
		
		$file = request()->file('files'); 
		$wzmcz = input('post.zxcvb');
		
		
		if (empty($file)) { 
	      $this->error('请选择上传文件'); 
	    }
	    //移动到框架应用根目录/public/uploads/ 目录下 
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'); 
	    if ($info) {
	      $logo = '/uploads/'.$info->getSaveName();
	    }
		$arr = [$logo,$wzmcz];
	    $kk =  model('Image');
		$bbb = $kk->upxt($arr);
		
		$this->redirect('advertising');
	     
	}
}