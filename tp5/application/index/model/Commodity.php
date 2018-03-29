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
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->select()->toArray();
    }

    //商城销量
    public function  xl()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->order('evanum desc')
                ->select()->toArray();
    }
    //商城新品
    public function  xp()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->order('comid desc')
                ->select()->toArray();
    }

    //专场商品
    public function  selectCom()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, p.pic_name')
                ->limit(6)
                ->select()->toArray();
    }

    //进入专场商品
    public function selzhuan($spid)
    {
        return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.speid',$spid)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, p.pic_name')
                ->select()->toArray();
    }

    //专场新品
    public function xinpin($spid)
    {
         return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.speid',$spid)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->order('comid desc')
                ->select()->toArray();
    }
    //专场销量
    public function xiaoliang($spid)
    {
        return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.speid',$spid)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->order('evanum desc')
                ->select()->toArray();
    }
    //首页底部商品 商品查询
    public function  selectIndex()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->order('comid desc')
                ->limit(6)
                ->select()->toArray();
    }

    //筛选
    public function shaixuan($coid=0,$jiage=0)
    {
        if ($jiage == 0) {
            return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.cid',$coid)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->select()->toArray();
        } else if ($coid == 0) {
            return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.money','<=',$jiage)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->select()->toArray();
        } else {
            return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.cid',$coid)
                ->where('c.money','<=',$jiage)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name')
                ->select()->toArray();
        }
       
    }

    //搜索
    public function search($key)
    {
        return $this->alias('c')
                ->where('c.del',0)
                ->where('c.shenhe',0)
                ->where('c.state',1)
                ->where('c.keyword','like','%' . $key .'%')
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
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name, c.evanum')
                ->select()->toArray();
    }

    public function selects($cid)
    {
        return $this->where('id',$cid)
                    ->field('evanum')
                    ->select()->toArray();
    }

    public function upaa($cid,$e)
    {
        return $this->where('id',$cid)
                    ->update(['evanum'=>$e]);
    }

    //查询商品详情 同类商品
    public function  selclass($cid)
    {
       return $this->alias('c')
                ->where('c.cid',$cid)
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, pic_name, c.evanum')
                ->select()->toArray();
    }

    //推荐大家都喜欢
    public function  prolike()
    {
       return $this->alias('c')
                ->where('del',0)
                ->where('shenhe',0)
                ->where('state',1)
                ->join('sc_pic p','p.cid=c.id')
                ->group('p.cid')
                ->field('c.id as comid, c.cid as cid, c.name as cname, c.money as money, c.dmoney as dmoney, c.speid, c.evanum, p.pic_name')
                ->order('evanum desc')
                ->select()->toArray();
    }

}