<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/good/upds.html";i:1526367418;}*/ ?>
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

    <div class="formtitle"><span>基本信息
    	<<input style="margin-left: 200px;padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #DC4E00;" type='button' name='Submit' onclick='javascript:history.back(-1);' value='返回'></span></div>
    <form action="upds" method="post" id="test_form">


    <ul class="forminfo">
    <li><label>产品名</label><h1><?php echo $listss['goodName']; ?></h1></li>
    <input type="hidden" name="goods_id" id="goods_id" value="<?php echo $list['goods_id']; ?>" />
    <input type="hidden" name="good_id" id="good_id" value="<?php echo $list['goodid']; ?>" />
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
   <div style="font-size: 80px;  height: 20; "><h1>基本信息:</h1></div>
   
   <li><label>性别</label><cite>
    	<input type="hidden" name="sexs" id="sexs" value=""  />
    	<?php if(strpos($list['sex'],'男') !== false){?>
    		<input name="sex" type="checkbox" value="男" checked="checked" />
	<?php }else{?>
		<input name="sex" type="checkbox" value="男"  />
	<?php }?>
    	男&nbsp;&nbsp;&nbsp;&nbsp;
    	<?php if(strpos($list['sex'],'女') !== false){?> 
    	<input name="sex" type="checkbox" value="女" checked="checked" />
    	<?php }else{?>
    		<input name="sex" type="checkbox" value="女"  />
    	<?php }?>
    	女
    	
    </cite></li>
    
	<li><label>年龄</label><cite>
    	<input name="ageMin" type="text" class="dfinput" value="<?php echo $list['ageMin']; ?>"  style="width: 100px;"/>~<input name="ageMax" type="text" class="dfinput" value="<?php echo $list['ageMax']; ?>"  style="width: 100px;" />
     </cite></li> 	

   <li><label>
    	职业
   </label><cite>
    	<input type="hidden" name="professions" id="professions" value=""  />
    	
<?php if(strpos($list['profession'],'公务员事业单位') !== false){?> 
	 <input name="profession" type="checkbox" value="公务员事业单位" checked="checked" />公务员事业单位
<?php }else{?>
	 <input name="profession" type="checkbox" value="公务员事业单位" />公务员事业单位
<?php }?>

   
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'国企、500强、上市公司') !== false){?> 
	 <input name="profession" type="checkbox" value="国企、500强、上市公司" checked="checked" />国企、500强、上市公司
<?php }else{?>
	 <input name="profession" type="checkbox" value="国企、500强、上市公司" />国企、500强、上市公司
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'娱乐行业') !== false){?> 
	 <input name="profession" type="checkbox" value="娱乐行业" checked="checked" />娱乐行业
<?php }else{?>
	 <input name="profession" type="checkbox" value="娱乐行业" />娱乐行业
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'保险行业') !== false){?> 
	 <input name="profession" type="checkbox" value="保险行业" checked="checked" />保险行业
<?php }else{?>
	 <input name="profession" type="checkbox" value="保险行业" />保险行业
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'法人或股东') !== false){?> 
	 <input name="profession" type="checkbox" value="法人或股东" checked="checked" />法人或股东
<?php }else{?>
	 <input name="profession" type="checkbox" value="法人或股东" />法人或股东
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'公检法') !== false){?> 
	 <input name="profession" type="checkbox" value="公检法" checked="checked" />公检法
<?php }else{?>
	 <input name="profession" type="checkbox" value="公检法" />公检法
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'直销') !== false){?> 
	 <input name="profession" type="checkbox" value="直销" checked="checked" />直销
<?php }else{?>
	 <input name="profession" type="checkbox" value="直销" />直销
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'高风险行业') !== false){?> 
	 <input name="profession" type="checkbox" value="高风险行业" checked="checked" />高风险行业
<?php }else{?>
	 <input name="profession" type="checkbox" value="高风险行业" />高风险行业
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'普通白领') !== false){?> 
	 <input name="profession" type="checkbox" value="普通白领" checked="checked" />普通白领
<?php }else{?>
	 <input name="profession" type="checkbox" value="普通白领" />普通白领
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'退休人员') !== false){?> 
	 <input name="profession" type="checkbox" value="退休人员" checked="checked" />退休人员
<?php }else{?>
	 <input name="profession" type="checkbox" value="退休人员" />退休人员
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['profession'],'转业军人') !== false){?> 
	 <input name="profession" type="checkbox" value="转业军人" checked="checked" />转业军人
<?php }else{?>
	 <input name="profession" type="checkbox" value="转业军人" />转业军人
<?php }?>
     </cite></li>
     
  
