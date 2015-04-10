<?php
/**
  * 顾问控制器
  */ 
Class ConsultantAction extends Action{
	/**
	 * 首页控制器
	 */
	Public function index(){
		$cstId = I("cstId");
		if($cstId==null) halt("您请求的页面不存在！");
		//获取个人陈述文书价格
		$condition = array("cstId"=>$cstId,"svId"=>1);
		$firstService = M("servicedetail")->where($condition)->find();
		$this->assign("first",$firstService);
		$sql = "select of_consultant.*,of_school.sName from of_consultant left join of_school on of_school.sId=of_consultant.sId where cstId='{$cstId}'";
		$cstInfo = M()->query($sql);
		//格式化从数据库读出来的数据格式！
		foreach ($cstInfo as $key => $value) {
			foreach ($value as $k => $v) {
				$cstInfoFormat[$k] = $v;
			}
		}
		$serviceSql = "SELECT of_servicedetail.price,of_service.* FROM `of_servicedetail` left join of_service on of_service.svId = of_servicedetail.svId WHERE cstId= '{$cstId}'";
		$serviceInfo = M()->query($serviceSql);
		// dump($serviceInfo);die;
		$this->assign("serviceInfo",$serviceInfo);
		$this->assign("cstInfo",$cstInfoFormat);
		$this->display("index");
	}
	Public function NewCst(){
		$info = D("Consultant")->getTop6Cst();
		// dump($info);
		// die;
		$this->assign("info",$info)->display("new");
	}
	Public function Info(){
		$this->display("info");
	}
	Public function Confirm(){
		$this->display("confirm");
	}
}

 ?>