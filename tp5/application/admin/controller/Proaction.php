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
<<<<<<< HEAD

=======
>>>>>>> dev
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

<<<<<<< HEAD


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




=======
>>>>>>> dev
	//添加商品
	public function addsp()
	{
		//session('uid',2);
		$data = [
			'cid'		=>	input('post.cate'),
<<<<<<< HEAD
			'uid'		=>	session('uid'),
=======
			'uid'		=>	session('ucid'),
>>>>>>> dev
			'name'		=>	input('post.goodsname'),
			'money'		=>	input('post.dis_pirce'),
			'dmoney'	=>	input('post.pirce'),
			//商品简介
<<<<<<< HEAD
			'introduce'	=>	input('post.editorValue'),
=======
			'introduce'	=>	strip_tags(input('post.editorValue')),
>>>>>>> dev
			'keyword'	=>	input('post.keyword'),
			'num'		=>	input('post.cnum'),
			'number'	=>	input('post.number'),
			'year'		=>	input('post.age'),
			//作家
			'writer'	=>	input('post.ysj'),
			'sizes'		=>	input('post.weight')
			
		];
<<<<<<< HEAD

		//return $data;
=======
>>>>>>> dev
		$validate = validate('Category');
		if(!$validate->check($data)){
			return $validate->getError();
		}
<<<<<<< HEAD

=======
		
>>>>>>> dev
		$comm = model('Commodity');

		$comm->save($data);
		$cid = $comm->id;
		if ($cid) {
<<<<<<< HEAD
			
=======
			session('cid',null);
>>>>>>> dev
			session('cid',$cid);
			return 1;
		}
	}

	//图片上传
	public function addpic()
	{
<<<<<<< HEAD
		$files = request()->file('file');

=======
		if (empty(session('cid'))) {
			$this->error('请先上传商品信息');
		}
		$files = request()->file('file');
>>>>>>> dev
		$info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
		$path =  DS . 'uploads/' . $info->getSavename(); 
		$path = str_replace('\\', '/', $path);

<<<<<<< HEAD
		$cid = session('cid'); 
		return $cid;
=======
>>>>>>> dev
		$pic = model('Pic');
		$pic->data([
			'cid'		=>	session('cid'),
			'pic_name'	=>	$path
		]);
		$pic->save();		
		
	}

<<<<<<< HEAD

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

=======
	//添加特卖
	public function addspe()
	{
		$file = request()->file('image');
		if (empty($file)) {

			$this->error('请上传封面',$_SERVER['HTTP_REFERER'],'',1);
		}

		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		$path = DS . 'uploads/' . $info->getSavename();
		$pa = str_replace('\\', '/', $path);

		$data = [
			'name'		=>	input('post.spename'),	
			'number'	=>	input('post.spenum'),
			'content'	=> 	input('post.content'),
			'pic'		=>	$pa,
			'clos'		=>	input('post.checkbox')
		];

		$validate = validate('Special');
		if(!$validate->check($data)){
			$errorName = $validate->getError();
			$this->error($errorName,$_SERVER['HTTP_REFERER'],'',1);
		}

		$special = model('Special');
		$res = $special->save($data);
		if ($res) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->error('添加失败',$_SERVER['HTTP_REFERER'],'',1);
		}
		/*dump($data);
		die();*/
>>>>>>> dev
	}
}