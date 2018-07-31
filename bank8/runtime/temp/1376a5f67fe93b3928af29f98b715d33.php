<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/good/upd.html";i:1533002268;}*/ ?>
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
    	<a href="updsdd?id=<?php echo $lists['good_id']; ?>" style="margin-left: 200px;"><input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #008800;" type="button" name="" id="" value="新条件设置" /></a>
    	<a href="upds?id=<?php echo $lists['good_id']; ?>" style="margin-left: 5px;"><input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #0188FB;" type="button" name="" id="" value="条件设置" /></a>
    <input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #DC4E00;" type='button' name='Submit' onclick='javascript:history.back(-1);margin-left: 200px;' value='返回'>
    </span></div>
   
    <form action="upd" method="post">

<input type="hidden" name="good_id" id="good_id" value="<?php echo $lists['good_id']; ?>" />
    <ul class="forminfo">
    <li><label>产品名</label><input name="goodName"value="<?php echo $lists['goodName']; ?>" type="text" class="dfinput" /></li>
  
    <li><label>额度</label><input name="limit" value="<?php echo $lists['limit']; ?>" type="text" class="dfinput" /></li>
    <li><label>期数</label><input name="agelimit" value="<?php echo $lists['agelimit']; ?>" type="text" class="dfinput"/></li>
    <li><label>利率</label><input name="accrual" value="<?php echo $lists['accrual']; ?>" type="text" class="dfinput"/></li>
 	<li><label>人气</label><input name="popularity" type="text" class="dfinput" value="<?php echo $lists['popularity']; ?>" /><i>（申请人数）<i></li>
    <li><label>最高额度（万）</label><input name="maxLimit" type="text" class="dfinput"value="<?php echo $lists['maxLimit']; ?>"/></li>
    <li><label>成功率（%）</label><input name="successRate" type="text" class="dfinput"value="<?php echo $lists['successRate']; ?>"/></li>
 
 
    <li><label >所属银行</label><cite>
    	<select name="bankid" class="dfinput" >
    		<option value="<?php echo $lists['bankid']; ?>"><?php echo $lists['city']; ?>|<?php echo $lists['bankname']; ?></option>
    		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $vo['b_id']; ?>"><?php echo $vo['city']; ?>|<?php echo $vo['bankname']; ?></option>
			   <?php endforeach; endif; else: echo "" ;endif; ?>   
		</select>
    </cite></li>
    
     <li><label>贷款类型</label><cite>
     	<?php if($lists['goodtype']==1){?>
    	<input name="goodtype" type="radio" value="1" checked="checked" />房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  />公积金信用
    	 <?php }elseif($lists['goodtype']==2){?>
    	<input name="goodtype" type="radio" value="1" />房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2" checked="checked"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  />公积金信用
    	 <?php }elseif($lists['goodtype']==3){?>
    	<input name="goodtype" type="radio" value="1" />房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3" checked="checked"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  />公积金信用
    	 <?php }elseif($lists['goodtype']==4){?>
    	<input name="goodtype" type="radio" value="1" />房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4" checked="checked"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  />公积金信用
    	 <?php }elseif($lists['goodtype']==5){?>
    	<input name="goodtype" type="radio" value="1"/>房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  checked="checked"  />公积金信用
    	 <?php }?>

    </cite></li>

    <li><label>产品热度</label><cite>
    	<?php if($lists['hot']==0){?>
    	<input name="hot" type="radio" value="0" checked="checked" />普通
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="1"  />热点
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="2"  />推荐
    <?php }elseif($lists['hot']==1){?>
    	<input name="hot" type="radio" value="0" />普通
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="1"checked="checked"   />热点
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="2"  />推荐
    	<?php }elseif($lists['hot']==2){?>
    		<input name="hot" type="radio" value="0"  />普通
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="1"  />热点
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="2" checked="checked" />推荐
    		<?php }?>
    </cite></li>
  <li><label>标签</label><cite>
    	<input type="hidden" name="labels" id="labels" value=""  />
    	<?php if(strpos($lists['label'],'手续简单') !== false){?>
    	<input name="label" type="checkbox" value="√手续简单" checked="checked" />√手续简单
    	<?php }else{?>
    		<input name="label" type="checkbox" value="√手续简单"  />√手续简单
    	<?php }if(strpos($lists['label'],'额度高') !== false){?>
    	
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" checked="checked" value="√额度高"  />√额度高
    	<?php }else{?>
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√额度高"  />√额度高
    	<?php }if(strpos($lists['label'],'放款快') !== false){?>
    		
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" checked="checked" value="√放款快"  />√放款快
    	<?php }else{?>
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√放款快"  />√放款快
    	<?php }if(strpos($lists['label'],'零抵押') !== false){?>
    		
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox"  checked="checked" value="√零抵押" />√零抵押
    	<?php }else{?>
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√零抵押" />√零抵押
    	<?php }if(strpos($lists['label'],'零担保') !== false){?>
    		
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" checked="checked" value="√零担保"  />√零担保
    	<?php }else{?>
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√零担保"  />√零担保
    	<?php }if(strpos($lists['label'],'低利息') !== false){?>
    		
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" checked="checked" value="√底利息"  />√低利息
    	<?php }else{?>
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√底利息"  />√低利息
    	<?php }?>
    </cite><i>选三个</i></li>

 	<li><label>申请条件</label><textarea name="condition" cols="" rows="" class="textinput" placeholder="<br/>"><?php echo $lists['condition']; ?></textarea><i>换行符</i></li>
 	<li><label>准备资料</label><textarea name="datum" cols="" rows="" class="textinput"><?php echo $lists['datum']; ?></textarea><i>换行符</i></li>
 	<li><label>注意事项</label><textarea name="notice" cols="" rows="" class="textinput"><?php echo $lists['notice']; ?></textarea><i>换行符</i></li>
 <li><label>排序</label><input name="ratio" type="text" class="dfinput" value="<?php echo $lists['ratio']; ?>"/><i>排序数字越小越前（普通产品利率1%就写100有合作的客户1%就写10）<i></li>


    <li><label>&nbsp;</label><input name="" type="submit" id="btn" value="确认保存" style="padding: 10px 20px 10px 20px;  background: #DC4E00; color: #F0F0EE;"/></li>
    </ul>
    
    </form>
   
    </div>


</body>

<script src="http://www.jq22.com/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">window.onload = function() {

		var arr = new Array();
		var arr1 = new Array();



		var btnObj = document.getElementById("btn");
                btnObj.onclick = function() {
                  //标签
                  var label = document.getElementsByName("label");
                   for (var i = 0; i < label.length; i++) {
                        if (label[i].checked) {
                            arr.push(label[i].value);
                        }
                   }
                   document.getElementById("labels").value = arr.join("   ");
 				
                };
 					    
                    
                
            };
</script>
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
                  //标签
                  var label = document.getElementsByName("label");
                   for (var i = 0; i < label.length; i++) {
                        if (label[i].checked) {
                            arr.push(label[i].value);
                        }
                   }
                   document.getElementById("labels").value = arr.join("   ");
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



                };
 					    
                    
                
            };
</script>
</html>
