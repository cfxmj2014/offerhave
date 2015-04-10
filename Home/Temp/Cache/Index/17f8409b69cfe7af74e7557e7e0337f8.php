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
     
<style type="text/css">

/*控制首页页头不同*/
@media screen and (min-device-width: 768px){
  .header {
    position: absolute;
    top: 0;
    left: 5%;
    right: 5%;  
    z-index: 999;
  }
  .logo-name {
    color: #fff;
  }
}
</style>

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
    
    
<!--轮播-->
<div id="myCarousel" class="carousel slide " data-ride="carousel" data-pause="">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="#"><img src="__PUBLIC__/images/banner-1.jpg"></a>
    </div>
    <div class="item">
      <a href="#"><img src="__PUBLIC__/images/banner-2.jpg"></a>
    </div>
    <div class="item">
      <a href="#"><img src="__PUBLIC__/images/banner-3.jpg"></a>
    </div>
    <div class="item">
      <a href="#"><img src="__PUBLIC__/images/banner-2.jpg"></a>
    </div>
  </div>  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--预约顾问-->
<div class="container min-device-pre for-header">
  <div class="row">
    <!-- 预约顾问左边界面 -->
    <div class="col-md-6 cst-precontract">
      <div class="cst-pre">预约最佳留学顾问&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="show-school-location">还不确定？30秒免费定位</span>
      </div>
      <form>
        <select class="form-control" name="select-school">
          <option disabled selected>您的Dream School是？</option>
          <option disabled>------------英国------------</option>
          <?php if(is_array($SchoolInfo)): foreach($SchoolInfo as $key=>$v): ?><option><?php echo ($v["sName"]); ?></option><?php endforeach; endif; ?>
          <option disabled>------------------------------</option>
        </select><br>
        <select class="form-control" name="select-major">
          <option disabled selected>您想学习的专业是？</option>
          <option disabled>------------------------------</option>
          <option>所有专业</option>
          <option>工科</option>
          <option>经济金融</option>
          <option>商科</option>
          <option>社会科学</option>
          <option>医药学</option>
          <option>艺术</option> 
          <option>自然科学</option>
          <option disabled>------------------------------</option>
        </select><br>
        <button type="button" class="form-control btn to-school font-color-white">选好啦，走你！</button> 
      </form>
    </div> 
    <!-- 预约顾问右边界面1-->
    <div class="col-md-6 school-location">
      <div class="school-location-div">
        <h2 >我要留学方案</h2>
        <h4 >想去的国家：</h4>
          <form>        
            <div class="checkbox">
              <label >
                <input type="checkbox" checked > 英国
              </label>
            </div>
            <!-- <input type="checkbox" checked="checked">英国&nbsp;&nbsp;&nbsp; -->
            <!-- <input type="checkbox" >美国&nbsp;&nbsp;&nbsp; -->
            <!-- <input type="checkbox" >澳大利亚 -->
            <h4 >计划出国时间：</h4>
            <select class="form-control" name="abroad-time">
              <option>2015</option>
              <option>2016</option>
              <option>2017</option>
              <option>以后</option>
            </select>
            <h4 >目前就读年级：</h4>
            <select class="form-control" name="grade-now">
              <option>本科大四</option>
              <option>本科大三</option>
              <option>本科大二</option>
              <option>本科大一</option>
              <option>本科毕业</option>
              <option>硕士在读</option>
              <option>硕士毕业</option>
              <option>博士在读</option>
              <option>博士毕业</option>          
              <option>高三</option>
              <option>高二</option>
              <option>高一</option>
              <option>高中毕业</option>
              <option>初三</option>
              <option>初二</option>
              <option>初一</option>
              <option>大专大三</option>
              <option>大专大二</option>
              <option>大专大一</option>
              <option>大专毕业</option>
              <option>其它</option>
            </select>
            <h4 >计划就读项目：</h4>
            <select class="form-control" name="plan-item">
              <option>硕士（Master）</option>
              <option>博士（Phd）</option>
              <option>本科（Bachelor）</option>
              <option>其他课程（e.g. Foundation）</option>
            </select><br>
            <button type ="button" class="btn form-control to-school-location location font-color-white login-reg unlogin" data-toggle="modal" data-target="#myModal">注册并免费获取留学方案</button>
            <button type ="button" class="btn form-control to-school-location location to-school-location-detail font-color-white already-login">免费定位并获取留学方案</button>
          </form>
      </div>
    </div>    
    <!-- 预约顾问右边界面2  -->
    <div class="col-md-6 school-location-detail">
      <div class="school-location-div">
        <h4 >填写你的个人信息，根据丰富的数据资源，为你提供最佳选校方案。</h4><br>
        <form>
          <!-- <div>
            <span ><input type="text" class="form-control" placeholder="姓名"></span> 
          </div><br> -->
          <div><input type="text" class="form-control school-now" placeholder="最近就读学校"></div><br>
          <div >
            <select class="form-control" name="school-type">
              <option disabled selected>学校类型</option>
              <option disabled>------------------------------</option>
              <option>985</option>
              <option>211</option>
              <option>非211一本院校</option>
              <option>二本院校</option>
              <option>三本院校</option>
              <option>专科院校</option>
              <option>国外院校（世界前30）</option>
              <option>国外院校（世界前100）</option>
              <option>国外院校（其他）</option>
              <option>高中</option>
              <option>初中</option>
              <option disabled>------------------------------</option>
            </select>
          </div><br>
          <div >
            <select class="form-control" name="major-now">
              <option disabled selected >就读专业</option>
              <option disabled>------------------------------</option>
              <option>工科</option>
              <option>经济金融</option>
              <option>商科</option>
              <option>社会科学</option>
              <option>医药学</option>
              <option>艺术</option> 
              <option>自然科学</option>
              <option disabled>------------------------------</option>
            </select>
          </div><br>
          <div><input type="text" class="form-control average-score" placeholder="平均成绩：0-100分"></div><br>
          <div>
            <select class="form-control" name="expect-major">
              <option disabled selected>期望就读专业</option>
              <option disabled>------------------------------</option>
              <option>工科</option>
              <option>经济金融</option>
              <option>商科</option>
              <option>社会科学</option>
              <option>医药学</option>
              <option>艺术</option> 
              <option>自然科学</option>
              <option disabled>------------------------------</option>
            </select>
          </div><br>
          <!-- <div ><input type="text" class="form-control" placeholder="请填写具体专业" class="u-major"></div><br> -->
          <button type="button" class="btn form-control to-school-location s-location font-color-white">一秒获得选校方案</button>
        </form>
      </div>
    </div>
    </div>     
  </div>
