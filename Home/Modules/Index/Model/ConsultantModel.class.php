<?php 
/**
 * 顾问控制类
 * 主要控制顾问信息的读取
 */
Class ConsultantModel extends Model{
	function __construct(){
		$this->db_Consultant = M("consultant");
	}
	Public function getTop6Cst(){
		$info = M("consultant")->field("of_consultant.cstName,of_consultant.image,of_school.eName,of_consultant.cstId")->join("of_school on of_school.sId=of_consultant.sId")->order("of_consultant.sort desc")
		->limit(6)->select();
		return $info;
	}


}
?>
