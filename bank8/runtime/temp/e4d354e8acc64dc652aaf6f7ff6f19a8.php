<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/matching/details.html";i:1533190519;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>匹配详情</title>

<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BACK_CSS_URL; ?>select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>select-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>editor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>

</head>

<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
        </ul>
    </div>    
    <div class="formbody">

    <!--<div id="tab1" class="tabson">   
        <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div>   
    </div>  -->
    
    <div class="top-left" style="line-height: 40px;">
        <p>匹配编号：<?php echo $matching['addtime']; ?><?php echo $matching['matching_id']; ?></p>
        <p>匹配时间：<?php echo date('Y-m-d H:i:s',$matching['addtime']);?></p>
        <p>手机号：<?php echo $user['phone']; ?></p>
        <p>姓名：<?php echo $matching['name']; ?></p>
        <p>城市：<?php echo $matching['city']; ?></p>
        <p>性别：<?php echo $matching['sex']; ?></p>
        <p>年龄：<?php echo $matching['age']; ?></p>
        <p>职业：<?php echo $matching['profession']; ?></p>
        <p>征信查询：<?php echo $matching['credit']; ?></p>
        <p>个人负债：<?php echo $matching['liabilities']; ?></p>
        <p>社保：<?php echo $matching['socialSecurity']; ?></p>
        <p>社保基数：<?php echo $matching['socialSecurityBasics']; ?></p>
        <p>公积金：<?php echo $matching['accumulationFund']; ?></p>
        <p>公积金基数：<?php echo $matching['accumulationFundBasics']; ?></p>
        <p>房产购置方式：<?php echo $matching['houseBuyType']; ?></p>


   <h2>2.5版本</h2>
<p>年龄区间：<?php echo $matching_pair['ageSection']; ?></p>

<p>学历：
	<?php if($matching_pair['education']==1){
			echo '本科以下';
		}elseif($matching_pair['education']==2){
			echo '本科以上';
		}else{
			echo ' '; 
		} 
	?>
	

</p>
<p>微粒贷：
	<?php if($matching_pair['weilidai']==1){
			echo '有';
		}elseif($matching_pair['weilidai']==2){
			echo '无';
		}else{
			echo ' '; 
		} 
	?>
	

</p>
<p>职业：
	<?php if($matching_pair['occupation']==1){
			echo '上班族';
		}elseif($matching_pair['occupation']==2){
			echo '生意人';
		}else{
			echo ' '; 
		} 
	?>
	
</p>
<p>社保：
	<?php if($matching_pair['socialSecurity']==1){
			echo '有';
		}elseif($matching_pair['socialSecurity']==2){
			echo '无';
		}else{
			echo ' '; 
		} 
	?>
	


</p>
<p>公积金：
	<?php if($matching_pair['accumulationFund']==1){
			echo '有';
		}elseif($matching_pair['accumulationFund']==2){
			echo '无';
		}else{
			echo ' '; 
		} 
	?>
	


