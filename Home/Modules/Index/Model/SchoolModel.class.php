<?php 
/**
 * 学校Model，主要用于对学校的处理操作。
 */
Class SchoolModel extends Model{

	/**
	 * 用于筛选用户
	 */
	function __construct($school,$score){
		if($school!=985&&$school!=211) $this->school = "general";
		else $this->school = $school;
		$this->score = self::getScore($score);
	}



	Public function SchoolChoose(){
		// return $this->school.$this->score;	
		$condition = array("ChSchool"=>$this->school,"AverageScore"=>$this->score);
		$SchoolCategory = M("choose")->where($condition)->find();
		$SafeSchool = $SchoolCategory["SafeSchool"];
		$reSchool = $SchoolCategory["ReSchool"];
		$SchoolInfo["Safe"] = self::getSchool($SafeSchool,"Safe");
		$SchoolInfo["Recommend"] = self::getSchool($reSchool,"Recommend");
		return $SchoolInfo;
	}
	/**
	 * 对分数进行操作，使其符合查询条件
	 */
	Static Public function getScore($score){
		if($score>90) $score = 90;
		elseif ($score>85&&$score<=90) $score=85;
		elseif ($score>80&&$score<=85) $score=80;
		elseif ($score>75&&$score<=80) $score=75;
		else $score=74;
		return $score;
	}
	/**
	 * 输入学校的类别，返回Limit数量的学校
	 * 判断category中是否存在多个类别。
	 */
	Static Public function getSchool($category,$type){
		if($type=="Safe") $limit = getconfig("SafeNum");
		else $limit = getconfig("RecommendNum");
		if(strpos($category,"#")) {
			$temp = explode("#", $category);
			$num = count($temp);
			$eachNum = ceil($limit/$num);
			foreach ($temp as $key => $value) {
				$school[]= self::getSchoolInfo($value,$eachNum);
			}
			//对数组进行重构
			foreach ($school as $key => $value) {
				foreach ($value as $k => $v) {
					$School[] = $v;
				}
			}
		}
		else $School = self::getSchoolInfo($category,$limit);
		return $School;
	}
	Static Public function getSchoolInfo($category,$limit){
		$condition = array("Category"=>$category);
		$info = M("School")->where($condition)->limit($limit)->select();
		return $info;
	}
}

 ?>