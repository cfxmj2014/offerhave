<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1,user-scalable=yes">
    <meta name="renderer" content="webkit">
    <meta content="" name="Keywords">
	  <meta content="" name="Description">
    <title>有offer</title>
	  <script src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>  
    <script>
      var LoginURL = "<?php echo U('/Index/Index/Login','','');?>";
      var IsLoginURL = "<?php echo U('/Index/Index/IsLogin','','');?>";
      var ParaIsOkURL = "<?php echo U('/Index/Index/ParaIsOk','','');?>";
      var RegisterURL = "<?php echo U('/Index/Index/Register','','');?>";
      var ToSchoolURL = "<?php echo U('/Index/School/index','','');?>";
      var ChangeNumURL = "<?php echo U('/Index/Application/UpdateSession','','');?>";
      var ApplicationURL = "<?php echo U('/Index/Application/SaveApplication','','');?>";
      var ConfirmURL = "<?php echo U('/Index/Application/Confirm','','');?>";
      var LocationURL = "<?php echo U('/Index/School/ChooseSchool','','');?>";
    </script> 
    <script src="__PUBLIC__/js/base.js"></script>
    <!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
    WARNING: Respond.js doesn't work if you view the page via file://-->	 
    <!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/base.css">
    
      <!-- 控制首页页头不同 -->
    
  </head>
  <body>
    
      <!-- 页头 -->
      <!-- 设备宽度小于768页头 -->
<div id="header" class="navbar navbar-inverse header--fixed animated min-device-header" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('/Index/Index/index','','');?>"/>有offer</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse ">
      <ul class="nav navbar-nav navbar-right">
        <!-- 未登录显示 -->
        <li class="login-reg unlogin" href="#" data-toggle="modal" data-target="#myModal"><a href="#">Login/Register</a></li>
        <!-- 已登录显示 -->
        <li class="dropdown already-login">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="username"></span><span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo U('/Index/User/Application','','');?>">My Application</a></li>
            <li><a href="<?php echo U('/Index/User/Resume','','');?>">Edit my resume</a></li>
            <li><a href="<?php echo U('/Index/User/Wishlist','','');?>">Wish List</a></li>
            <li><a href="<?php echo U('/Index/User/Settings','','');?>">My Account</a></li>           
            <li class="divider"></li>
            <li><a href="<?php echo U('/Index/Index/Logout','','');?>" class="logout">Log Out</a></li>
          </ul>
        </li>
        <li><a href="javascript:void(0);">Help</a></li>
        <li><a href="<?php echo U('/Index/Consultant/NewCst','','');?>">Be a consultant</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- 页头 -->
<div class="container header">
  <div class="header-left">
    <a href="<?php echo U('/Index/Index/index','','');?>">
      <img src="__PUBLIC__/images/brand.jpg">&nbsp;<span class="logo-name">有offer</span>
    </a>
  </div>
  <!-- 已登录显示的页头 -->
  <div class="header-right already-login">
    <ul class="user-area">
      <li class="dropdown user-area-li">
        <a href="javascript:void(0);" class="dropdown-toggle js-img" data-toggle="dropdown">
          <img src="__PUBLIC__/images/login.png" class="img-circle">
          <span class="username"></span>
          <span class="caret"></span>&nbsp;&nbsp;&nbsp;
        </a>
        <ul class="dropdown-menu" role="menu">  
          <li><a href="<?php echo U('/Index/User/Application','','');?>">My Application</a></li>
          <li><a href="<?php echo U('/Index/User/Resume','','');?>">Edit my resume</a></li>
          <li><a href="<?php echo U('/Index/User/Wishlist','','');?>">Wish List</a></li>
          <li><a href="<?php echo U('/Index/User/Settings','','');?>">My Account</a></li>              
          <li class="divider"></li>
          <li><a href="<?php echo U('/Index/Index/Logout','','');?>" class="logout">Log Out</a></li>
        </ul>             
      </li>
      <li class="user-area-li"><a href="javascript:void(0);" class="help">Help</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="user-area-li">
        <a href="<?php echo U('/Index/Consultant/NewCst','','');?>" class="be-cst"><span class="be-cst-span">Be a consultant</span></a>
      </li>
    </ul>
  </div>
  <!-- 未登录显示的页头 -->
  <div class="header-right unlogin">
    <ul class="user-area">
      <li class="user-area-li">
        <img src="__PUBLIC__/images/un-login.png">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="login-reg">Login/Register</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="user-area-li"><a href="javascript:void(0);" class="help">Help</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="user-area-li">
        <a href="<?php echo U('/Index/Consultant/NewCst','','');?>" class="be-cst"><span class="be-cst-span">Be a consultant</span></a>
      </li>
    </ul>     
  </div>
