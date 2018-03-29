<?php
namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\validate\Category;
class Proaction extends Base
{
	//添加商品分类 分类管理
	public function addBrand()
	{
		$name = input('post.product-category-name');
		$select = input('post.select');
		$radio = input('post.radio');

		if (empty($name)) {
			return 1;
		}

		$cate = model('Category');
		$cate->data([
			'cgname' 	=>	$name,
			'cid'	=>	$select,
			'clos'	=>	$radio
		]);
		$us = $cate->save();
		if ($us) {
			return 2;
		}
		
	}



	public function delBrand()
	{
		//$name = input('post.product-category-name');
		$xx = request()->param()['id'];
		//return $xx;
		if (empty($xx)) {
			return 1;
		}

		$cate = model('Category');
		
		$us = $cate->where('cgid',$xx)->delete();
		if ($us) {
			return 2;
		}
		
	}




	//添加商品
	public function addsp()
	{
		//session('uid',2);
		$data = [
			'cid'		=>	input('post.cate'),
			'uid'		=>	session('uid'),
			'name'		=>	input('post.goodsname'),
			'money'		=>	input('post.dis_pirce'),
			'dmoney'	=>	input('post.pirce'),
			//商品简介
			'introduce'	=>	input('post.editorValue'),
			'keyword'	=>	input('post.keyword'),
			'num'		=>	input('post.cnum'),
			'number'	=>	input('post.number'),
			'year'		=>	input('post.age'),
			//作家
			'writer'	=>	input('post.ysj'),
			'sizes'		=>	input('post.weight')
			
		];

		//return $data;
		$validate = validate('Category');
		if(!$validate->check($data)){
			return $validate->getError();
		}

		$comm = model('Commodity');

		$comm->save($data);
		$cid = $comm->id;
		if ($cid) {
			
			session('cid',$cid);
			return 1;
		}
	}

	//图片上传
	public function addpic()
	{
		$files = request()->file('file');

		$info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
		$path =  DS . 'uploads/' . $info->getSavename(); 
		$path = str_replace('\\', '/', $path);

		$cid = session('cid'); 
		return $cid;
		$pic = model('Pic');
		$pic->data([
			'cid'		=>	session('cid'),
			'pic_name'	=>	$path
		]);
		$pic->save();		
		
	}


	public function grxxxg()
	{
		$name = input('post.name');
		$sex = input('post.sex');
		$phone = input('post.phone');
		$email = input('post.email');
		
		$kk =  model('User');
		$data = $kk->where('name',$name)->select()->toArray();
		$id = $data[0]['id'];
		$dat = $kk->where('id',$id)->update(['name' => $name,'sex' => $sex,'phone' => $phone,'email' => $email]);
		
        $this->redirect('Administrator/adminInfo');

	}
}