<li><label>
    	征信查询
   </label><cite>
    <input type="hidden" name="credits" id="credits" value=""  />    	
   <?php if(strpos($list['credit'],'不知道') !== false){?> 
	 <input name="credit" type="checkbox" value="不知道" checked="checked" />不知道
<?php }else{?>
	 <input name="credit" type="checkbox" value="不知道" />不知道
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;

   <?php if(strpos($list['credit'],'近2个月查询≤4次') !== false){?> 
	 <input name="credit" type="checkbox" value="近2个月查询≤4次" checked="checked" />近2个月查询≤4次
<?php }else{?>
	 <input name="credit" type="checkbox" value="近2个月查询≤4次" />近2个月查询≤4次
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;

   <?php if(strpos($list['credit'],'近3个月查询≤6次') !== false){?> 
	 <input name="credit" type="checkbox" value="近3个月查询≤6次" checked="checked" />近3个月查询≤6次
<?php }else{?>
	 <input name="credit" type="checkbox" value="近3个月查询≤6次" />近3个月查询≤6次
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
   <?php if(strpos($list['credit'],'近半年查询≤6次') !== false){?> 
	 <input name="credit" type="checkbox" value="近半年查询≤6次" checked="checked" />近半年查询≤6次
<?php }else{?>
	 <input name="credit" type="checkbox" value="近半年查询≤6次" />近半年查询≤6次
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
   <?php if(strpos($list['credit'],'近半年查询≤11次') !== false){?> 
	 <input name="credit" type="checkbox" value="近半年查询≤11次" checked="checked" />近半年查询≤11次
<?php }else{?>
	 <input name="credit" type="checkbox" value="近半年查询≤11次" />近半年查询≤11次
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;

   <?php if(strpos($list['credit'],'近一年查询≤12次') !== false){?> 
	 <input name="credit" type="checkbox" value="近一年查询≤12次" checked="checked" />近一年查询≤12次
<?php }else{?>
	 <input name="credit" type="checkbox" value="近一年查询≤12次" />近一年查询≤12次
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
   <?php if(strpos($list['credit'],'白户（无贷款和信用卡记录）') !== false){?> 
	 <input name="credit" type="checkbox" value="白户（无贷款和信用卡记录）" checked="checked" />白户（无贷款和信用卡记录）
<?php }else{?>
	 <input name="credit" type="checkbox" value="白户（无贷款和信用卡记录）" />白户（无贷款和信用卡记录）
<?php }?>


     </cite></li>
     
     
  <li><label>
    	个人负债
   </label><cite>
    	<input type="hidden" name="liabilitiess" id="liabilitiess" value=""  />    	
 <?php if(strpos($list['liabilities'],'信用类负债30万以内') !== false){?> 
	 <input name="liabilities" type="checkbox" value="信用类负债30万以内" checked="checked" />信用类负债30万以内
<?php }else{?>
	 <input name="liabilities" type="checkbox" value="信用类负债30万以内" />信用类负债30万以内
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['liabilities'],'信用类负债50万以内') !== false){?> 
	 <input name="liabilities" type="checkbox" value="信用类负债50万以内" checked="checked" />信用类负债50万以内
<?php }else{?>
	 <input name="liabilities" type="checkbox" value="信用类负债50万以内" />信用类负债50万以内
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['liabilities'],'信用类负债100万以内') !== false){?> 
	 <input name="liabilities" type="checkbox" value="信用类负债100万以内" checked="checked" />信用类负债100万以内
<?php }else{?>
	 <input name="liabilities" type="checkbox" value="信用类负债100万以内" />信用类负债100万以内
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['liabilities'],'卡债10万以内') !== false){?> 
	 <input name="liabilities" type="checkbox" value="卡债10万以内" checked="checked" />卡债10万以内
<?php }else{?>
	 <input name="liabilities" type="checkbox" value="卡债10万以内" />卡债10万以内
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['liabilities'],'无负债') !== false){?> 
	 <input name="liabilities" type="checkbox" value="无负债" checked="checked" />无负债
<?php }else{?>
	 <input name="liabilities" type="checkbox" value="无负债" />无负债
<?php }?>

     </cite></li>   
     

     
<li><label>
    	社保
   </label><cite>
    	<input type="hidden" name="socialSecuritys" id="socialSecuritys" value=""  />    	
 
 <?php if(strpos($list['socialSecurity'],'无') !== false){?> 
	 <input name="socialSecurity" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="socialSecurity" type="checkbox" value="无" />无
<?php }?>
	
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurity'],'连续缴不足6个月') !== false){?> 
	 <input name="socialSecurity" type="checkbox" value="连续缴不足6个月" checked="checked" />连续缴不足6个月
<?php }else{?>
	 <input name="socialSecurity" type="checkbox" value="连续缴不足6个月" />连续缴不足6个月
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurity'],'连续缴6个月以上') !== false){?> 
	 <input name="socialSecurity" type="checkbox" value="连续缴6个月以上" checked="checked" />连续缴6个月以上
<?php }else{?>
	 <input name="socialSecurity" type="checkbox" value="连续缴6个月以上" />连续缴6个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurity'],'连续缴12个月以上') !== false){?> 
	 <input name="socialSecurity" type="checkbox" value="连续缴12个月以上" checked="checked" />连续缴12个月以上
<?php }else{?>
	 <input name="socialSecurity" type="checkbox" value="连续缴12个月以上" />连续缴12个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurity'],'连续缴24个月以上') !== false){?> 
	 <input name="socialSecurity" type="checkbox" value="连续缴24个月以上" checked="checked" />连续缴24个月以上
<?php }else{?>
	 <input name="socialSecurity" type="checkbox" value="连续缴24个月以上" />连续缴24个月以上
<?php }?>

     </cite></li>  
     
     <li><label>
    	社保基数
   </label><cite>
    	<input type="hidden" name="socialSecurityBasicss" id="socialSecurityBasicss" value=""  />    	
 <?php if(strpos($list['socialSecurityBasics'],'不清楚') !== false){?> 
	 <input name="socialSecurityBasics" type="checkbox" value="不清楚" checked="checked" />不清楚
<?php }else{?>
	 <input name="socialSecurityBasics" type="checkbox" value="不清楚" />不清楚
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurityBasics'],'基数2400以上') !== false){?> 
	 <input name="socialSecurityBasics" type="checkbox" value="基数2400以上" checked="checked" />基数2400以上
<?php }else{?>
	 <input name="socialSecurityBasics" type="checkbox" value="基数2400以上" />基数2400以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurityBasics'],'基数4000以上') !== false){?> 
	 <input name="socialSecurityBasics" type="checkbox" value="基数4000以上" checked="checked" />基数4000以上
<?php }else{?>
	 <input name="socialSecurityBasics" type="checkbox" value="基数4000以上" />基数4000以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['socialSecurityBasics'],'基数5000以上') !== false){?> 
	 <input name="socialSecurityBasics" type="checkbox" value="基数5000以上" checked="checked" />基数5000以上
<?php }else{?>
	 <input name="socialSecurityBasics" type="checkbox" value="基数5000以上" />基数5000以上
<?php }?>

     </cite></li>  
     
     <li><label>
    	公积金
   </label><cite>
    	<input type="hidden" name="accumulationFunds" id="accumulationFunds" value=""  />    	
 <?php if(strpos($list['accumulationFund'],'无') !== false){?> 
	 <input name="accumulationFund" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="accumulationFund" type="checkbox" value="无" />无
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFund'],'连续缴不足6个月') !== false){?> 
	 <input name="accumulationFund" type="checkbox" value="连续缴不足6个月" checked="checked" />连续缴不足6个月
<?php }else{?>
	 <input name="accumulationFund" type="checkbox" value="连续缴不足6个月" />连续缴不足6个月
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFund'],'连续缴6个月以上') !== false){?> 
	 <input name="accumulationFund" type="checkbox" value="连续缴6个月以上" checked="checked" />连续缴6个月以上
<?php }else{?>
	 <input name="accumulationFund" type="checkbox" value="连续缴6个月以上" />连续缴6个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFund'],'连续缴12个月以上') !== false){?> 
	 <input name="accumulationFund" type="checkbox" value="连续缴12个月以上" checked="checked" />连续缴12个月以上
<?php }else{?>
	 <input name="accumulationFund" type="checkbox" value="连续缴12个月以上" />连续缴12个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFund'],'连续缴24个月以上') !== false){?> 
	 <input name="accumulationFund" type="checkbox" value="连续缴24个月以上" checked="checked" />连续缴24个月以上
<?php }else{?>
	 <input name="accumulationFund" type="checkbox" value="连续缴24个月以上" />连续缴24个月以上
<?php }?>

     </cite></li>  
     
     
     <li><label>
    	公积金基数
   </label><cite>
    	<input type="hidden" name="accumulationFundBasicss" id="accumulationFundBasicss" value=""  />
    	
    <?php if(strpos($list['accumulationFundBasics'],'不清楚') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="不清楚" checked="checked" />不清楚
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="不清楚" />不清楚
<?php }?>	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'个人缴费400元以上') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="个人缴费400元以上" checked="checked" />个人缴费400元以上
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="个人缴费400元以上" />个人缴费400元以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'个人缴费800元以上') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="个人缴费800元以上" checked="checked" />个人缴费800元以上
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="个人缴费800元以上" />个人缴费800元以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'基数2000以下') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="基数2000以下" checked="checked" />基数2000以下
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="基数2000以下" />基数2000以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'基数2000~4000元') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="基数2000~4000元" checked="checked" />基数2000~4000元
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="基数2000~4000元" />基数2000~4000元
<?php }?>
<input name="accumulationFundBasics" type="checkbox" value="基数2000~4000元" />基数2000~4000元
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'基数4000元以上') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="基数4000元以上" checked="checked" />基数4000元以上
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="基数4000元以上" />基数4000元以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['accumulationFundBasics'],'基数5000元以上') !== false){?> 
	 <input name="accumulationFundBasics" type="checkbox" value="基数5000元以上" checked="checked" />基数5000元以上
<?php }else{?>
	 <input name="accumulationFundBasics" type="checkbox" value="基数5000元以上" />基数5000元以上
<?php }?>

     </cite></li>    
     
 <li><label>
    	房产购置方式
   </label><cite>
   	
    	<input type="hidden" name="houseBuyTypes" id="houseBuyTypes" value=""  /> 
    	
    <?php if(strpos($list['houseBuyType'],'无房产') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="无房产" checked="checked" />无房产
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="无房产" />无房产
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'全款房') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="全款房" checked="checked" />全款房
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="全款房" />全款房
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'结清1年以内') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="结清1年以内" checked="checked" />结清1年以内
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="结清1年以内" />结清1年以内
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'按揭满3个月以下') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="按揭满3个月以下" checked="checked" />按揭满3个月以下
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="按揭满3个月以下" />按揭满3个月以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'按揭满3个月以上') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="按揭满3个月以上" checked="checked" />按揭满3个月以上
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="按揭满3个月以上" />按揭满3个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'按揭满6个月以上') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="按揭满6个月以上" checked="checked" />按揭满6个月以上
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="按揭满6个月以上" />按揭满6个月以上
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseBuyType'],'按揭12个月以上') !== false){?> 
	 <input name="houseBuyType" type="checkbox" value="按揭12个月以上" checked="checked" />按揭12个月以上
<?php }else{?>
	 <input name="houseBuyType" type="checkbox" value="按揭12个月以上" />按揭12个月以上
<?php }?>

     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px;height: 20;   "><h1>房产信息:</h1></div>
  <li><label>
    	房产城市
   </label><cite>
    	<input type="hidden" name="houseCitys" id="houseCitys" value=""  /> 
    	
