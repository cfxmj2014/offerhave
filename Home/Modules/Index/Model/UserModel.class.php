<?php
/**
  * 用户模块
  */ 
Class UserModel extends Model{
	//用于储存用户Session和Cookie
	Static Public function InitLogin($uId,$uNick,$time){
		if($time == "") $time=0;
		session('uId',$uId);
		session('uNick',$uNick);
		//存储Cookie,存储唯一标志位(将密码再次MD5加密)
		$condition = array("uId"=>$uId);
		$pwd = M("user")->where($condition)->find();
		$password = $pwd["pwd"];
		cookie("uuId",md5(md5($password)),$time);
		cookie("uId",$uId,$time);
		cookie("uNick",$uNick,$time);
		session('lastvisittime',date('y-m-d H:i',time()));
		session('lastloginip',get_client_ip());
		//存放最后登录IP和最后登录时间
		$info = array("lastvisittime"=>time(),"lastloginip"=>get_client_ip());
		$condition = array("uId"=>session("uId"));
		M("user")->where($condition)->save($info);
		return session("uNick");
	}
	Static Public function CookieToSession(){
		// return $_COOKIE;
		//如果uuId能匹配，重新初始化session并返回uNick，否则返回0
		$condition = array("uId"=>cookie("uId"));
		$user = M("user")->where($condition)->find();
		$pwd = $user["pwd"];
		if(cookie("uuId")==md5(md5($pwd))){
			session('uId',cookie("uId"));
			session('uNick',cookie("uNick"));
			return cookie("uNick");
		}
		else return 0;
	}

	//用于填充用户订单表,获取订单信息
	Static Public function getApplicationInfo(){
		$uId = session("uId");
		$condition = array("uId"=>$uId);
		$order = M("application")->where($condition)->select();
		// return $order;
		$serviceByaId = array();
		foreach ($order as $key => $value) {
			$aId = $value["aId"];
			$sql = "SELECT of_service.sName,of_service.sType ,of_applicationdetail.* ,of_consultant.cstName FROM `of_applicationdetail` left join of_service on of_service.svId = of_applicationdetail.svId left join of_consultant on of_applicationdetail.cstId=of_consultant.cstId WHERE aId='{$aId}'";
			$service = M()->query($sql);
			// return $service;
			foreach ($service as $k => $val) {
				$temp = $val["sName"]."/".$temp;
				// $order[$key]["service"] = $val["sName"]."/".$order[$key]["service"];
				$cstName = $val["cstName"];
			}
			$temp = substr($temp,0,-1);
			$order[$key]["service"] = $temp;
			$temp="";
			$order[$key]["cstName"] = $cstName;
			$order[$key]["time"] = date("Y-m-d h:i:s",$order[$key]["time"]);
		}
		return $order;
	}
}

 ?>