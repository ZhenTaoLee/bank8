<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/common/aupd.html";i:1527760503;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">

    <div class="formtitle"><span>基本信息</span></div>
    <form action="" method="post">
    	

    <ul class="forminfo">
    	<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
    <li><label>分类</label><i><?php echo $list['name']; ?></i></li> 
    <li><label>版本号</label><input name="anversion" type="text" class="dfinput" value="<?php echo $list['anversion']; ?>" /></li>
    <li><label>强更版本号</label><input name="ansrapeersion" type="text" class="dfinput" value="<?php echo $list['ansrapeersion']; ?>"/></li>
    <li><label>地址</label><input name="anurl" type="text" class="dfinput" value="<?php echo $list['anurl']; ?>"/></li>
 	
  	<li><label>描述</label><textarea name="andescribe" cols="" rows="" class="textinput"><?php echo $list['andescribe']; ?></textarea><i>换行符</i></li>

  

    <li><label>&nbsp;</label><input name="" type="submit" id="btn" value="确认保存" style="padding: 10px 20px 10px 20px;  background: #DC4E00; color: #F0F0EE;"/></li>
    </ul>
    
    </form>
    
    </div>


</body>
<script src="<?php echo BACK_JS_URL; ?>good.js" type="text/javascript" charset="utf-8"></script>
<script src="http://www.jq22.com/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">


$("#but1").click(function(){
        $(".insur").prop("checked",true);
        wInput()
    });
    $("#but1s").click(function(){
        $(".insur").prop("checked",false);
        wInput()
    });
    
    $("#but2").click(function(){
        $(".carp").prop("checked",true);
        wInput()
    });
    $("#but2s").click(function(){
        $(".carp").prop("checked",false);
        wInput()
    });
        $("#but3").click(function(){
        $(".fullca").prop("checked",true);
        wInput()
    });
    $("#but3s").click(function(){
        $(".fullca").prop("checked",false);
        wInput()
    });

 $("#but4").click(function(){
        $(".enti").prop("checked",true);
        wInput()
    });
    $("#but4s").click(function(){
        $(".enti").prop("checked",false);
        wInput()
    });
    
     $("#but5").click(function(){
        $(".reco").prop("checked",true);
        wInput()
    });
    $("#but5s").click(function(){
        $(".reco").prop("checked",false);
        wInput()
    });


</script>
</html>