<?php if(strpos($list['houseCity'],'固原市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="全国" checked="checked" />全国
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="全国" />全国
<?php }?>
  
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'北京市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="北京市" checked="checked" />北京市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="北京市" />北京市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'广州市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="广州市" checked="checked" />广州市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="广州市" />广州市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'杭州市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="杭州市" checked="checked" />杭州市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="杭州市" />杭州市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'深圳市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="深圳市" checked="checked" />深圳市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="深圳市" />深圳市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'珠海市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="珠海市" checked="checked" />珠海市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="珠海市" />珠海市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'南京市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="南京市" checked="checked" />南京市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="南京市" />南京市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'南宁市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="南宁市" checked="checked" />南宁市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="南宁市" />南宁市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'武汉市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="武汉市" checked="checked" />武汉市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="武汉市" />武汉市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseCity'],'佛山市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="佛山市" checked="checked" />佛山市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="佛山市" />佛山市
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;

<?php if(strpos($list['houseCity'],'上海市') !== false){?> 
	 <input name="houseCity" type="checkbox" value="上海市" checked="checked" />上海市
<?php }else{?>
	 <input name="houseCity" type="checkbox" value="上海市" />上海市
<?php }?>

     </cite></li>
 
 <li><label>
    	房产类型
   </label><cite>
    	<input type="hidden" name="houseTypes" id="houseTypes" value=""  />
<?php if(strpos($list['houseType'],'商品房') !== false){?> 
	 <input name="houseType" type="checkbox" value="商品房" checked="checked" />商品房
<?php }else{?>
	 <input name="houseType" type="checkbox" value="商品房" />商品房
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseType'],'宅基地') !== false){?> 
	 <input name="houseType" type="checkbox" value="宅基地" checked="checked" />宅基地
<?php }else{?>
	 <input name="houseType" type="checkbox" value="宅基地" />宅基地
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseType'],'商品铺位') !== false){?> 
	 <input name="houseType" type="checkbox" value="商品铺位" checked="checked" />商品铺位
<?php }else{?>
	 <input name="houseType" type="checkbox" value="商品铺位" />商品铺位
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseType'],'商铺房') !== false){?> 
	 <input name="houseType" type="checkbox" value="商铺房" checked="checked" />商铺房
<?php }else{?>
	 <input name="houseType" type="checkbox" value="商铺房" />商铺房
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseType'],'别墅') !== false){?> 
	 <input name="houseType" type="checkbox" value="别墅" checked="checked" />别墅
<?php }else{?>
	 <input name="houseType" type="checkbox" value="别墅" />别墅
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseType'],'车位') !== false){?> 
	 <input name="houseType" type="checkbox" value="车位" checked="checked" />车位
<?php }else{?>
	 <input name="houseType" type="checkbox" value="车位" />车位
<?php }?>


     </cite></li>
     
     <li><label>
    	房产面积
   </label><cite>
    	<input type="hidden" name="houseAreas" id="houseAreas" value=""  /> 
    	
  <?php if(strpos($list['houseArea'],'60平以下') !== false){?> 
	 <input name="houseArea" type="checkbox" value="60平以下" checked="checked" />60平以下
<?php }else{?>
	 <input name="houseArea" type="checkbox" value="60平以下" />60平以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseArea'],'60~80平') !== false){?> 
	 <input name="houseArea" type="checkbox" value="60~80平" checked="checked" />60~80平
<?php }else{?>
	 <input name="houseArea" type="checkbox" value="60~80平" />60~80平
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseArea'],'80平以上') !== false){?> 
	 <input name="houseArea" type="checkbox" value="80平以上" checked="checked" />80平以上
<?php }else{?>
	 <input name="houseArea" type="checkbox" value="80平以上" />80平以上
<?php }?>


     </cite></li>
 
 
  <li><label>
    	房产估值
   </label><cite>
    	<input type="hidden" name="houseValues" id="houseValues" value=""  />  
    	
    	<?php if(strpos($list['houseValue'],'80万以下') !== false){?> 
	 <input name="houseValue" type="checkbox" value="80万以下" checked="checked" />80万以下
<?php }else{?>
	 <input name="houseValue" type="checkbox" value="80万以下" />80万以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseValue'],'80万~100万') !== false){?> 
	 <input name="houseValue" type="checkbox" value="80万~100万" checked="checked" />80万~100万
<?php }else{?>
	 <input name="houseValue" type="checkbox" value="80万~100万" />80万~100万
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['houseValue'],'100万以上') !== false){?> 
	 <input name="houseValue" type="checkbox" value="100万以上" checked="checked" />100万以上
<?php }else{?>
	 <input name="houseValue" type="checkbox" value="100万以上" />100万以上
<?php }?>


     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>汽车信息:</h1></div>
   <li><label>
    	汽车购置方式
   </label><cite>
    	<input type="hidden" name="vehicleBuyTypes" id="vehicleBuyTypes" value=""  />
    	
<?php if(strpos($list['vehicleBuyType'],'全款') !== false){?> 
	 <input name="vehicleBuyType" type="checkbox" value="全款" checked="checked" />全款
<?php }else{?>
	 <input name="vehicleBuyType" type="checkbox" value="全款" />全款
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleBuyType'],'按揭') !== false){?> 
	 <input name="vehicleBuyType" type="checkbox" value="按揭" checked="checked" />按揭
<?php }else{?>
	 <input name="vehicleBuyType" type="checkbox" value="按揭" />按揭
<?php }?>


     </cite></li>
 
 
    <li><label>
    	可接受车贷类型
   </label><cite>
    	<input type="hidden" name="vehicleLoanTypes" id="vehicleLoanTypes" value=""  />  
    	
    <?php if(strpos($list['vehicleLoanType'],'押证不押车') !== false){?> 
	 <input name="vehicleLoanType" type="checkbox" value="押证不押车" checked="checked" />押证不押车
<?php }else{?>
	 <input name="vehicleLoanType" type="checkbox" value="押证不押车" />押证不押车
<?php }?>	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleLoanType'],'不押证不押车') !== false){?> 
	 <input name="vehicleLoanType" type="checkbox" value="不押证不押车" checked="checked" />不押证不押车
