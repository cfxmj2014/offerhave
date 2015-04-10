<?php 
Class IndexAction extends Action {
	Public function index(){
		/**
		 * 首页控制器视图。
		 */
		$SchoolInfo = M("school")->select();
		$Consultant = M("consultant")->field("cstName,image,cstId")->limit(4)->select();
		$this->assign("Consultant",$Consultant)->assign("SchoolInfo",$SchoolInfo)->display("index");
	}
	Public function Logout(){
		/**
		 * 注销用户登录函数。
		 * 销毁cookie
		 * 销毁Session，并且重定向到登录界面。
		 */
		session_unset();
		session_destroy();
		session(null);
		session("uId",null);
		$cookie = $_COOKIE;
		foreach ($cookie as $key => $value) {
			cookie($key,null);
		}
		$this->redirect('Index/Index/index');
	}

	/**
	 * 完成用户登录操作：
	 * ①判断用户名密码是否合法
	 * ②初始化Session
	 * ③跳转URL
	 */
	Public function Login(){
		// dump($_POST);DIE;
		if(!IS_POST) halt('您访问的页面不存在！','/Index/Index/index');
		$email = I('email');
		$pwd= md5(I('pwd'));
		$user= M('user')->where(array('email'=>$email))->find();
		if (!$user||$user['pwd']!=$pwd){
			$tag = 0;
		}
		else {
			if(I("remember")=="true") $time = 24*60*60;
			$tag=D("User")->InitLogin($user["uId"],$user["uNick"],$time);
		}
		$this->AjaxReturn($tag);
	}
	/**
	 * AJAX 请求判断是否登录
	 */
	Public function  IsLogin(){
		//先判断是否存储了Cookie
		if(isset($_SESSION['uNick'])||isset($_SESSION["uId"])) {$tag = session("uNick");}
		else{
			$uId = cookie("uId");$uNick = cookie("uNick");
			if($uId==""||$uNick=="") $tag=0;
			else $tag = D("User")->CookieToSession();
		}
		$this->AjaxReturn($tag);
	}
	/**
	 * 判断用户信息是否合法！
	 * 如果合法返回1，如果不合法返回0
	 */
	Public function ParaIsOk(){
		if(!IS_POST) halt("访问的页面不存在！");
		$email = I("email");$uNick = I("uNick");
		if($email!=null) $para = "email";
		elseif ($uNick!=null) $para = "uNick";
		$condition = array("{$para}"=>I("{$para}"));
		if(M("user")->where($condition)->find()) $this->AjaxReturn(0);
		else $this->AjaxReturn(1);
	}
	/**
	 * 用户注册逻辑。
	 * 如果注册成功AJAX返回1，否则返回0 
	 */
	Public function Register(){
		// if(!IS_POST) halt("访问的页面不存在！");
		$data = array("uNick"=>I("uNick"),
					  "pwd"=>md5(I("pwd")),
					  "email"=>I("email"));
		$uId = M("user")->add($data);
		if ($uId){ 
			// $this->SaveSession(I("uNick"),$uId);
			$ret = D("User")->InitLogin($uId,I("uNick"));
			$this->AjaxReturn($ret);
		}
		else $this->AjaxReturn(0);
	}
}

 ?>