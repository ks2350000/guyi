<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;

class Commodity extends Model
{
	//查询 搜索
	public function sel($name = null,$time = null) 
	{
		$uid = session('uid');
		if (empty($name) && empty($time)) {
			$data = '没有该商品';
		} else if (empty($name)) {
			$data = $this->whereOr('createtime','like','%'.$time.'%')
						->where('del', 0)
						->where('close',0)
						->where('uid',$uid)
						->paginate(5);
		} else if (empty($time)) {
			$data = $this->where('name','like','%'.$name.'%')
						->where('del', 0)
						->where('uid',$uid)
						->where('close',0)
						->paginate(5);
		} else { 
			$data = $this->where('name','like','%'.$name.'%')
						->whereOr('createtime','like','%'.$time.'%')
						->where('del', 0)
						->where('close',0)
						->where('uid',$uid)
						->paginate(5);
		}
		
		return $data;
	}
}