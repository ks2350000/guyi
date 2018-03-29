<?php
namespace app\admin\model;
use think\Model;

class Buy extends Model
{
	public function buy()
	{
		return $this->alias('b')
					->where('b.uid',session('ucid'))
					->join('sc_commodity c','c.id=b.coid')
					->join('sc_pic i','i.cid=c.id')
					->join('sc_site s','s.site_id=b.site_id')
					->field('b.order_id as order_id, b.com_num, b.sh as bsh, b.createtime as createtime, b.com_pirce as compirce, c.name as cname, c.money as cmoney, s.site_name as sname, i.pic_name, i.cid')
					->group('i.cid')
					->select();

	}

	public function buyd($oid)
	{
		return $this->alias('b')
					->where('b.uid',session('ucid'))
					->where('order_id',$oid)
					->join('sc_commodity c','c.id=b.coid')
					->join('sc_site s','s.site_id=b.site_id')
					->field('b.order_id as order_id, b.com_num, b.sh as bsh, b.createtime as createtime, b.com_pirce as compirce, c.name as cname, c.money as cmoney, s.site_name as sname')
					->select();

	}

	public function money()
	{
		
	}
}