</div>
<!--流程-->
<div class="bg-light-gray">
  <div class="container">
    <div class="title">服务流程</div>
    <div class="content">熟悉网站流程，留学更得心应手。</div>
    <div class="row">
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-1.jpg">
          <div class="caption">
            <p class="flow-title">猛戳最想去的学校或者专业</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-2.jpg">
          <div class="caption">
            <p class="flow-title">从众多顾问中挑选你喜欢的</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-3.jpg">
          <div class="caption">
            <p class="flow-title">向顾问发申请，确认顾问是否available</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-4.jpg">
          <div class="caption">
            <p class="flow-title">申请得到确认，选择使用单文书还是套餐</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-5.jpg">
          <div class="caption">
            <p class="flow-title">交定金，获得服务。服务结束后补交尾款</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2 flow-img">
        <div class="thumbnail">
          <img src="__PUBLIC__/images/process-6.jpg">
          <div class="caption">
            <p class="flow-title">拿上offer妥妥的，收拾行囊上学啦</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--热门名校-->    
<div class="bg-dark-gray">
  <div class="container ">
    <div class="title">热门名校</div>
    <div class="content">你与名校，仅仅只有一步之遥。</div>
    <div class="row">
    <?php if(is_array($SchoolInfo)): foreach($SchoolInfo as $key=>$v): ?><div class="col-xs-12 col-md-4 u-img">
        <div class="thumbnail" id="<?php echo ($s=$v["sName"]); ?>">
          <a href="<?php echo U("Index/School/index",array('school'=>$s,'major'=>'all'),"");?>"/>
            <img src="<?php echo ($v["image"]); ?>" >
            <div class="carousel-caption">
              <h3 class="index-name"><?php echo ($v["sName"]); ?></h3>
              <h4 class="e-name"><?php echo ($v["eName"]); ?></h4>
            </div>
          </a>
        </div>
      </div><?php endforeach; endif; ?>
    </div>
  </div>
