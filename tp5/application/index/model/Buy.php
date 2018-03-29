<?php
namespace app\index\model;

use think\Model;

class Buy extends Model
{
	public function buy()
	{
		return $this->alias('b')
					->where('b.uid',session('uid'))
					->join('sc_commodity c','c.id=b.coid')
					->join('sc_site s','s.site_id=b.site_id')
					->field('b.order_id as order_id, b.com_num, b.sh as bsh, b.createtime as createtime, b.com_pirce as compirce, c.name as cname, c.money as cmoney, s.site_name as sname,b.coid')
					->select();

	}

	public function pj()
	{
		return $this->alias('b')
					->where('b.uid',session('uid'))
					->where('b.evaluat',0)
					->join('sc_commodity c','c.id=b.coid')
					->join('sc_pic i','i.cid=c.id')
					->field('c.id as cmid, c.name as cname, c.money, c.evanum, i.pic_name')
					->group('b.order_id')
					->select();
	}

	public function up($oid)
	{
		return $this->where('order_id',$oid)
					->update(['evaluat'=>1]);
	}
	
}