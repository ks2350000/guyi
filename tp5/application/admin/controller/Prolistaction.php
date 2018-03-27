<?php
namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\validate\Category;

class Prolistaction extends Base 
{
	//清空回收站
	public function dels() 
	{
		$num = count($_POST['check']);
		$re = request()->param();
		
		for ($i=0; $i<$num; $i++) {
			$che = $re['check'][$i];
			$comm = model('commodity');
			$res = $comm->where('id',$che)->update(['close' => 1]);
		}
		if ($res) {
			$this->redirect('product/branddel');
		}
	}

	public function stop() 
	{
		//接收get传过来的参数
		$cidData = request()->param();
		$cid = $cidData['cid'];
		$comm = model('commodity');
		if (!empty($cid)) {
			//查看是否已停用 已停用就开启
			$data = $comm->where('id',$cid)->select()->toArray();
			if ($data[0]['state'] == 0) {
				$res = 	$comm->save([
							'state' => 1
						],['id'=>$cid]);
				if ($res) {
					$this->redirect('product/brandmanage');
				}
			} else {
				$res = 	$comm->save([
							'state' => 0
						],['id'=>$cid]);

				if ($res) {
					$this->redirect('product/brandmanage');
				}
			}
		}		
	}

	//删除 单个删除
	public function del()
	{
		//接收参数
		$cidData = request()->param();
		$cid = $cidData['cid'];

		if (!empty($cid)) {
			$comm = model('commodity');
			$res = $comm->where('id',$cid)->update(['del' => 1]);
			if ($res) {
				$this->redirect('product/branddel');
			}
		}
	}

	//添加特卖商品
	public function addspecomm()
	{
		//接收参数
		$cidData = request()->param();
		$speId = $cidData['select'];
		
		if (!empty($cidData['check'])) {
			if ($cidData['but'] == 'add') {
				$num = count($_POST['check']);

				for ($i=0; $i<$num; $i++) {
					$che = $cidData['check'][$i];
					$comm = model('commodity');
					$res = $comm->where('id',$che)->update(['speid' => $speId]);
				}
				if ($res) {
					$this->redirect('product/specials');
				}
			}
		} else {
			$this->error('请选择商品');
		}
	}

	//删除特卖商品
	public function delspe()
	{
		//接收参数
		$cidData = request()->param();
		$cid = $cidData['cid'];
		$sid = $cidData['sid'];

		if (!empty($cid)) {
			$comm = model('commodity');
			$res = $comm->where('id',$cid)->update(['speid' => 0]);
			if ($res) {
				$this->redirect('product/edit',['sid'=>$sid]);
			}
		}
	}

	//删除特卖类
	public function delspeclass()
	{
		$cid = input('cid');
		if (!empty($cid)) {
			$spe = model('special');
			$res = $spe->where('id',$cid)->update(['clos'=>1]);
			if ($res) {
				$this->redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	//批量删除特卖类
	public function delsspeclass()
	{
		$input = input();
		if (empty($input['check'])) {
			$this->error('请选择要删除的特卖类');
		}
		$num = count($_POST['check']);
				
		for ($i=0; $i<$num; $i++) {
			$che = $input['check'][$i];
			$spe = model('special');
			$res = $spe->where('id',$che)->update(['clos'=>1]);
		}
		if ($res) {
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}