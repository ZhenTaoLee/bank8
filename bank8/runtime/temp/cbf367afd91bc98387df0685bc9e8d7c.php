<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/index/login.html";i:1530173776;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script src="<?php echo BACK_JS_URL; ?>cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#df7611; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="#">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    <form action="" method="post">
    	 <ul>
		    <li><input name="name" id="username"  style="margin-top: -15px;" type="text" class="loginuser" value="admin" onclick="JavaScript:this.value=''"/></li>
		    <li><input name="pas" style="margin-top: -15px;" type="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/></li>
		    <li><input name="code" style="margin-top: -15px;" class="loginuser" value="验证码" 
		    	onclick="JavaScript:this.value=''" /></li>
		    
		    <li>
		    	<input name="" type="button" class="loginbtn" value="获取验证码" onclick="settime(this)" style="margin-right: 20px; background: #0066CC;" id="buttee" />
		    	<input name="" type="submit" class="loginbtn" value="登录"  />
		    </li>
		</ul>
 
    </form>
   
    
    
    </div>
    
    </div>
    
    
    
    
	
    
</body>
<script type="text/javascript">
				$("#buttee").click(function(){

				$.ajax({
				    url: "https://www.8haoqianzhuang.com/index.php/back/Admin/code",
				    type: 'post',
				    dataType: 'json',
				    data: {
				     username:$(" #username ").val()
				    },
				    success: function(text){
						alert(text.mesg);
				    },
				    error: function(){
				       alert( "程序员在路上...");
				    }
				 });
			});
</script>

<script type="text/javascript"> 
var countdown=60; 
function settime(obj) { 
    if (countdown == 0) { 
        obj.removeAttribute("disabled");    
        obj.value="免费获取验证码"; 
        countdown = 60; 
        return;
    } else { 
        obj.setAttribute("disabled", true); 
        obj.value="重新发送(" + countdown + ")"; 
        countdown--; 
    } 
setTimeout(function() { 
    settime(obj) }
    ,1000) 
}
  
</script>
</html>
