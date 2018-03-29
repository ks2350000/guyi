<?php
namespace app\index\model;

use think\Model;

class Shopping extends Model
{
	public function sel()
	{
		return $this->where('uid',session('uid'))
					->where('close',0)
					->count();
	}

	public function selShopp()
	{
		return $this->alias('s')
					->where('s.uid',session('uid'))
					->where('s.close',0)
					->join('sc_commodity c','c.id=s.coid')
					->join('sc_pic p','p.cid=c.id')
					->field('s.id as sid, s.num as snum, c.name as cname, c.money as cmoney, c.id as cid, c.num as cnum, p.pic_name, p.cid')
					->group('p.cid')
					->select()->toArray();
	}
}