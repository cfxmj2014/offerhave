<?php 
Class ApplicationModel extends Model{
	/**
	 * 订单控制逻辑，数据处理都放在这个Model中
	 */
	Static Public function getAppByCstId($cstId){
		$sql = "SELECT of_servicedetail.price,of_service.svId,of_service.sName,of_service.sType
		 FROM `of_servicedetail` left join of_service on of_service.svId = of_servicedetail.svId WHERE cstId= '{$cstId}'";
		$data = M()->query($sql);
		return $data;
	}
	Static Public function getCstName($cstId){
		$condition = array("cstId"=>$cstId);
		$cstName = M("consultant")->field("cstName")->where($condition)->find();
		return $cstName["cstName"];
	}
	Static Public function getTotalMoney(){
		$app = session("app");
		$cstService = $app["cstService"];
		foreach ($cstService as $key => $value) {
			$totalMoney = $totalMoney + $value["Num"]*$value["PerPrice"];
		}
		return $totalMoney;
	}
	/**
	 * 处理前台发送的请求，对Session中的服务数量进行增加，
	 * 并且同时返回修改后的单项服务的金额和总的服务价格！
	 */
	Static Public function ChangeNum($svId,$count){
		//用于存放每项服务的价格和总价！
		$ReturnPrice = array();
		if($svId==""||$count=="") return;
		$app = session("app");
		$cstService = $app["cstService"];
		// return $cstService;
		foreach ($cstService as $key => $value) {
			if ($value["svId"]==$svId) {
				$temp = $value["PerPrice"]*$count;
				$cstService[$key]["Price"] = $temp;
				$cstService[$key]["Num"] = $count;
			}
		}
		//更新Session
		$app["cstService"] = $cstService;
		session("app",$app);
		$totalMoney = self::getTotalMoney();
		$ReturnPrice["Price"] = $temp;
		$ReturnPrice["TotalMoney"] = $totalMoney;
		return $ReturnPrice;
	}
	/**
	 * 用于删除Session中的某项服务传入svId
	 */
	Static Public function DelSvId($svId){
		$app = session("app");
		$cstService = $app["cstService"];
		foreach ($cstService as $key => $value) {
			if($value["svId"]==$svId) unset($cstService[$key]);
		}
		//更新Session
		$app["cstService"] = $cstService;
		session("app",$app);
		return 1;
	}
	Static Public function SaveUserInfo($uName,$uPhone){
		//将电话和用户信息存储到用户信息表中。
		$data = array("uName"=>$uName,"phone"=>$uPhone);
		$condition = array("uId"=>session("uId"));
		if(M("user")->where($condition)->save($data)) return 1;
		else return 0;
	}


	Static Public function SaveOrder($message){
		$uId = session("uId");
		$app = session("app");
		$cstId = $app["cstId"];
		$totalPrice = self::getTotalMoney();
		// return $totalPrice;
		$data = array("uId"=>$uId,
					  "totalPrice"=>$totalPrice,
					  "time"=>time(),
					  "message"=>$message,
					  );
		$cstService = $app["cstService"];
		$aId = M("application")->add($data);
		if($aId){
			foreach ($cstService as $key => $value) {
			$data = array("aId"=>$aId,"svId"=>$value["svId"],"cstId"=>$cstId,"count"=>$value["Num"]);
			M("applicationdetail")->add($data);
			}
		}
	}
}
 ?>