<?php }else{?>
	 <input name="vehicleLoanType" type="checkbox" value="不押证不押车" />不押证不押车
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;

<?php if(strpos($list['vehicleLoanType'],'都可以') !== false){?> 
	 <input name="vehicleLoanType" type="checkbox" value="都可以" checked="checked" />都可以
<?php }else{?>
	 <input name="vehicleLoanType" type="checkbox" value="都可以" />都可以
<?php }?>

     </cite></li>
     
     <li><label>
    	车牌省
   </label><cite>
    	<input type="hidden" name="licensePlateProvinces" id="licensePlateProvinces" value=""  /> 
    	

<?php if(strpos($list['licensePlateProvince'],'新疆维吾尔自治区') !== false){?> 
	 <input name="licensePlateProvince" type="checkbox" value="全国" checked="checked" />全国
<?php }else{?>
	 <input name="licensePlateProvince" type="checkbox" value="全国" />全国
<?php }?>    	
	

&nbsp;&nbsp;&nbsp;&nbsp;

<?php if(strpos($list['licensePlateProvince'],'广东') !== false){?> 
	 <input name="licensePlateProvince" type="checkbox" value="广东" checked="checked" />广东
<?php }else{?>
	 <input name="licensePlateProvince" type="checkbox" value="广东" />广东
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;

<?php if(strpos($list['licensePlateProvince'],'浙江') !== false){?> 
	 <input name="licensePlateProvince" type="checkbox" value="浙江" checked="checked" />浙江
<?php }else{?>
	 <input name="licensePlateProvince" type="checkbox" value="浙江" />浙江
<?php }?>

     </cite></li>
         
    <li><label>
    	汽车用途
   </label><cite>
    	<input type="hidden" name="vehicleUses" id="vehicleUses" value=""  />
    	
<?php if(strpos($list['vehicleUse'],'运营车') !== false){?> 
	 <input name="vehicleUse" type="checkbox" value="运营车" checked="checked" />运营车
<?php }else{?>
	 <input name="vehicleUse" type="checkbox" value="运营车" />运营车
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleUse'],'自用车') !== false){?> 
	 <input name="vehicleUse" type="checkbox" value="自用车" checked="checked" />自用车
<?php }else{?>
	 <input name="vehicleUse" type="checkbox" value="自用车" />自用车
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleUse'],'非运营') !== false){?> 
	 <input name="vehicleUse" type="checkbox" value="非运营" checked="checked" />非运营
<?php }else{?>
	 <input name="vehicleUse" type="checkbox" value="非运营" />非运营
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleUse'],'商用车') !== false){?> 
	 <input name="vehicleUse" type="checkbox" value="商用车" checked="checked" />商用车
<?php }else{?>
	 <input name="vehicleUse" type="checkbox" value="商用车" />商用车
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleUse'],'其他') !== false){?> 
	 <input name="vehicleUse" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="vehicleUse" type="checkbox" value="其他" />其他
<?php }?>

     </cite></li>
     
    <li><label>
    	汽车价格
   </label><cite>
    	<input type="hidden" name="vehiclePrices" id="vehiclePrices" value=""  />
    	
<?php if(strpos($list['vehiclePrice'],'8万以下') !== false){?> 
	 <input name="vehiclePrice" type="checkbox" value="8万以下" checked="checked" />8万以下
<?php }else{?>
	 <input name="vehiclePrice" type="checkbox" value="8万以下" />8万以下
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehiclePrice'],'8~15万') !== false){?> 
	 <input name="vehiclePrice" type="checkbox" value="8~15万" checked="checked" />8~15万
<?php }else{?>
	 <input name="vehiclePrice" type="checkbox" value="8~15万" />8~15万
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehiclePrice'],'15万以上') !== false){?> 
	 <input name="vehiclePrice" type="checkbox" value="15万以上" checked="checked" />15万以上
<?php }else{?>
	 <input name="vehiclePrice" type="checkbox" value="15万以上" />15万以上
<?php }?>


     </cite></li>
     
     

     
     <li><label>
    	车龄
   </label><cite>
    	<input type="hidden" name="vehicleAges" id="vehicleAges" value=""  /> 
    	
<?php if(strpos($list['vehicleAge'],'半年内') !== false){?> 
	 <input name="vehicleAge" type="checkbox" value="半年内" checked="checked" />半年内
<?php }else{?>
	 <input name="vehicleAge" type="checkbox" value="半年内" />半年内
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleAge'],'半年~8年') !== false){?> 
	 <input name="vehicleAge" type="checkbox" value="半年~8年" checked="checked" />半年~8年
<?php }else{?>
	 <input name="vehicleAge" type="checkbox" value="半年~8年" />半年~8年
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleAge'],'8年以上') !== false){?> 
	 <input name="vehicleAge" type="checkbox" value="8年以上" checked="checked" />8年以上
<?php }else{?>
	 <input name="vehicleAge" type="checkbox" value="8年以上" />8年以上
<?php }?> 


     </cite></li>
     
    <li><label>
    	汽车保险
   </label><cite>
    	<input type="hidden" name="vehicleInsurances" id="vehicleInsurances" value=""  />  
    	
<?php if(strpos($list['vehicleInsurance'],'车主、车险投保人不同或不是本人') !== false){?> 
	 <input name="vehicleInsurance" type="checkbox" value="车主、车险投保人不同或不是本人" checked="checked" />车主、车险投保人不同或不是本人
<?php }else{?>
	 <input name="vehicleInsurance" type="checkbox" value="车主、车险投保人不同或不是本人" />车主、车险投保人不同或不是本人
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleInsurance'],'车主、车险投保人为本人') !== false){?> 
	 <input name="vehicleInsurance" type="checkbox" value="车主、车险投保人为本人" checked="checked" />车主、车险投保人为本人
<?php }else{?>
	 <input name="vehicleInsurance" type="checkbox" value="车主、车险投保人为本人" />车主、车险投保人为本人
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleInsurance'],'其他') !== false){?> 
	 <input name="vehicleInsurance" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="vehicleInsurance" type="checkbox" value="其他" />其他
<?php }?> 


     </cite></li>
     
      <li><label>
    	车险额度
   </label><cite>
    	<input type="hidden" name="vehicleInsuranceLimits" id="vehicleInsuranceLimits" value=""  />
    	
    	<?php if(strpos($list['vehicleInsuranceLimit'],'车险保额8万以下') !== false){?> 
	 <input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以下" checked="checked" />车险保额8万以下
<?php }else{?>
	 <input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以下" />车险保额8万以下
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['vehicleInsuranceLimit'],'车险保额8万以上') !== false){?> 
	 <input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以上" checked="checked" />车险保额8万以上
<?php }else{?>
	 <input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以上" />车险保额8万以上
<?php }?> 


     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>保单信息:</h1></div>
 
       <li><label>
    	保险公司
   </label><cite>
    	<input type="hidden" name="insuranceNames" id="insuranceNames" value=""  />    
    	<?php if(is_array($insurance) || $insurance instanceof \think\Collection || $insurance instanceof \think\Paginator): $i = 0; $__LIST__ = $insurance;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>   	
&nbsp;&nbsp;
<?php if(strpos($list['insuranceName'],$vo['name']) !== false){?>
<input name="insuranceName" type="checkbox" value="<?php echo $vo['name']; ?>" checked="checked" /><?php echo $vo['name']; }else{?>
	<input name="insuranceName" type="checkbox" value="<?php echo $vo['name']; ?>" /><?php echo $vo['name']; } ?>
&nbsp;&nbsp;
<?php endforeach; endif; else: echo "" ;endif; ?> 
     </cite></li>
 
 
    <li><label>
    	保单类型
   </label><cite>
    	<input type="hidden" name="insuranceTypes" id="insuranceTypes" value=""  /> 
<?php if(strpos($list['insuranceType'],'传统型') !== false){?> 
	 <input name="insuranceType" type="checkbox" value="传统型" checked="checked" />传统型
<?php }else{?>
	 <input name="insuranceType" type="checkbox" value="传统型" />传统型
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceType'],'分红型') !== false){?> 
	 <input name="insuranceType" type="checkbox" value="分红型" checked="checked" />分红型
<?php }else{?>
	 <input name="insuranceType" type="checkbox" value="分红型" />分红型
<?php }?> 
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceType'],'万能型') !== false){?> 
	 <input name="insuranceType" type="checkbox" value="万能型" checked="checked" />万能型
<?php }else{?>
	 <input name="insuranceType" type="checkbox" value="万能型" />万能型
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceType'],'其他') !== false){?> 
	 <input name="insuranceType" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="insuranceType" type="checkbox" value="其他" />其他
<?php }?> 

     </cite></li>
     
    <li><label>
    	保单有效时间
   </label><cite>
    	<input type="hidden" name="insuranceTimes" id="insuranceTimes" value=""  />   
    	
<?php if(strpos($list['insuranceTime'],'不足6个月') !== false){?> 
	 <input name="insuranceTime" type="checkbox" value="不足6个月" checked="checked" />不足6个月
<?php }else{?>
	 <input name="insuranceTime" type="checkbox" value="不足6个月" />不足6个月
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceTime'],'大于等于6个月') !== false){?> 
	 <input name="insuranceTime" type="checkbox" value="大于等于6个月" checked="checked" />大于等于6个月
<?php }else{?>
	 <input name="insuranceTime" type="checkbox" value="大于等于6个月" />大于等于6个月
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceTime'],'大于等于9个月') !== false){?> 
	 <input name="insuranceTime" type="checkbox" value="大于等于9个月" checked="checked" />大于等于9个月
<?php }else{?>
	 <input name="insuranceTime" type="checkbox" value="大于等于9个月" />大于等于9个月
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceTime'],'其他') !== false){?> 
	 <input name="insuranceTime" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="insuranceTime" type="checkbox" value="其他" />其他
<?php }?> 

     </cite></li>
     
    <li><label>
    	保单缴费方式
   </label><cite>
    	<input type="hidden" name="insurancePaymentMethods" id="insurancePaymentMethods" value=""  />    
    	
