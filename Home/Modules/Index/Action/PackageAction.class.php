<?php 
Class PackageAction extends Action{
	/**
	 * 首页控制器
	 */
	Public function index(){
		$condition = array("svId"=>5);
		$money = M("servicedetail")->where($condition)->field("price")->find();
		// dump($money);die;
		$this->assign("Price",$money["price"])->display("index");
	}
}



 ?>