<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Product extends Base
{
	//添加商品
	public function pictureAdd() 
	{
		
		$cate = model('Category');
		$data = $cate->where('clos',1)->select()->toArray();

		$dat = $this->getSubs($data,0);
		$this->assign('data',$dat);
		return $this->fetch('picture-add');
	}

	//商品管理
	public function brandManage()
	{
		$comm = model('Commodity');
<<<<<<< HEAD
		$uid = session('uid');

		if (input('sel') == 'sels') {
			
			$data = $comm->sel(input('cname'),input('ctime'));
			$this->assign('comData',$data);
			
		} else {
			$comData = $comm->where('del', 0)->where('close',0)->where('uid',$uid)->paginate(5);
			$this->assign('comData',$comData);
		}
		//dump($comData);
		//die;

=======
		if (input('sel') == 'sels') {
			
			$data = $comm->sel(input('cname'),input('ctime'));
			$this->assign('comData',$data);
			
		} else {
			$comData = $comm->where('del', 0)->where('close',0)->paginate(2);
			$this->assign('comData',$comData);
		}

>>>>>>> dev
		$count = $comm->where('del', 0)->where('close',0)->select()->count();
		$this->assign('count',$count);
		
		return $this->fetch('Brand_Manage');
	}

	//分类管理
	public function categoryManage()
	{
		$cate = model('Category');
		$data = $cate->sel();
		$this->assign('data',$data);
		return $this->fetch('CategoryManage');
	}
	//添加产品类型信息
	public function productCategoryAdd()
	{	
		$cate = model('Category');
		$data = $cate->where('clos',1)->select()->toArray();
		$dat = $this->getSubs($data,0);
		$this->assign('data',$dat);

		return $this->fetch('product-category-add');
	}

	
	//商品详情
	public function brandDetailed()
	{
		return $this->fetch('Brand_detailed');
	}

	//商品回收站
	public function branddel()
	{
		$comm = model('commodity');
<<<<<<< HEAD
		$comData = $comm->where('del', 1)->where('close',0)->paginate(5);
=======
		$comData = $comm->where('del', 1)->where('close',0)->paginate(1);
>>>>>>> dev
		$count = $comm->where('del', 1)->where('close',0)->select()->count();
		$this->assign('count',$count);
		$this->assign('comData',$comData);
		return $this->fetch('branddel');
	}	

	//添加特卖
	public function addbrand()
	{

		return $this->fetch('Add_Brand');
	}

	//特卖  特卖管理
	public function addspecial()
	{
		$special = model('Special');
<<<<<<< HEAD
		$data = $special->where('uid',session('uid'))->where('clos',0)->select()->toArray();
=======
		$data = $special->where('uid',session('ucid'))->where('clos',0)->select()->toArray();
>>>>>>> dev
		$this->assign('data',$data);

		return $this->fetch('add_special');
	}

	//添加特卖商品
	public function specials()
	{
		//特卖表 商品表
		$special = model('Special');
		$comm = model('commodity');
<<<<<<< HEAD
		$data = $special->where('uid',session('uid'))->select()->toArray();
		$commData = $comm->where('uid',session('uid'))->where('speid',0)->where('close',0)->select()->toArray();
=======
		$data = $special->where('uid',session('ucid'))->select()->toArray();
		$commData = $comm->where('uid',session('ucid'))->where('speid',0)->where('close',0)->select()->toArray();
>>>>>>> dev
		$this->assign('data',$data);
		$this->assign('commData',$commData);
		return $this->fetch('specials');
	}

	//编辑特卖
	public function edit()
	{
		$request = request()->param();
		if (!empty($request['sid'])) {
			$spe = model('special');
			$speData = $spe->where('id',$request['sid'])->select()->toArray();
			$speId = $speData[0]['id'];
			$comm = model('commodity');
			$data = $comm->where('del',0)
						->where('speid',$speId)
						->where('state',1)
						->select()->toArray();
		}

		$this->assign('speData',$speData);
		$this->assign('data',$data);
		
		return $this->fetch('edit_special');
	}
}