<?php if(strpos($list['insurancePaymentMethod'],'趸缴') !== false){?> 
	 <input name="insurancePaymentMethod" type="checkbox" value="趸缴" checked="checked" />趸缴
<?php }else{?>
	 <input name="insurancePaymentMethod" type="checkbox" value="趸缴" />趸缴
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;

<?php if(strpos($list['insurancePaymentMethod'],'年缴') !== false){?> 
	 <input name="insurancePaymentMethod" type="checkbox" value="年缴" checked="checked" />年缴
<?php }else{?>
	 <input name="insurancePaymentMethod" type="checkbox" value="年缴" />年缴
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePaymentMethod'],'季度缴') !== false){?> 
	 <input name="insurancePaymentMethod" type="checkbox" value="季度缴" checked="checked" />季度缴
<?php }else{?>
	 <input name="insurancePaymentMethod" type="checkbox" value="季度缴" />季度缴
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePaymentMethod'],'月缴') !== false){?> 
	 <input name="insurancePaymentMethod" type="checkbox" value="月缴" checked="checked" />月缴
<?php }else{?>
	 <input name="insurancePaymentMethod" type="checkbox" value="月缴" />月缴
<?php }?> 

     </cite></li>

    <li><label>
    	保单已缴费年限
   </label><cite>
    <input type="hidden" name="insuranceAgeLimits" id="insuranceAgeLimits" value=""  /> 
    
<?php if(strpos($list['insuranceAgeLimit'],'1年') !== false){?> 
	 <input name="insuranceAgeLimit" type="checkbox" value="1年" checked="checked" />1年
<?php }else{?>
	 <input name="insuranceAgeLimit" type="checkbox" value="1年" />1年
<?php }?>     

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceAgeLimit'],'2年') !== false){?> 
	 <input name="insuranceAgeLimit" type="checkbox" value="2年" checked="checked" />2年
<?php }else{?>
	 <input name="insuranceAgeLimit" type="checkbox" value="2年" />2年
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceAgeLimit'],'3年') !== false){?> 
	 <input name="insuranceAgeLimit" type="checkbox" value="3年" checked="checked" />3年
<?php }else{?>
	 <input name="insuranceAgeLimit" type="checkbox" value="3年" />3年
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insuranceAgeLimit'],'3年以上') !== false){?> 
	 <input name="insuranceAgeLimit" type="checkbox" value="3年以上" checked="checked" />3年以上
<?php }else{?>
	 <input name="insuranceAgeLimit" type="checkbox" value="3年以上" />3年以上
<?php }?> 

     </cite></li>
     
         <li><label>
保单单次缴费
   </label><cite>
    	<input type="hidden" name="insurancePrices" id="insurancePrices" value=""  />  
    	
<?php if(strpos($list['insurancePrice'],'月缴≥200元') !== false){?> 
	 <input name="insurancePrice" type="checkbox" value="月缴≥200元" checked="checked" />月缴≥200元
<?php }else{?>
	 <input name="insurancePrice" type="checkbox" value="月缴≥200元" />月缴≥200元
<?php }?>     	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePrice'],'月缴≥300元') !== false){?> 
	 <input name="insurancePrice" type="checkbox" value="月缴≥300元" checked="checked" />月缴≥300元
<?php }else{?>
	 <input name="insurancePrice" type="checkbox" value="月缴≥300元" />月缴≥300元
<?php }?> 


&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePrice'],'月缴≥500元') !== false){?> 
	 <input name="insurancePrice" type="checkbox" value="月缴≥500元" checked="checked" />月缴≥500元
<?php }else{?>
	 <input name="insurancePrice" type="checkbox" value="月缴≥500元" />月缴≥500元
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePrice'],'年缴≥2400元') !== false){?> 
	 <input name="insurancePrice" type="checkbox" value="年缴≥2400元" checked="checked" />年缴≥2400元
<?php }else{?>
	 <input name="insurancePrice" type="checkbox" value="年缴≥2400元" />年缴≥2400元
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['insurancePrice'],'其他') !== false){?> 
	 <input name="insurancePrice" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="insurancePrice" type="checkbox" value="其他" />其他
<?php }?> 

     </cite></li>

 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>个人企业信用:</h1></div>
 
    <li><label>
    	个人或企业流水
   </label><cite>
    	<input type="hidden" name="incomes" id="incomes" value=""  />
    	
    	<?php if(strpos($list['income'],'代发2000以上') !== false){?> 
	 <input name="income" type="checkbox" value="代发2000以上" checked="checked" />代发2000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="代发2000以上" />代发2000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'代发3000以上') !== false){?> 
	 <input name="income" type="checkbox" value="代发3000以上" checked="checked" />代发3000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="代发3000以上" />代发3000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'代发5000以上') !== false){?> 
	 <input name="income" type="checkbox" value="代发5000以上" checked="checked" />代发5000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="代发5000以上" />代发5000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'代发8000以上') !== false){?> 
	 <input name="income" type="checkbox" value="代发8000以上" checked="checked" />代发8000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="代发8000以上" />代发8000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'现金3000以上') !== false){?> 
	 <input name="income" type="checkbox" value="现金3000以上" checked="checked" />现金3000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="现金3000以上" />现金3000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'现金5000以上') !== false){?> 
	 <input name="income" type="checkbox" value="现金5000以上" checked="checked" />现金5000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="现金5000以上" />现金5000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'现金8000以上') !== false){?> 
	 <input name="income" type="checkbox" value="现金8000以上" checked="checked" />现金8000以上
<?php }else{?>
	 <input name="income" type="checkbox" value="现金8000以上" />现金8000以上
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'月流水10万以内') !== false){?> 
	 <input name="income" type="checkbox" value="月流水10万以内" checked="checked" />月流水10万以内
<?php }else{?>
	 <input name="income" type="checkbox" value="月流水10万以内" />月流水10万以内
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'月流水10万~50万') !== false){?> 
	 <input name="income" type="checkbox" value="月流水10万~50万" checked="checked" />月流水10万~50万
<?php }else{?>
	 <input name="income" type="checkbox" value="月流水10万~50万" />月流水10万~50万
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['income'],'月流水50万以上') !== false){?> 
	 <input name="income" type="checkbox" value="月流水50万以上" checked="checked" />月流水50万以上
<?php }else{?>
	 <input name="income" type="checkbox" value="月流水50万以上" />月流水50万以上
<?php }?> 

     </cite></li>
 
 
     <li><label>
    	拥有个人公司
   </label><cite>
    	<input type="hidden" name="companys" id="companys" value=""  />  
    	
<?php if(strpos($list['company'],'无') !== false){?> 
	 <input name="company" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="company" type="checkbox" value="无" />无
<?php }?>     	

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['company'],'法人是自己营业执照满一年') !== false){?> 
	 <input name="company" type="checkbox" value="法人是自己营业执照满一年" checked="checked" />法人是自己营业执照满一年
<?php }else{?>
	 <input name="company" type="checkbox" value="法人是自己营业执照满一年" />法人是自己营业执照满一年
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['company'],'法人是自己营业执照未满一年') !== false){?> 
	 <input name="company" type="checkbox" value="法人是自己营业执照未满一年" checked="checked" />法人是自己营业执照未满一年
<?php }else{?>
	 <input name="company" type="checkbox" value="法人是自己营业执照未满一年" />法人是自己营业执照未满一年
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['company'],'股东且营业执照满一年') !== false){?> 
	 <input name="company" type="checkbox" value="股东且营业执照满一年" checked="checked" />股东且营业执照满一年
<?php }else{?>
	 <input name="company" type="checkbox" value="股东且营业执照满一年" />股东且营业执照满一年
<?php }?> 


&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(strpos($list['company'],'股东且营业执照未满一年') !== false){?> 
	 <input name="company" type="checkbox" value="股东且营业执照未满一年" checked="checked" />股东且营业执照未满一年
<?php }else{?>
	 <input name="company" type="checkbox" value="股东且营业执照未满一年" />股东且营业执照未满一年
<?php }?> 

     </cite></li>
     
    <li><label>
    	个税缴纳情况
   </label><cite>
    	<input type="hidden" name="taxs" id="taxs" value=""  />   
    	
 <?php if(strpos($list['tax'],'无') !== false){?> 
	 <input name="tax" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="tax" type="checkbox" value="无" />无
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;

 <?php if(strpos($list['tax'],'连续申报缴纳不足12个月') !== false){?> 
	 <input name="tax" type="checkbox" value="连续申报缴纳不足12个月" checked="checked" />连续申报缴纳不足12个月
<?php }else{?>
	 <input name="tax" type="checkbox" value="连续申报缴纳不足12个月" />连续申报缴纳不足12个月
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['tax'],'连续申报缴纳12个月以内') !== false){?> 
	 <input name="tax" type="checkbox" value="连续申报缴纳12个月以内" checked="checked" />连续申报缴纳12个月以内
<?php }else{?>
	 <input name="tax" type="checkbox" value="连续申报缴纳12个月以内" />连续申报缴纳12个月以内
<?php }?> 

