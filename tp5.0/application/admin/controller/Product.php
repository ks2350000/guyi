<?php
namespace app\admin\controller;
use app\admin\common\Base;

class Product extends Base
{
	//产品类表
	public function productlist()
	{
		
		return $this->fetch('productslist');
	}

	//添加商品
	public function pictureAdd()
	{
		return $this->fetch('picture-add');
	}

	//品牌管理
	public function brandManage()
	{
		return $this->fetch('Brand_Manage');
	}

	//添加品牌
	public function addBrand()
	{
		return $this->fetch('Add_Brand');
	}

	//分类管理
	public function categoryManage()
	{
		return $this->fetch('CategoryManage');
	}
	//添加产品类型信息
	public function productCategoryAdd()
	{
		return $this->fetch('product-category-add');
	}

	
	//商品详情
	public function brandDetailed()
	{
		return $this->fetch('Brand_detailed');
	}
}