<?php
namespace app\admin\common;
use think\Controller;
class Base extends Controller
{
	/**
	 * 获取子孙树
	 * @param   array        $data   待分类的数据
	 * @param   int/string   $id     要找的子节点id
	 * @param   int          $lev    节点等级
	 */
	 public function getSubTree($data , $id = 0 , $lev = 0) {
	 	
	    static $son = array();
	    foreach($data as $key => $value) {
	        if($value['parent_id'] == $id) {
	            $value['lev'] = $lev;
	            $son[] = $value;
	            getSubTree($data , $value['id'] , $lev+1);
	        }
	    }

	    return $son;
	 }

		
}