&nbsp;&nbsp;&nbsp;&nbsp;

 <?php if(strpos($list['tax'],'连续申报缴纳12个月以上且近2月内有缴') !== false){?> 
	 <input name="tax" type="checkbox" value="连续申报缴纳12个月以上且近2月内有缴" checked="checked" />连续申报缴纳12个月以上且近2月内有缴
<?php }else{?>
	 <input name="tax" type="checkbox" value="连续申报缴纳12个月以上且近2月内有缴" />连续申报缴纳12个月以上且近2月内有缴
<?php }?> 

     </cite></li>
     
    <li><label>
    	工龄
   </label><cite>
    	<input type="hidden" name="senioritys" id="senioritys" value=""  />  
    	
  <?php if(strpos($list['seniority'],'现职工作6个月以上') !== false){?> 
	 <input name="seniority" type="checkbox" value="现职工作6个月以上" checked="checked" />现职工作6个月以上
<?php }else{?>
	 <input name="seniority" type="checkbox" value="现职工作6个月以上" />现职工作6个月以上
<?php }?>
	

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['seniority'],'现职工作不足6个月') !== false){?> 
	 <input name="seniority" type="checkbox" value="现职工作不足6个月" checked="checked" />现职工作不足6个月
<?php }else{?>
	 <input name="seniority" type="checkbox" value="现职工作不足6个月" />现职工作不足6个月
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['seniority'],'其他') !== false){?> 
	 <input name="seniority" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="seniority" type="checkbox" value="其他" />其他
<?php }?>


     </cite></li>
     
    <li><label>
    	信用卡总额度
   </label><cite>
    	<input type="hidden" name="creditLimits" id="creditLimits" value=""  />  
    	
    	
<?php if(strpos($list['creditLimit'],'无信用卡') !== false){?> 
	 <input name="creditLimit" type="checkbox" value="无信用卡" checked="checked" />无信用卡
<?php }else{?>
	 <input name="creditLimit" type="checkbox" value="无信用卡" />无信用卡
<?php }?>  	

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['creditLimit'],'10万以下') !== false){?> 
	 <input name="creditLimit" type="checkbox" value="10万以下" checked="checked" />10万以下
<?php }else{?>
	 <input name="creditLimit" type="checkbox" value="10万以下" />10万以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['creditLimit'],'10万以上') !== false){?> 
	 <input name="creditLimit" type="checkbox" value="10万以上" checked="checked" />10万以上
<?php }else{?>
	 <input name="creditLimit" type="checkbox" value="10万以上" />10万以上
<?php }?>


     </cite></li>
     
   	<li><label>
    	芝麻信用
   </label><cite>
    	<input type="hidden" name="zhimaCredits" id="zhimaCredits" value=""  />   
    	
 <?php if(strpos($list['zhimaCredit'],'无') !== false){?> 
	 <input name="zhimaCredit" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="zhimaCredit" type="checkbox" value="无" />无
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['zhimaCredit'],'600以下') !== false){?> 
	 <input name="zhimaCredit" type="checkbox" value="600以下" checked="checked" />600以下
<?php }else{?>
	 <input name="zhimaCredit" type="checkbox" value="600以下" />600以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['zhimaCredit'],'600~680') !== false){?> 
	 <input name="zhimaCredit" type="checkbox" value="600~680" checked="checked" />600~680
<?php }else{?>
	 <input name="zhimaCredit" type="checkbox" value="600~680" />600~680
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['zhimaCredit'],'680~750') !== false){?> 
	 <input name="zhimaCredit" type="checkbox" value="680~750" checked="checked" />680~750
<?php }else{?>
	 <input name="zhimaCredit" type="checkbox" value="680~750" />680~750
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['zhimaCredit'],'750以上') !== false){?> 
	 <input name="zhimaCredit" type="checkbox" value="750以上" checked="checked" />750以上
<?php }else{?>
	 <input name="zhimaCredit" type="checkbox" value="750以上" />750以上
<?php }?>


     </cite></li>
     
    <li><label>
    	微粒贷
   </label><cite>
    	<input type="hidden" name="tinyGrainLoans" id="tinyGrainLoans" value=""  />
    	
 <?php if(strpos($list['tinyGrainLoan'],'无') !== false){?> 
	 <input name="tinyGrainLoan" type="checkbox" value="无" checked="checked" />无
<?php }else{?>
	 <input name="tinyGrainLoan" type="checkbox" value="无" />无
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['tinyGrainLoan'],'8000元以下') !== false){?> 
	 <input name="tinyGrainLoan" type="checkbox" value="8000元以下" checked="checked" />8000元以下
<?php }else{?>
	 <input name="tinyGrainLoan" type="checkbox" value="8000元以下" />8000元以下
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['tinyGrainLoan'],'8000~10000元') !== false){?> 
	 <input name="tinyGrainLoan" type="checkbox" value="8000~10000元" checked="checked" />8000~10000元
<?php }else{?>
	 <input name="tinyGrainLoan" type="checkbox" value="8000~10000元" />8000~10000元
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['tinyGrainLoan'],'10000元以上') !== false){?> 
	 <input name="tinyGrainLoan" type="checkbox" value="10000元以上" checked="checked" />10000元以上
<?php }else{?>
	 <input name="tinyGrainLoan" type="checkbox" value="10000元以上" />10000元以上
<?php }?>


     </cite></li>
     
    <li><label>
    	学历
   </label><cite>
    	<input type="hidden" name="educations" id="educations" value=""  /> 
    	
    	
 <?php if(strpos($list['education'],'专科') !== false){?> 
	 <input name="education" type="checkbox" value="专科" checked="checked" />专科
<?php }else{?>
	 <input name="education" type="checkbox" value="专科" />专科
<?php }?>    	

