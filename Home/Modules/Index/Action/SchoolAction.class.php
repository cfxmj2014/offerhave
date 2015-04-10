<?php 
/**
 * School 控制器
 */
Class SchoolAction extends Action{
	/**
	 * 首页视图
	 * 1.接受学校和专业名称
	 * 2.查询学校和顾问信息并且查询得到顾问的第一项服务的价格
	 * 3.推荐学校(暂时没有加入真正推荐模块，为了适配图片大小，直接把“伦敦大学”作为neq条件)
	 */
	Public function index(){
		//简单过滤
		if(I("school")==null||I("major")==null) halt("您请求的页面不存在！");
		$major = I("major");
		$school = I("school");
		//链接查询得到顾问信息
		$sql = "select of_consultant.*,of_school.sName from of_consultant left join of_school on of_school.sId=of_consultant.sId where sName='{$school}'";
		if($major!="all") $sql=$sql."and cstMajor='{$major}'";
		else $major = "所有专业";
		$cstInfo = M()->query($sql);
		//将顾问信息做循环得到第一项服务的价格
		foreach ($cstInfo as $key => $value) {
			$condition = array("cstId"=>$value["cstId"],"svId"=>"1");
			$price = M("servicedetail")->where($condition)->field("price")->find();
			$cstInfo[$key]["firstPrice"] = $price["price"];
		}
		//推荐学校！为适配图片，不让学校等于“剑桥大学”
		$data = array("sName"=>array("neq","剑桥大学"));
		$otherSchool = M("school")->where($data)->limit(3)->select();
		$this->assign("Countcst",count($cstInfo))->assign("recommend",$otherSchool);
		$info["school"] = $school;$info["major"] = $major; 
		$this->assign("SchoolInfo",$info)->assign("cstInfo",$cstInfo)->display("index");
	}


	/**
	 * 筛选学校
	 */
	Public function ChooseSchool(){
		$uId = session("uId");
		$abroadTime = I("abroadTime");
		$gradeNow = I("gradeNow");
		if(!empty($abroadTime)||!empty($gradeNow)){
			//存储用户筛选的数据
			$data = array("abroadTime"=>I("abroadTime"),
						  "gradeNow"  =>I("gradeNow"),
						  "planItem"  =>I("planItem"),
						  "schoolNow" =>I("schoolNow"),
						  "schoolType"=>I("schoolType"),
						  "majorNow"  =>I("majorNow"),
						  "averageScore"=>I("averageScore"),
						  "expectMajor"=>I("expectMajor"),
						  "uId"=>$uId,
						 );
			// dump($data);die;
			$find = M('location')->where("uId=\"".$uId."\"")->find();
			//判断是更新还是新插入，用于保存数据
			if($find){
				M("location")->where("uId=\"".$uId."\"")->data($data)->save();
			}
			else M("location")->where("uId=\"".$uId."\"")->data($data)->add();

		}
		else{
			//分析数据进行页面跳转
			$userLocate = M("location")->where("uId=\"".$uId."\"")->find();
			// dump($userLocate);
			if($userLocate){
				$School = new SchoolModel($userLocate["schoolType"],$userLocate["averageScore"]);
				$info = $School->SchoolChoose();
				// dump($info);die;
				$cstInfo = D("Consultant")->getTop6Cst(); 
				$this->assign("School",$info)->assign("cstInfo",$cstInfo)->display("location");	
			}
			else $this->error("您请求的页面不存在！",U("Index/Index/index"));
		}
	}
}


 ?>