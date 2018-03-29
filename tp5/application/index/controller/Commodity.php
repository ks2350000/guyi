<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\common\Base;
use think\Session;

<<<<<<< HEAD

use app\index\model\Commodity as CommodityModel;

=======
use app\index\model\Commodity as CommodityModel;
//商品表
>>>>>>> dev
class Commodity extends Controller
{
	public function pro_detail()
    {
<<<<<<< HEAD
      $kk = new Base();
    	$kk -> zxc();
    	return $this->fetch();
    }

    public function mai()
    {
    	$user = model('User');
    	$username = Session::get('username');
    	if (empty($username)){
    		 return 3;
    	}
    	$data_user = $user->selrbac($username);
    	if ($data_user == 3) {
            return 4;
        }
=======
        $kk = new Base();
    	$kk -> zxc();
        $res = request()->param();
        $cid = $res['cid'];
        $comm = model('Commodity');
        $data = $comm->selshangpin($cid);
        $pic = model('Pic');
        $picData = $pic->where('cid',$cid)->select()->toArray();
        //推荐 同类商品
        $classCom = $comm->selclass($data[0]['cid']);
        //推荐都喜欢
        $like = $comm->prolike();
        $this->assign('comdata',$data);
        $this->assign('picData',$picData);
        $this->assign('classCom',$classCom);
        $this->assign('like',$like);
    	return $this->fetch();
>>>>>>> dev
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