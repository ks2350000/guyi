<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;

class Commodity extends Model
{
	//查询 搜索
	public function sel($name = null,$time = null) 
	{
<<<<<<< HEAD
		$uid = session('uid');
=======
>>>>>>> dev
		if (empty($name) && empty($time)) {
			$data = '没有该商品';
		} else if (empty($name)) {
			$data = $this->whereOr('createtime','like','%'.$time.'%')
						->where('del', 0)
						->where('close',0)
<<<<<<< HEAD
						->where('uid',$uid)
=======
>>>>>>> dev
						->paginate(5);
		} else if (empty($time)) {
			$data = $this->where('name','like','%'.$name.'%')
						->where('del', 0)
<<<<<<< HEAD
						->where('uid',$uid)
=======
>>>>>>> dev
						->where('close',0)
						->paginate(5);
		} else { 
			$data = $this->where('name','like','%'.$name.'%')
						->whereOr('createtime','like','%'.$time.'%')
						->where('del', 0)
						->where('close',0)
<<<<<<< HEAD
						->where('uid',$uid)
=======
>>>>>>> dev
						->paginate(5);
		}
		
		return $data;
	}
<<<<<<< HEAD
=======

	public function dd()
	{
		return $this->alias('c')
					->where('c.uid',session('ucid'))
					->join('sc_buy b','b.coid=c.id')
					->field('c.id as cid, c.name as cname, c.money, c.cid, b.order_id, b.com_pirce, b.createtime, b.com_num,b.fh')
					->select()->toArray();
	}

	public function ddgl($oid)
	{
		return $this->alias('c')
					->where('c.uid',session('ucid'))
					->where('order_id',$oid)
					->join('sc_buy b','b.coid=c.id')
					->field('c.name as cname, c.money, c.id as cid, b.order_id, b.com_pirce, b.createtime, b.com_num')
					->select()->toArray();
	}

	public function countMoney()
	{
		
	}
>>>>>>> dev
}