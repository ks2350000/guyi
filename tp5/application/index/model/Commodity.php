<?php
namespace app\index\model;
 
use think\Model;

class Commodity extends Model
{
	public function sel($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		return $arr;
	}

	public function insert($data)
	{
		$arr = db('user')->insert($data);
		return $arr;
	}

	public function selrbac($username) 
	{
		$arr = db('user')->where('name',$username)->select();
		$id = $arr['0']['id'];
		$arr1 = db('role_access')->where('role_id',$id)->select();
		$access_id = $arr1['0']['access_id'];
		return $access_id;
	}

	//商城首页商品 商品查询
    public function  selectComIndex()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->select()->toArray();
    }

    public function  selshangpin($cid)
    {
       return $this->alias('c')
       			->where('c.id',$cid)
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->select()->toArray();
    }

    public function  selgoumai($cid)
    {
       return $this->alias('c')
                ->where('c.id',$cid)
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->select()->toArray();
    }
}