</div>
<!--申请达人-->
<div class="bg-light-gray">
  <div class="container">
    <div class="title">申请达人</div>
    <div class="content">你，也可以像我一样。让我来帮你实现梦想。</div>
    <div class="row">
    <?php if(is_array($Consultant)): foreach($Consultant as $key=>$v): ?><div class="col-xs-6 col-md-3 " <?php echo ($cstId=$v["cstId"]); ?>>
        <a href="<?php echo U('Index/Consultant/index',array("cstId"=>$cstId),"");?>">
          <div class="thumbnail c-img">
            <img src="<?php echo ($v["image"]); ?>">
            <div class="carousel-caption">
              <h3 class="index-name"><?php echo ($v["cstName"]); ?></h3>
              <h4 class="cst-feature">剑桥达人+学霸＋Teaching Fellow</h4>
            </div>
          </div>
        </a>
      </div><?php endforeach; endif; ?>
    </div>
  </div>
</div>
<!--我为有offer代言-->
<div class="bg-dark-gray">
  <div class="container"> 
    <div class="title">我为有offer代言</div>
    <div class="content">留学大事儿，为自己负责，就是这么任性。</div>        
    <div class="row">
      <div class="col-md-4">
        <center>
          <img class="img-circle success" src="__PUBLIC__/images/s-1.jpg">
          <a href="consultant.php?cstId=5"><img class="img-circle success-cst" src="__PUBLIC__/images/cst-5.jpg"></a>
        </center>
        <div class="success-name">董汉Hayden</div>
        <div class="success-type">预约了 Christina(UCL, 商科) </div>
        <div class="success-content">“在经历了中介的坑爹申请之后，我找到了有offer这个网站。工作人员帮我预约了在UCL读商科读Christina帮我申请UCL的项目管理专业。网站的工作人员都有相关的留学背景，通过他们专业的定位，我鼓起勇气申请了我原来想都不敢想都伦敦大学学院。Christina也是网站帮我推荐的人选，她就在UCL的商科读Master，又是Native，帮我写出了既懂我专业，又地道的申请文书。最后不到两个月就拿到了我心仪的offer。”</div>
      </div>
      <div class="col-md-4">
        <center>
          <img class="img-circle success" src="__PUBLIC__/images/s-1.jpg">
          <a href="consultant.php?cstId=5"><img class="img-circle success-cst" src="__PUBLIC__/images/cst-5.jpg"></a>
        </center>
        <div class="success-name">董汉Hayden</div>
        <div class="success-type">预约了 Christina(UCL, 商科) </div>
        <div class="success-content">“在经历了中介的坑爹申请之后，我找到了有offer这个网站。工作人员帮我预约了在UCL读商科读Christina帮我申请UCL的项目管理专业。网站的工作人员都有相关的留学背景，通过他们专业的定位，我鼓起勇气申请了我原来想都不敢想都伦敦大学学院。Christina也是网站帮我推荐的人选，她就在UCL的商科读Master，又是Native，帮我写出了既懂我专业，又地道的申请文书。最后不到两个月就拿到了我心仪的offer。”</div>
      </div>
      <div class="col-md-4">
        <center>
          <img class="img-circle success" src="__PUBLIC__/images/s-1.jpg">
          <a href="consultant.php?cstId=5"><img class="img-circle success-cst" src="__PUBLIC__/images/cst-5.jpg"></a>
        </center>
        <div class="success-name">董汉Hayden</div>
        <div class="success-type">预约了 Christina(UCL, 商科) </div>
        <div class="success-content">“在经历了中介的坑爹申请之后，我找到了有offer这个网站。工作人员帮我预约了在UCL读商科读Christina帮我申请UCL的项目管理专业。网站的工作人员都有相关的留学背景，通过他们专业的定位，我鼓起勇气申请了我原来想都不敢想都伦敦大学学院。Christina也是网站帮我推荐的人选，她就在UCL的商科读Master，又是Native，帮我写出了既懂我专业，又地道的申请文书。最后不到两个月就拿到了我心仪的offer。”</div><br>
      </div>
    </div>
  </div> 
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