</div>
<!-- 模式窗口 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button class="close-bt" type="button" data-dismiss="modal"></button> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <span class="login-span">登录</span>
          <span class="reg-span">注册</span>
        </h4>            
      </div>
      <!-- 登录模式窗口 -->
      <div class="login-modal-content">
        <form>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" id="loginEmail" class="form-control input input-email login-email" placeholder="请输入登录邮箱">                  
          </div>
          <span class="tip-wrap tip-wrap-email"></span>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control input input-pwd login-pwd" placeholder="请输入密码">                  
          </div> 
          <span class="tip-wrap tip-wrap-pwd"></span> 
          <div class="row">
            <div class="col-md-6 col-xs-6 col-sm-6"> 
              <input type="checkbox" id="auto-login" class="remember" checked="checked">&nbsp;自动登录              
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
              <a class="forget" hidefocus="true" href="#">忘记密码?</a>
            </div>
          </div>                        
          <button type="button" id="login-bt" class="form-control btn submit-bt">登录</button>
        </form>            
      </div>
      <!--注册模式窗口-->        
      <div class="reg-modal-content">
        <form>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" id="regEmail" class="form-control input input-email reg-email" placeholder="邮箱：请输入您的有效邮箱">                  
          </div>
          <span class="tip-wrap tip-wrap-email"></span>
          <div class="input-group">
            <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control input input-pwd reg-pwd" type="password" placeholder="密码：6-16位,区分大小写,不允许空格">
          </div>
          <span class="tip-wrap tip-wrap-pwd"></span>
          <div class="input-group">
            <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control input input-repwd reg-repwd" type="password" placeholder="再次输入密码">
          </div>
          <span class="tip-wrap tip-wrap-repwd"></span>
          <div class="input-group">
            <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control input input-nick reg-nick" type="text" placeholder="昵称：2-18位,中英文、数字或下划线">
          </div>
          <span class="tip-wrap tip-wrap-nick"></span>
          <button type="button" id="reg-bt" class="form-control btn submit-bt">创建我的账户</button> 
        </form>
      </div>
    </div>
  </div>
</div>    
    
    
<!-- 申请step-->
<div class="step-course">
  <div class="container">     
    <div class="row">
      <div class="col-xs-2 col-md-3">
        <h2>STEP 01</h2>
        <h4>选择达人和服务</h4>
      </div>
      <div class="col-xs-2 col-md-2">
        <img src="__PUBLIC__/images/p-14.png" width="30px" height="30px"> 
      </div>
      <div class="col-xs-2 col-md-3 course-active">
        <h2>STEP 02</h2>
        <h4>发送申请</h4>    
      </div>
      <div class="col-xs-2 col-md-2 ">
        <img src="__PUBLIC__/images/p-14.png" width="30px" height="30px"> 
      </div>
      <div class="col-xs-2 col-md-3">
        <h2>STEP 03</h2>
        <h4>等待确认</h4>              
      </div>
    </div>      
  </div>
</div>
<!-- 服务table -->
<div class="bg-light-gray for-header">
  <div class="container">
    <h3>确认申请</h3>
    <hr class="hr-style">
    <div class="table-responsive">
      <table class="table application-list">
        <thead>
          <tr>
            <th>服务名称</th>
            <th>服务达人</th>
            <th>服务类型</th>
            <th>数量</th> 
            <th>价格</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($AppInfo)): foreach($AppInfo as $key=>$v): ?><tr>
              <td class="svId" id="<?php echo ($v["svId"]); ?>"><?php echo ($v["sName"]); ?></td>
              <td><?php echo ($cstName); ?></td>
              <td><?php echo ($v["sType"]); ?></td>
              <td>
                <input type="button" class="min" value="-">
                <input type="text" class="count" value="<?php echo ($v["Num"]); ?>">
                <input type="button" class="add" value="+">
              </td>
              <td class="price" id="<?php echo ($v["Price"]); ?>"><?php echo ($v["Price"]); ?></td>
              <td><span class="deleteItem base-color">删除</span></td>
            </tr><?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
    <!-- 联系人信息 -->
    <h3>联系人信息</h3>
    <hr class="hr-style"><br>
    <div class="row">
      <div class="col-md-6 confirm-info">
        <h4>联系人姓名(必填)</h4>
        <input type="text" class="form-control uName" placeholder="请填写您的真实姓名">
        <span class="tip-wrap tip-wrap-uName"></span>
        <h4>联系人电话(必填)</h4>
        <!--<select class="code">
            <option>+86 China</option>
            <option>+44 UK</option>
            <option>+1 USA</option>
            <option>+61 Australia</option>
            <option>+64 New Zealand</option>
        </select>&nbsp;&nbsp;-->
        <input type="text" class="form-control uPhone" placeholder="请填写您的电话">
        <span class="tip-wrap tip-wrap-uPhone"></span>
        <h4>联系人邮箱(必填)</h4>
        <input type="text" class="form-control uEmail input-email" placeholder="必须与注册邮箱一致">
        <span class="tip-wrap tip-wrap-uEmail"></span>
      </div>
      <div class="col-md-6">
        <h4>留言</h4>
        <textarea class="message form-control"></textarea><br>
      </div>
    </div>
  </div>
  <div class="container application-confirm">
    <div class="row">
      <div class="col-md-4 col-treaty">
        <input type="checkbox" class="read-treaty">&nbsp;我已阅读并同意&nbsp;<a href="#" class="treaty">有offer网签协议</a>
      </div>
      <div class="col-md-4 col-md-offset-3 col-total">
        <h4><b>服务总额：</b><span class="base-color total-price"><?php echo ($TotalMoney); ?></span> CNY</h4>
      </div>
      <div class="col-md-4 col-confirm">
        <button type="button" class="btn form-control confirm-btn">提交申请</button>
      </div>
    </div>
  </div><br>