&nbsp;&nbsp;&nbsp;&nbsp;

 <?php if(strpos($list['education'],'非全日制本科') !== false){?> 
	 <input name="education" type="checkbox" value="非全日制本科" checked="checked" />非全日制本科
<?php }else{?>
	 <input name="education" type="checkbox" value="非全日制本科" />非全日制本科
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['education'],'全日制本科') !== false){?> 
	 <input name="education" type="checkbox" value="全日制本科" checked="checked" />全日制本科
<?php }else{?>
	 <input name="education" type="checkbox" value="全日制本科" />全日制本科
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['education'],'研究生') !== false){?> 
	 <input name="education" type="checkbox" value="研究生" checked="checked" />研究生
<?php }else{?>
	 <input name="education" type="checkbox" value="研究生" />研究生
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['education'],'博士') !== false){?> 
	 <input name="education" type="checkbox" value="博士" checked="checked" />博士
<?php }else{?>
	 <input name="education" type="checkbox" value="博士" />博士
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;
 <?php if(strpos($list['education'],'其他') !== false){?> 
	 <input name="education" type="checkbox" value="其他" checked="checked" />其他
<?php }else{?>
	 <input name="education" type="checkbox" value="其他" />其他
<?php }?>


     </cite></li>


    <li><label>&nbsp;</label><input name="" type="button" id="btn" value="确认保存" style="padding: 10px 20px 10px 20px;  background: #DC4E00; color: #F0F0EE;"/></li>
    

    </ul>
    
    </form>
    
    </div>


</body>

<script src="http://www.jq22.com/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">window.onload = function() {

		var arr = new Array();
		var arr1 = new Array();
		var arr2 = new Array();
		var arr3 = new Array();
		var arr4 = new Array();
		var arr5 = new Array();
		var arr6 = new Array();
		var arr7 = new Array();
		var arr8 = new Array();
		var arr9 = new Array();
		var arr10 = new Array();
		var arr11 = new Array();
		var arr12 = new Array();
		var arr13 = new Array();
		var arr14 = new Array();
		var arr15 = new Array();
		var arr16 = new Array();
		var arr17 = new Array();
		var arr18 = new Array();
		var arr19 = new Array();
		var arr20 = new Array();
		var arr21 = new Array();
		var arr22 = new Array();
		var arr23 = new Array();
		var arr24 = new Array();
		var arr25 = new Array();
		var arr26 = new Array();
		var arr27 = new Array();
		var arr28 = new Array();
		var arr29 = new Array();
		var arr30 = new Array();
		var arr31 = new Array();
		var arr32 = new Array();
		var arr33 = new Array();
		var arr34 = new Array();
		var arr35 = new Array();
		var arr36 = new Array();
		var arr37 = new Array();
		var arr38 = new Array();
		var arr39 = new Array();
		var arr40 = new Array();
		var arr41 = new Array();
		var arr42 = new Array();
		var arr43 = new Array();
		var arr44 = new Array();
		var arr45 = new Array();
		var arr46 = new Array();
		var arr47 = new Array();
		var arr48 = new Array();
		var arr49 = new Array();
		var arr50 = new Array();
		var arr51 = new Array();
		var arr52 = new Array();
		var arr53 = new Array();
		var arr54 = new Array();
		var arr55 = new Array();
		var arr56 = new Array();
		var arr57 = new Array();
		var arr58 = new Array();
		var arr59 = new Array();
		var arr60 = new Array();
		var arr61 = new Array();
		var arr62 = new Array();
		var arr63 = new Array();
		var arr64 = new Array();
		var arr65 = new Array();
		var arr66 = new Array();
		var arr67 = new Array();
		var arr68 = new Array();
		var arr69 = new Array();
		var arr70 = new Array();
		var arr71 = new Array();


		var btnObj = document.getElementById("btn");
                btnObj.onclick = function() {
              
                 
 				//性别	
 				var sex = document.getElementsByName("sex");
                   for (var i = 0; i < sex.length; i++) {
                        if (sex[i].checked) {
                            arr1.push(sex[i].value);
                        }
                   }
                   document.getElementById("sexs").value = arr1.join(" | ");
                   
                   
 				//`profession` text NOT NULL COMMENT '职业',

                 
                   //职业	
 				var profession = document.getElementsByName("profession");
                   for (var i = 0; i < profession.length; i++) {
                        if (profession[i].checked) {
                            arr3.push(profession[i].value);
                        }
                   }
                document.getElementById("professions").value = arr3.join(" | ");
                   
                   
//`credit` text NOT NULL COMMENT '征信查询',

                   
                   //征信查询	
 				var credit = document.getElementsByName("credit");
                   for (var i = 0; i < credit.length; i++) {
                        if (credit[i].checked) {
                            arr5.push(credit[i].value);
                        }
                   }
                   document.getElementById("credits").value = arr5.join(" | ");
                   
 //`liabilities` text NOT NULL COMMENT '个人负债',
                  

                   
                   //个人负债	
 				var liabilities = document.getElementsByName("liabilities");
                   for (var i = 0; i < liabilities.length; i++) {
                        if (liabilities[i].checked) {
                            arr7.push(liabilities[i].value);
                        }
                   }
                   document.getElementById("liabilitiess").value = arr7.join(" | ");
                   

                   
//`socialSecurity` text NOT NULL COMMENT '社保',  

                   
                   
                   //社保	
 				var socialSecurity = document.getElementsByName("socialSecurity");
                   for (var i = 0; i < socialSecurity.length; i++) {
                        if (socialSecurity[i].checked) {
                            arr11.push(socialSecurity[i].value);
                        }
                   }
                   document.getElementById("socialSecuritys").value = arr11.join(" | ");
                   
 //`socialSecurityBasics` text NOT NULL COMMENT '社保基数',

                   
                   //社保基数	
 				var socialSecurityBasics = document.getElementsByName("socialSecurityBasics");
                   for (var i = 0; i < socialSecurityBasics.length; i++) {
                        if (socialSecurityBasics[i].checked) {
                            arr13.push(socialSecurityBasics[i].value);
                        }
                   }
                   document.getElementById("socialSecurityBasicss").value = arr13.join(" | ");
                   
//`accumulationFund` text NOT NULL COMMENT '公积金',
                     

                   
                   
                   //公积金	
 				var accumulationFund = document.getElementsByName("accumulationFund");
                   for (var i = 0; i < accumulationFund.length; i++) {
                        if (accumulationFund[i].checked) {
                            arr15.push(accumulationFund[i].value);
                        }
                   }
                   document.getElementById("accumulationFunds").value = arr15.join(" | ");
                   
//`accumulationFundBasics` text NOT NULL COMMENT '公积金基数',

                   
                   
                   //公积金基数	
 				var accumulationFundBasics = document.getElementsByName("accumulationFundBasics");
                   for (var i = 0; i < accumulationFundBasics.length; i++) {
                        if (accumulationFundBasics[i].checked) {
                            arr17.push(accumulationFundBasics[i].value);
                        }
                   }
                   document.getElementById("accumulationFundBasicss").value = arr17.join(" | ");
                   
  //`houseBuyType` text NOT NULL COMMENT '房产购置方式',                 

 				//房产购置方式	
 				var houseBuyType = document.getElementsByName("houseBuyType");
                   for (var i = 0; i < houseBuyType.length; i++) {
                        if (houseBuyType[i].checked) {
                            arr19.push(houseBuyType[i].value);
                        }
                   }
                   document.getElementById("houseBuyTypes").value = arr19.join(" | ");
 				



//`houseCity` text NOT NULL COMMENT '房产城市',

                   //房产城市	
 				var houseCity = document.getElementsByName("houseCity");
                   for (var i = 0; i < houseCity.length; i++) {
                        if (houseCity[i].checked) {
                            arr21.push(houseCity[i].value);
                        }
                   }
                   document.getElementById("houseCitys").value = arr21.join(" | ");
                  
//`houseArea` text NOT NULL COMMENT '房产面积',

                   //房产面积	
 				var houseArea = document.getElementsByName("houseArea");
                   for (var i = 0; i < houseArea.length; i++) {
                        if (houseArea[i].checked) {
                            arr23.push(houseArea[i].value);
                        }
                   }
                   document.getElementById("houseAreas").value = arr23.join(" | ");
                   
//`houseValue` text NOT NULL COMMENT '房产估值',

                   //房产估值	
 				var houseValue = document.getElementsByName("houseValue");
                   for (var i = 0; i < houseValue.length; i++) {
                        if (houseValue[i].checked) {
                            arr25.push(houseValue[i].value);
                        }
                   }
                   document.getElementById("houseValues").value = arr25.join(" | ");
//`houseType` text NOT NULL COMMENT '房产类型',

                   //房产类型	
 				var houseType = document.getElementsByName("houseType");
                   for (var i = 0; i < houseType.length; i++) {
                        if (houseType[i].checked) {
                            arr27.push(houseType[i].value);
                        }
                   }
                   document.getElementById("houseTypes").value = arr27.join(" | ");
//`vehicleBuyType` text NOT NULL COMMENT '汽车购置方式',

                   //汽车购置方式	
 				var vehicleBuyType = document.getElementsByName("vehicleBuyType");
                   for (var i = 0; i < vehicleBuyType.length; i++) {
                        if (vehicleBuyType[i].checked) {
                            arr29.push(vehicleBuyType[i].value);
                        }
                   }
                   document.getElementById("vehicleBuyTypes").value = arr29.join(" | ");
//`vehicleLoanType` text NOT NULL COMMENT '可接受车贷类型'

                   //可接受车贷类型	
 				var vehicleLoanType = document.getElementsByName("vehicleLoanType");
                   for (var i = 0; i < vehicleLoanType.length; i++) {
                        if (vehicleLoanType[i].checked) {
                            arr31.push(vehicleLoanType[i].value);
                        }
                   }
                   document.getElementById("vehicleLoanTypes").value = arr31.join(" | ");
//`licensePlateProvince` text NOT NULL COMMENT '车牌省',
                   //车牌省	
 				var licensePlateProvince = document.getElementsByName("licensePlateProvince");
                   for (var i = 0; i < licensePlateProvince.length; i++) {
                        if (licensePlateProvince[i].checked) {
                            arr33.push(licensePlateProvince[i].value);
                        }
                   }
                   document.getElementById("licensePlateProvinces").value = arr33.join(" | ");
//`vehicleUse` text NOT NULL COMMENT '汽车用途',
                   //汽车用途	
 				var vehicleUse = document.getElementsByName("vehicleUse");
                   for (var i = 0; i < vehicleUse.length; i++) {
                        if (vehicleUse[i].checked) {
                            arr35.push(vehicleUse[i].value);
                        }
                   }
                   document.getElementById("vehicleUses").value = arr35.join(" | ");
//`vehiclePrice` text NOT NULL COMMENT '汽车价格',
                   //汽车价格	
 				var vehiclePrice = document.getElementsByName("vehiclePrice");
                   for (var i = 0; i < vehiclePrice.length; i++) {
                        if (vehiclePrice[i].checked) {
                            arr37.push(vehiclePrice[i].value);
                        }
                   }
                   document.getElementById("vehiclePrices").value = arr37.join(" | ");
//`vehicleAge` text NOT NULL COMMENT '车龄',
                   //车龄	
 				var vehicleAge = document.getElementsByName("vehicleAge");
                   for (var i = 0; i < vehicleAge.length; i++) {
                        if (vehicleAge[i].checked) {
                            arr39.push(vehicleAge[i].value);
                        }
                   }
                  
                   document.getElementById("vehicleAges").value = arr39.join(" | ");
//`vehicleInsurance` text NOT NULL COMMENT '汽车保险',
                   //汽车保险	
 				var vehicleInsurance = document.getElementsByName("vehicleInsurance");
                   for (var i = 0; i < vehicleInsurance.length; i++) {
                        if (vehicleInsurance[i].checked) {
                            arr41.push(vehicleInsurance[i].value);
                        }
                   }
                   document.getElementById("vehicleInsurances").value = arr41.join(" | ");
//`vehicleInsuranceLimit` text NOT NULL COMMENT '车险额度',

                   //车险额度	
 			var vehicleInsuranceLimit = document.getElementsByName("vehicleInsuranceLimit");
                   for (var i = 0; i < vehicleInsuranceLimit.length; i++) {
                        if (vehicleInsuranceLimit[i].checked) {
                            arr43.push(vehicleInsuranceLimit[i].value);
                        }
                   }
                   document.getElementById("vehicleInsuranceLimits").value = arr43.join(" | ");
//`insuranceName` text NOT NULL COMMENT '保险公司',
                   //保险公司	
 				var insuranceName = document.getElementsByName("insuranceName");
                   for (var i = 0; i < insuranceName.length; i++) {
                        if (insuranceName[i].checked) {
                            arr45.push(insuranceName[i].value);
                        }
                   }
                   document.getElementById("insuranceNames").value = arr45.join(" | ");
//`insuranceType` text NOT NULL COMMENT '保单类型',
                   //保单类型	
 				var insuranceType = document.getElementsByName("insuranceType");
                   for (var i = 0; i < insuranceType.length; i++) {
                        if (insuranceType[i].checked) {
                            arr47.push(insuranceType[i].value);
                        }
                   }
                   document.getElementById("insuranceTypes").value = arr47.join(" | ");

//`insuranceTime` text NOT NULL COMMENT '保单有效时间',
                   //保单有效时间	
 				var insuranceTime = document.getElementsByName("insuranceTime");
                   for (var i = 0; i < insuranceTime.length; i++) {
                        if (insuranceTime[i].checked) {
                            arr49.push(insuranceTime[i].value);
                        }
                   }
                   document.getElementById("insuranceTimes").value = arr49.join(" | ");
//`insurancePaymentMethod` text NOT NULL COMMENT '保单缴费方式',
                   //保单缴费方式	
 				var insurancePaymentMethod = document.getElementsByName("insurancePaymentMethod");
                   for (var i = 0; i < insurancePaymentMethod.length; i++) {
                        if (insurancePaymentMethod[i].checked) {
                            arr50.push(insurancePaymentMethod[i].value);
                        }
                   }
                   document.getElementById("insurancePaymentMethods").value = arr50.join(" | ");
//`insuranceAgeLimit` text NOT NULL COMMENT '保单已缴费年限',
                   //保单已缴费年限	
 				var insuranceAgeLimit = document.getElementsByName("insuranceAgeLimit");
                   for (var i = 0; i < insuranceAgeLimit.length; i++) {
                        if (insuranceAgeLimit[i].checked) {
                            arr52.push(insuranceAgeLimit[i].value);
                        }
                   }
                   document.getElementById("insuranceAgeLimits").value = arr52.join(" | ");
//`insurancePrice` text NOT NULL COMMENT '保单单次缴费',
                   //保单单次缴费	
 				var insurancePrice = document.getElementsByName("insurancePrice");
                   for (var i = 0; i < insurancePrice.length; i++) {
                        if (insurancePrice[i].checked) {
                            arr54.push(insurancePrice[i].value);
                        }
                   }
                   document.getElementById("insurancePrices").value = arr54.join(" | ");
//`income` text NOT NULL COMMENT '个人或企业流水',
                   //个人或企业流水	
 				var income = document.getElementsByName("income");
                   for (var i = 0; i < income.length; i++) {
                        if (income[i].checked) {
                            arr56.push(income[i].value);
                        }
                   }
                   document.getElementById("incomes").value = arr56.join(" | ");
//`company` text NOT NULL COMMENT '公司',
                   //公司	
 				var company = document.getElementsByName("company");
                   for (var i = 0; i < company.length; i++) {
                        if (company[i].checked) {
                            arr58.push(company[i].value);
                        }
                   }
                   document.getElementById("companys").value = arr58.join(" | ");
//`tax` text NOT NULL COMMENT '个税缴纳情况',
                   //个税缴纳情况	
 				var tax = document.getElementsByName("tax");
                   for (var i = 0; i < tax.length; i++) {
                        if (tax[i].checked) {
                            arr60.push(tax[i].value);
                        }
                   }
                   document.getElementById("taxs").value = arr60.join(" | ");
//`seniority` text NOT NULL COMMENT '工龄',
                   //工龄	
 				var seniority = document.getElementsByName("seniority");
                   for (var i = 0; i < seniority.length; i++) {
                        if (seniority[i].checked) {
                            arr62.push(seniority[i].value);
                        }
                   }
                   document.getElementById("senioritys").value = arr62.join(" | ");
//`creditLimit` text NOT NULL COMMENT '信用卡总额度',

                   //信用卡总额度	
 				var creditLimit = document.getElementsByName("creditLimit");
                   for (var i = 0; i < creditLimit.length; i++) {
                        if (creditLimit[i].checked) {
                            arr64.push(creditLimit[i].value);
                        }
                   }
                   document.getElementById("creditLimits").value = arr64.join(" | ");
//`zhimaCredit` text NOT NULL COMMENT '芝麻信用',

                   //芝麻信用	
 				var zhimaCredit = document.getElementsByName("zhimaCredit");
                   for (var i = 0; i < zhimaCredit.length; i++) {
                        if (zhimaCredit[i].checked) {
                            arr66.push(zhimaCredit[i].value);
                        }
                   }
                   document.getElementById("zhimaCredits").value = arr66.join(" | ");
//`tinyGrainLoan` text NOT NULL COMMENT '微粒贷',

                   //微粒贷	
 				var tinyGrainLoan = document.getElementsByName("tinyGrainLoan");
                   for (var i = 0; i < tinyGrainLoan.length; i++) {
                        if (tinyGrainLoan[i].checked) {
                            arr68.push(tinyGrainLoan[i].value);
                        }
                   }
                   document.getElementById("tinyGrainLoans").value = arr68.join(" | ");
//`education` text NOT NULL COMMENT '学历',

                   //学历	
 				var education = document.getElementsByName("education");
                   for (var i = 0; i < education.length; i++) {
                        if (education[i].checked) {
                            arr70.push(education[i].value);
                        }
                   }
                   document.getElementById("educations").value = arr70.join(" | ");

var form = document.getElementById('test_form');
//再次修改input内容

form.submit();

                };
 					    
                    
                
            };
</script>
</html>
