<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;
use think\Session;

use app\index\model\Commodity as CommodityModel;
//商品表
class Commodity extends Controller
{
	public function pro_detail()
    {
        $kk = new Base();
    	$kk -> zxc();
        $res = request()->param();
        $cid = $res['cid'];
        $comm = model('Commodity');
        $data = $comm->selshangpin($cid);
        $pic = model('Pic');
        $picData = $pic->where('cid',$cid)->select()->toArray();
        /*dump($picData);
        die();*/
        $this->assign('comdata',$data);
        $this->assign('picData',$picData);
    	return $this->fetch();
    }
 
    public function mai()
    {
    	$user = model('User');
    	$username = Session::get('username');
    	if (empty($username)){
    		 return 3;
    	}
    	/*$data_user = $user->selrbac($username);
    	if ($data_user == 3) {
            return 4;
        }*/
    }

}