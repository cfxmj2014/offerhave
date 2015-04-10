<?php
/**
  * 用户控制器
  */ 
Class UserAction extends Action{
	//显示订单信息
	Public function Application(){
		$uId = session("uId");
		$OrderInfo = D("User")->getApplicationInfo();
		$this->assign("OrderInfo",$OrderInfo)->display("application");
	}
	Public function Resume(){
		$this->display("resume");
	}
	Public function Wishlist(){
		$this->display("wishlist");
	}
	Public function Settings(){
		$this->display("settings");
	}
}

 ?>