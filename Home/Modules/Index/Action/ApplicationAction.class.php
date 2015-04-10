<?php 
Class ApplicationAction extends CommonAction{
		/**
		 * 首页控制器
		 * ①判断用户是否已经选择过订单，如果没有选择过则初始化订单！
		 * ②判断选择的服务是否为同一个人的，==>(1、如果是，直接将选择的订单情况填充到前台。如果不是重新初始化订单操作！置Session)
		 * ③数据填充模块！
		 */	
		Public function index(){
			//接受cstId
			$cstId = I("cstId");
			if($cstId=="") halt("您访问的页面不存在！");
			// dump($_SESSION);die;
			//判断用户是否已经选择过顾问。如果没有选择过顾问，或者session顾问和cstID不匹配，重新初始化Session
			//如果相等直接将Session中的数据读出来，前台显示
			$app = session("app");
			if ($app["cstId"]!=$cstId||$app==null) $this->InitSession($cstId);
			//获取顾问名字，并且将名字实例化到前台
			$cstService = D("Application");
			if($cstId!=0){
				$cstName = $cstService->getCstName($cstId);
				$this->assign("cstName",$cstName);
			}
			else $this->assign("cstName","团队套餐");
			//获取Session中的订单信息进行前台展示
			$temp = session("app");
			$cstInfotoDisplay = $temp["cstService"];
			// dump($cstInfotoDisplay);die;
			//计算总价，并前台展示
			$this->assign("TotalMoney",$cstService->getTotalMoney());
			$this->assign("AppInfo",$cstInfotoDisplay)->display("index");
		}
		/**
		 * 初始化Session
		 */
		Static Public function InitSession($cstId){
			$cst = D("Application");
			$cstInfo = $cst->getAppByCstId($cstId);
			//session 中app字段所要存储的所有信息。
			// dump($cstInfo);
			$allApp = array();
			$allApp["cstId"] = $cstId;
			//用来存储服务的信息。
			$cstsv = array();
			foreach ($cstInfo as $key => $value) {
				if ($value["svId"]==2) $Num = 2;
				else $Num = 1; 
				$svPrice = $Num*$value["price"];
				$cstsv[] = array("svId"=>$value["svId"],
								 "Num"=>$Num,
								 "PerPrice"=>$value["price"],
								 "sName"=>$value["sName"],
								 "sType"=>$value["sType"],
								 "Price"=>$svPrice,
								 );
			}
			$allApp["cstService"] = $cstsv;
			session("app",$allApp);
			// dump($_SESSION);
		}

		/**
		 * 接受前台发送的请求，调用Application中的ChangeNum去改变Session。
		 * Ajax返回PerPrice和TotalPrice。
		 */
		Public function UpdateSession(){
			$type = I("type");
			$svId = I("svId");
			$count = I("count");
			if($type==null) halt("您访问的页面不存在！");
			switch ($type) {
				case 'modifyCount':
					//这里修改单个服务的数量。
					{
						$return =D("Application")->ChangeNum($svId,$count);
						// dump($return);
						$this->AjaxReturn($return,"json");
					}
					break;
				case 'deleteServer':
					//这里删除某项服务
					{
						$return = D("Application")->DelSvId($svId);
						if($return=="1") $this->AjaxReturn("1");
					}
					break;
				default:
					//默认操作，返回错误信息
					$this->AjaxReturn("请求类型错误！","json");
					break;
			}
		}
		Public function SaveApplication(){
			//接受参数
			$uName = I("uName");
			$uPhone = I("uPhone");
			$message = I("message");
			//储存用户信息
			D("Application")->SaveUserInfo($uName,$uPhone);
			//储存订单信息
			$save = D("Application")->SaveOrder($message);
		}
		//确认界面控制器
		Public function Confirm(){
			$this->display("confirm");
		}
}

 ?>