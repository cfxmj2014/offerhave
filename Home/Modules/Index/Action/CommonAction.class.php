<?php 
/**
 * 公共控制器判断用户登录状态
 */
Class CommonAction extends Action{
	/**
	 * 此控制器为公用控制器，访问每个控制器之前都要执行Common控制器的函数
	 */
		public function _initialize(){
			/**
			 * 通过Session判断用户是否已经登录系统。
			 * 如果没有登录系统，重定向到登录界面。
			 */
			// dump($_SESSION);DIE;
			if(!isset($_SESSION['uId'])||!isset($_SESSION['uNick'])){
				$this->redirect('Index/Index/index');
			}
		}
}
?>