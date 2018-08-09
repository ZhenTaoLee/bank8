<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/good/bankadd.html";i:1525243873;}*/ ?>
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
    <li><a href="#">升级为经办</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息<input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #DC4E00;margin-left: 200px;" type='button' name='Submit' onclick='javascript:history.back(-1);' value='返回'></span></div>
    <form action="bankadd" method="post" enctype="multipart/form-data">

    <ul class="forminfo">

    <li><label>银行名</label><input name="bankname" type="text" class="dfinput" value="" /><i></i></li>
 <li><label>logo</label><input name="img" type="file" class="dfinput" /><i></i></li>
  <li><label>排序</label><input name="rank" type="text" class="dfinput" value="" /><i>越大排越前</i></li>
   <li><label>所在城市</label>
   	<select name="city" class="dfinput" >
	<option value="广州">广州</option>
	<option value="杭州">杭州</option>
	<option value="深圳">深圳</option>
	<option value="珠海">珠海</option>
	<option value="南京">南京</option>
	<option value="南宁">南宁</option>
	<option value="武汉">武汉</option>
		</select>
		<i></i></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
     </form>   
    
    </div>


</body>

</html>


