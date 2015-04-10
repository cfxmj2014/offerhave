<?php

	function getVersion(){
		$version = M('config')->where("Conf='Version'")->find();
		return($version['Val']);
	}
	function getCopyRight(){
		$copy=$copy = M('config')->where("Conf='CopyRight'")->find();
		return($copy['Val']);
	}
	/**
	 * SaveConfig($conf,$data);用于保存配置项。
	 *	$conf 为配置项名称 。$data为数组，数组形式为array('Val'=>value);
	 *	返回值为bool型：
	 *	如果更新成功返回true。
	 *	如果没有更新返回false。
	 */
	function SaveConfig($conf,$data){
		//return $data;die;
		return M('config')->where("Conf=\"".$conf."\"")->data($data)->save();
	}
	/**
	 * SaveConfig($conf,$data);用于读取配置项。
	 *	$conf 为配置项名称
	 *	返回值为bool型配置项的Val，对应数据库中的Val列。
	 *	与getConfig配合使用。
	 */
	function getConfig($conf){
		$config = M('config')->where("Conf=\"".$conf."\"")->find();
		return $config['Val'];
	}
	function getStyleCount($id){
		$data = array("styleid"=>$id);
		return M("cookmenu")->where($data)->count();
	}
		/*
		v1.0 返回用户数量。
		V2.0 读取配置文件信息，然后返回想要模拟的用户数量。
	*/
	function user_count(){
		$num = M("user")->count();
		return $num;
	}
	function getMenu($t,$str){
		// $this->assign("submenu","111");
	}
	function start_session($expire=0){
    if($expire==0){
        $expire=ini_get('session.gc_maxlifetime');
    }else{
        ini_set('session.gc_maxlifetime',$expire);
    }
    if(empty($_COOKIE['PHPSESSID'])){
        session_set_cookie_params($expire);
        session_start();
    }else{
        session_start();
        setcookie('PHPSESSID',session_id(),time()+$expire);
    	}
	}

 ?>