</p>
<p>工资：
	<?php if($matching_pair['salary']==1){
			echo '5000以下';
		}elseif($matching_pair['salary']==2){
			echo '5000以上';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>执照：
	<?php if($matching_pair['license']==1){
			echo '有';
		}elseif($matching_pair['license']==2){
			echo '无';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>流水：
	
	<?php if($matching_pair['runningWater']==1){
			echo '50万以下';
		}elseif($matching_pair['runningWater']==2){
			echo '50万以上';
		}else{
			echo ' '; 
		} 
	?>
	</p>
<p>房产类型：
	<?php if($matching_pair['houseType']==1){
			echo '商品房';
		}elseif($matching_pair['houseType']==2){
			echo '其它';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>房产购置方式：
	<?php if($matching_pair['houseBuy']==1){
			echo '全款';
		}elseif($matching_pair['houseBuy']==2){
			echo '月供';
		}else{
			echo ' '; 
		} 
	?>
	</p>
<p>房产价值：
	
	<?php if($matching_pair['propertyValues']==1){
			echo '80万以下';
		}elseif($matching_pair['propertyValues']==2){
			echo '80万以上';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>房产月供额：
	
	<?php if($matching_pair['monthlyPayment']==1){
			echo '5000以下';
		}elseif($matching_pair['monthlyPayment']==2){
			echo '5000以上';
		}else{
			echo ' '; 
		} 
	?>
	</p>
<p>保单类型：
	<?php if($matching_pair['insuranceType']==1){
			echo '传统型';
		}elseif($matching_pair['insuranceType']==2){
			echo '分红型';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>保单缴费方式：
	<?php if($matching_pair['insurancePaymentMethod']==1){
			echo '年缴';
		}elseif($matching_pair['insurancePaymentMethod']==2){
			echo '月缴';
		}else{
			echo ' '; 
		} 
	?>
	</p>
<p>保单缴费年限：
	
	<?php if($matching_pair['insuranceAgeLimit']==1){
			echo '3年以下';
		}elseif($matching_pair['insuranceAgeLimit']==2){
			echo '3年以上';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>汽车购置方式：
		
	<?php if($matching_pair['vehicleBuyType']==1){
			echo '全款';
		}elseif($matching_pair['vehicleBuyType']==2){
			echo '月供';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<p>汽车价格：<?php echo $matching_pair['vehiclePrice']; ?>/万</p>
<p>车龄：
	<?php if($matching_pair['vehicleAge']==1){
			echo '8年以下';
		}elseif($matching_pair['vehicleAge']==2){
			echo '8年以上';
		}else{
			echo ' '; 
		} 
	?>
	
	</p>
<div style="border: solid #000088 1px;"></div>

			<?php if($matching['ownHouse']==1){ ?>
				
				<p>房产城市：<?php echo $matchinghouse['houseCity']; ?></p>
				<p>房产面积：<?php echo $matchinghouse['houseArea']; ?></p>
				<p>房产估值：<?php echo $matchinghouse['houseValue']; ?></p>
				<p>房产类型：<?php echo $matchinghouse['houseType']; ?></p>


			<?php  }else{ ?>

		<div class="">
					没有匹配房产
				</div>
					<?php  } if($matching['ownAutomobile']==1){ ?>
				
				<p>汽车购置方式：<?php echo $matchingvehicle['vehicleBuyType']; ?></p>
				<p>可接受车贷类型：<?php echo $matchingvehicle['vehicleLoanType']; ?></p>
				<p>车牌省：<?php echo $matchingvehicle['licensePlateProvince']; ?></p>
				<p>汽车用途：<?php echo $matchingvehicle['vehicleUse']; ?></p>
				<p>汽车价格：<?php echo $matchingvehicle['vehiclePrice']; ?></p>
				<p>车龄：<?php echo $matchingvehicle['vehicleAge']; ?></p>
				<p>汽车保险：<?php echo $matchingvehicle['vehicleInsurance']; ?></p>
				<p>车险额度：<?php echo $matchingvehicle['carInsuranceAmount']; ?></p>
			<?php  }else{  ?>
				
				<div class="">
					没有匹配汽车
				</div>
					<?php  } if($matching['ownGuaranteeSlip']==1){ ?>
				
				<p>保险公司：<?php echo $matchinginsurance['insuranceName']; ?></p>
				<p>保单类型：<?php echo $matchinginsurance['insuranceType']; ?></p>
				<p>保单有效时间：<?php echo $matchinginsurance['insuranceTime']; ?></p>
				<p>保单缴费方式：<?php echo $matchinginsurance['insurancePaymentMethod']; ?></p>
				<p>保单已缴费年限：<?php echo $matchinginsurance['insuranceAgeLimit']; ?></p>
				<p>保单单次缴费：<?php echo $matchinginsurance['insurancePrice']; ?></p>


			<?php  }else{ ?>
				<div class="">
					没有匹配保单
				</div>
				<?php  } if($matching['ownPersonage']==1){ ?>
				
					<p>个人或企业流水：<?php echo $matchingpersonage['income']; ?></p>
					<p>公司：<?php echo $matchingpersonage['company']; ?></p>
					<p>个税缴纳情况：<?php echo $matchingpersonage['tax']; ?></p>
					<p>工龄：<?php echo $matchingpersonage['seniority']; ?></p>
					<p>信用卡总额度：<?php echo $matchingpersonage['creditLimit']; ?></p>
					<p>芝麻信用：<?php echo $matchingpersonage['zhimaCredit']; ?></p>
					<p>微粒贷：<?php echo $matchingpersonage['tinyGrainLoan']; ?></p>
					<p>学历：<?php echo $matchingpersonage['education']; ?></p>

	
<?php  }else{ ?>
				<div class="">
					没有匹配个人与企业
				</div>
				<?php  } ?>
    </div>


       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>   
    
    </div>


</body>

</html>