</div>

    
      <!-- 页脚 -->
      <div class="myfooter">
  <div class="container">
    <!-- 相关信息 -->
    <div class="row">
      <div class="col-xs-6 col-md-3 footer-content">
        <ul>
          <li class="footer-title">公司信息</li>
          <li><a href="#">关于有offer</a></li>
          <li><a href="#">用户协议</a></li>
          <li><a href="#">版权声明</a></li>
          <li><a href="#">优惠信息</a></li>
          <li><a href="#">友情链接</a></li>
          <li><a href="#">联系我们</a></li>
        </ul>
      </div>
      <div class="col-xs-6 col-md-3 footer-content">
        <ul>
          <li class="footer-title">帮助中心</li>
          <li><a href="#">服务条款</a></li>
          <li><a href="#">安全保障</a></li>
          <li><a href="#">预约流程</a></li>
          <li><a href="#">退款政策</a></li>
        </ul>
      </div>
      <div class="col-xs-6 col-md-3 footer-content fc-2">
        <ul>
          <li class="footer-title">发现</li>
          <li><a href="#">ios客户端</a></li>
        </ul> 
      </div>
      <div class="col-xs-6 col-md-3 footer-content fc-2">
        <ul>
          <li class="footer-title">申请达人</li>
          <li><a href="#">达人见面会</a></li>
          <li><a href="#">达人守则</a></li>
          <li><a href="#">收款须知</a></li>
        </ul>
      </div>
    </div>
    <!-- 合作院校 -->
    <div class="row">  
      <ul class="cooperation">
        <li class="footer-title">合作院校</li>
        <li>
          <a href="#"><img src="__PUBLIC__/images/c-1.jpg" title="伦敦大学学院"></a>
        </li>
        <li>
          <a href="#"><img src="__PUBLIC__/images/c-2.jpg" title="布里斯托大学"></a>
        </li>
        <li>
          <a href="#"><img src="__PUBLIC__/images/c-3.jpg" title="诺丁汉大学"></a>
        </li>
      </ul>
      <ul class="cooperation-min">
        <li class="footer-title">合作院校</li>
        <li>
          <a href="#">伦敦大学学院</a>
        </li>
        <li>
          <a href="#">布里斯托大学</a>
        </li>
        <li>
          <a href="#">诺丁汉大学</a>
        </li>
      </ul>
    </div><br>
  </div>
  <div class="copyright">
	  Copyright © 2013-2014 有offer™  All Rights Reserved.  京ICP备14011555号
  </div>
</div>
<!-- 返回Top -->
<a id="btt" class="btt headroom-btn btn--plain slide slide--reset" href="#" >
  Top<i class="icon icon--up"></i>
</a>


    
  </body>
  
  <script type="text/javascript">
  // 邮箱自动补全
  $(function(){
  $.AutoComplete('.input-email');
  });
  </script> 
 


  <script>
  // 调用headroom js
  $(function() {
      var header = new Headroom(document.querySelector("#header"), {
          tolerance: 5,
          offset : 205,
          classes: {
            initial: "animated",
            pinned: "slideDown",
            unpinned: "slideUp"
          }
      });
      header.init();

      var bttHeadroom = new Headroom(document.getElementById("btt"), {
          tolerance : 0,
          offset : 500,
          classes : {
              initial : "slide",
              pinned : "slide--reset",
              unpinned : "slide--down"
          }
      });
      bttHeadroom.init();
  }());
  </script>
</html>