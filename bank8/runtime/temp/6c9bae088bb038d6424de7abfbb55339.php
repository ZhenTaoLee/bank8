<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/good/add.html";i:1532939276;}*/ ?>
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

    <div class="formtitle"><span>基本信息<input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #DC4E00;margin-left: 200px;" type='button' name='Submit' onclick='javascript:history.back(-1);' value='返回'></span></div>
    <form action="add" method="post">


    <ul class="forminfo">
    <li><label>产品名</label><input name="goodName" type="text" class="dfinput" /></li>
  
    <li><label>额度</label><input name="limit" type="text" class="dfinput" /></li>
    <li><label>期数</label><input name="agelimit" type="text" class="dfinput"/></li>
    <li><label>利率</label><input name="accrual" type="text" class="dfinput"/></li>
    <li><label>排序</label><input name="ratio" type="text" class="dfinput"/><i>排序数字越小越前（普通产品利率1%就写100有合作的客户1%就写10）<i></li>
    <li><label>人气</label><input name="popularity" type="text" class="dfinput"/><i>（申请人数）<i></li>
    <li><label>最高额度（万）</label><input name="maxLimit" type="text" class="dfinput"/></li>
    <li><label>成功率（%）</label><input name="successRate" type="text" class="dfinput"/></li>
    	
 
 
 
    <li><label >所属银行</label><cite>
    	<select name="bankid" class="dfinput" >
    		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $vo['b_id']; ?>"><?php echo $vo['city']; ?>|<?php echo $vo['bankname']; ?></option>
			   <?php endforeach; endif; else: echo "" ;endif; ?>   
		</select>
    </cite></li>
    
    <li><label>贷款类型</label><cite>
    	<input name="goodtype" type="radio" value="1" checked="checked" />房信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="2"  />车信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="3"  />保单信用
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="4"  />个人信用贷
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="goodtype" type="radio" value="5"  />公积金信用

    </cite></li>
    

    
    <li><label>产品热度</label><cite>
    	<input name="hot" type="radio" value="0" checked="checked" />普通
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="1"  />热点
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="hot" type="radio" value="2"  />推荐
    
    </cite></li>
  <li><label>标签</label><cite>
    	<input type="hidden" name="labels" id="labels" value=""  />
    	<input name="label" type="checkbox" value="√手续简单" checked="checked"/>√手续简单
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√额度高"  />√额度高
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√放款快" checked="checked" />√放款快
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√零抵押" />√零抵押
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√零担保" checked="checked" />√零担保
    	&nbsp;&nbsp;&nbsp;&nbsp;<input name="label" type="checkbox" value="√底利息"  />√低利息
    </cite><i>选三个</i></li>
    
    
 	<li><label>申请条件</label><textarea name="condition" cols="" rows="" class="textinput" placeholder="<br/>"></textarea><i>换行符</i></li>
 	<li><label>准备资料</label><textarea name="datum" cols="" rows="" class="textinput"></textarea><i>换行符</i></li>
 	<li><label>注意事项</label><textarea name="notice" cols="" rows="" class="textinput"></textarea><i>换行符</i></li>



<div style="font-size: 80px;  height: 20; "><h1>2.5版本:</h1></div>




  <li><label>学历</label><cite>
    	<input type="hidden" name="educationGoods" id="educationGoods" value=""  />
    	<input name="educationGood" type="checkbox" value="1" checked="checked" />本科以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="educationGood" type="checkbox" value="2" checked="checked" />本科以上
    </cite></li>
   
    <li><label>微粒贷</label><cite>
    	<input type="hidden" name="weilidaiGoods" id="weilidaiGoods" value=""  />
    	<input name="weilidaiGood" type="checkbox" value="1" checked="checked" />有&nbsp;&nbsp;
&nbsp;&nbsp;<input name="weilidaiGood" type="checkbox" value="2" checked="checked" />无
    </cite></li>

    <li><label>职业</label><cite>
    	<input type="hidden" name="occupationGoods" id="occupationGoods" value=""  />
    	<input name="occupationGood" type="checkbox" value="1" checked="checked" />上班族&nbsp;&nbsp;
&nbsp;&nbsp;<input name="occupationGood" type="checkbox" value="2" checked="checked" />生意人
    </cite></li>
    
    <li><label>社保</label><cite>
    	<input type="hidden" name="socialSecurityGoods" id="socialSecurityGoods" value=""  />
    	<input name="socialSecurityGood" type="checkbox" value="1" checked="checked" />有&nbsp;&nbsp;
&nbsp;&nbsp;<input name="socialSecurityGood" type="checkbox" value="2" checked="checked" />无
    </cite></li>

    <li><label>公积金</label><cite>
    	<input type="hidden" name="accumulationFundGoods" id="accumulationFundGoods" value=""  />
    	<input name="accumulationFundGood" type="checkbox" value="1" checked="checked" />有&nbsp;&nbsp;
&nbsp;&nbsp;<input name="accumulationFundGood" type="checkbox" value="2" checked="checked" />无
    </cite></li>
    
    <li><label>工资</label><cite>
    	<input type="hidden" name="salaryGoods" id="salaryGoods" value=""  />
    	<input name="salaryGood" type="checkbox" value="1" checked="checked" />5000以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="salaryGood" type="checkbox" value="2" checked="checked" />5000以上
    </cite></li>

    <li><label>执照</label><cite>
    	<input type="hidden" name="licenseGoods" id="licenseGoods" value=""  />
    	<input name="licenseGood" type="checkbox" value="1" checked="checked" />有&nbsp;&nbsp;
&nbsp;&nbsp;<input name="licenseGood" type="checkbox" value="2" checked="checked" />无
    </cite></li>
    
    <li><label>流水</label><cite>
    	<input type="hidden" name="runningWaterGoods" id="runningWaterGoods" value=""  />
    	<input name="runningWaterGood" type="checkbox" value="1" checked="checked" />50万以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="runningWaterGood" type="checkbox" value="2" checked="checked" />50万以上
    </cite></li>
  
    <li><label>房产类型</label><cite>
    	<input type="hidden" name="houseTypeGoods" id="houseTypeGoods" value=""  />
    	<input name="houseTypeGood" type="checkbox" value="1" checked="checked" />商品房&nbsp;&nbsp;
&nbsp;&nbsp;<input name="houseTypeGood" type="checkbox" value="2" checked="checked" />其它
    </cite></li>
    
    <li><label>房产购置方式</label><cite>
    	<input type="hidden" name="houseBuyGoods" id="houseBuyGoods" value=""  />
    	<input name="houseBuyGood" type="checkbox" value="1" checked="checked" />全款&nbsp;&nbsp;
&nbsp;&nbsp;<input name="houseBuyGood" type="checkbox" value="2" checked="checked" />月供
    </cite></li>
    
    <li><label>房产价值</label><cite>
    	<input type="hidden" name="propertyValuesGoods" id="propertyValuesGoods" value=""  />
    	<input name="propertyValuesGood" type="checkbox" value="1" checked="checked" />80万以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="propertyValuesGood" type="checkbox" value="2" checked="checked" />80万以上
    </cite></li>
    
    <li><label>房产月供额</label><cite>
    	<input type="hidden" name="monthlyPaymentGoods" id="monthlyPaymentGoods" value=""  />
    	<input name="monthlyPaymentGood" type="checkbox" value="1" checked="checked" />5000以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="monthlyPaymentGood" type="checkbox" value="2" checked="checked" />5000以上
    </cite></li>
    
    <li><label>保单类型</label><cite>
    	<input type="hidden" name="insuranceTypeGoods" id="insuranceTypeGoods" value=""  />
    	<input name="insuranceTypeGood" type="checkbox" value="1" checked="checked" />传统型&nbsp;&nbsp;
&nbsp;&nbsp;<input name="insuranceTypeGood" type="checkbox" value="2" checked="checked" />分红型
    </cite></li>
  
    <li><label>保单缴费方式</label><cite>
    	<input type="hidden" name="insurancePaymentMethodGoods" id="insurancePaymentMethodGoods" value=""  />
    	<input name="insurancePaymentMethodGood" type="checkbox" value="1" checked="checked" />年缴&nbsp;&nbsp;
&nbsp;&nbsp;<input name="insurancePaymentMethodGood" type="checkbox" value="2" checked="checked" />月缴
    </cite></li>
    
      <li><label>保单缴费年限</label><cite>
    	<input type="hidden" name="insuranceAgeLimitGoods" id="insuranceAgeLimitGoods" value=""  />
    	<input name="insuranceAgeLimitGood" type="checkbox" value="1" checked="checked" />3年以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="insuranceAgeLimitGood" type="checkbox" value="2" checked="checked" />3年以上
    </cite></li>
    

      <li><label>汽车购置方式</label><cite>
    	<input type="hidden" name="vehicleBuyTypeGoods" id="vehicleBuyTypeGoods" value=""  />
    	<input name="vehicleBuyTypeGood" type="checkbox" value="1" checked="checked" />全款&nbsp;&nbsp;
&nbsp;&nbsp;<input name="vehicleBuyTypeGood" type="checkbox" value="2" checked="checked" />月供
    </cite></li>
    
      <li><label>最低汽车价格(/万)</label><input name="minVehiclePriceGoods" type="text" class="dfinput" /></li>
    
      <li><label>车龄</label><cite>
    	<input type="hidden" name="vehicleAgeGoods" id="vehicleAgeGoods" value=""  />
    	<input name="vehicleAgeGood" type="checkbox" value="1" checked="checked" />8年以下&nbsp;&nbsp;
&nbsp;&nbsp;<input name="vehicleAgeGood" type="checkbox" value="2" checked="checked" />8年以上
    </cite></li>
  

<br/><br/><br/>
   <div style="font-size: 80px;  height: 20; "><h1>基本信息:</h1></div>
   
   <li><label>性别</label><cite>
    	<input type="hidden" name="sexs" id="sexs" value=""  />
    	<input name="sex" type="checkbox" value="男" checked="checked" />男&nbsp;&nbsp;
&nbsp;&nbsp;<input name="sex" type="checkbox" value="女" checked="checked" />女
    </cite></li>
    
	<li><label>年龄</label><cite>
    	<input name="ageMin" type="text" class="dfinput" value="25"  style="width: 100px;"/>~<input name="ageMax" type="text" class="dfinput" value="55"  style="width: 100px;" />
     </cite></li> 	

   <li><label>
    	<input name="professionone" type="checkbox" value="1" />职业
   </label><cite>
    	<input type="hidden" name="professions" id="professions" value=""  />    	
   
   <input name="profession" type="checkbox" value="公务员事业单位" />公务员事业单位
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="国企、500强、上市公司" />国企、500强、上市公司
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="娱乐行业" />娱乐行业
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="保险行业" />保险行业	
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="法人或股东" />法人或股东
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="公检法" />公检法
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="直销" />直销	
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="高风险行业" />高风险行业
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="普通白领" />普通白领	
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="退休人员" />退休人员	
&nbsp;&nbsp;&nbsp;&nbsp;<input name="profession" type="checkbox" value="转业军人" />转业军人
     </cite></li>
  
<li><label>
    	<input name="creditone" type="checkbox" value="1" />征信查询
   </label><cite>
    	<input type="hidden" name="credits" id="credits" value=""  />    	
   
   <input name="credit" type="checkbox" value="不知道" />不知道
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="近2个月查询≤4次" />近2个月查询≤4次
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="近3个月查询≤6次" />近3个月查询≤6次
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="近半年查询≤6次" />近半年查询≤6次
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="近半年查询≤11次" />近半年查询≤11次
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="近一年查询≤12次" />近一年查询≤12次
&nbsp;&nbsp;&nbsp;&nbsp;<input name="credit" type="checkbox" value="白户（无贷款和信用卡记录）" />白户（无贷款和信用卡记录）

     </cite></li>
     
     
  <li><label>
    	<input name="liabilitiesone" type="checkbox" value="1" />个人负债
   </label><cite>
    	<input type="hidden" name="liabilitiess" id="liabilitiess" value=""  />    	
 
<input name="liabilities" type="checkbox" value="信用类负债30万以内" />信用类负债30万以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="liabilities" type="checkbox" value="信用类负债50万以内" />信用类负债50万以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="liabilities" type="checkbox" value="信用类负债100万以内" />信用类负债100万以内	
&nbsp;&nbsp;&nbsp;&nbsp;<input name="liabilities" type="checkbox" value="卡债10万以内" />卡债10万以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="liabilities" type="checkbox" value="无负债" />无负债
     </cite></li>   
     

     
<li><label>
    	<input name="socialSecurityone" type="checkbox" value="1" />社保
   </label><cite>
    	<input type="hidden" name="socialSecuritys" id="socialSecuritys" value=""  />    	
 
<input name="socialSecurity" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurity" type="checkbox" value="连续缴不足6个月" />连续缴不足6个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurity" type="checkbox" value="连续缴6个月以上" />连续缴6个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurity" type="checkbox" value="连续缴12个月以上" />连续缴12个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurity" type="checkbox" value="连续缴24个月以上" />连续缴24个月以上
     </cite></li>  
     
     <li><label>
    	<input name="socialSecurityBasicsone" type="checkbox" value="1" />社保基数
   </label><cite>
    	<input type="hidden" name="socialSecurityBasicss" id="socialSecurityBasicss" value=""  />    	
 
<input name="socialSecurityBasics" type="checkbox" value="不清楚" />不清楚
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurityBasics" type="checkbox" value="基数2400以上" />基数2400以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurityBasics" type="checkbox" value="基数4000以上" />基数4000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="socialSecurityBasics" type="checkbox" value="基数5000以上" />基数5000以上
     </cite></li>  
     
     <li><label>
    	<input name="accumulationFundone" type="checkbox" value="1" />公积金
   </label><cite>
    	<input type="hidden" name="accumulationFunds" id="accumulationFunds" value=""  />    	
 
<input name="accumulationFund" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFund" type="checkbox" value="连续缴不足6个月" />连续缴不足6个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFund" type="checkbox" value="连续缴6个月以上" />连续缴6个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFund" type="checkbox" value="连续缴12个月以上" />连续缴12个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFund" type="checkbox" value="连续缴24个月以上" />连续缴24个月以上

     </cite></li>  
     
     
     <li><label>
    	<input name="accumulationFundBasicsone" type="checkbox" value="1" />公积金基数
   </label><cite>
    	<input type="hidden" name="accumulationFundBasicss" id="accumulationFundBasicss" value=""  />    
<input name="accumulationFundBasics" type="checkbox" value="不清楚" />不清楚
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="个人缴费400元以上" />个人缴费400元以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="个人缴费800元以上" />个人缴费800元以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="基数2000以下" />基数2000以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="基数2000~4000元" />基数2000~4000元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="基数4000元以上" />基数4000元以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="accumulationFundBasics" type="checkbox" value="基数5000元以上" />基数5000元以上
     </cite></li>    
     
 <li><label>
    	<input name="houseBuyTypeone" type="checkbox" value="1" />房产购置方式
   </label><cite>
    	<input type="hidden" name="houseBuyTypes" id="houseBuyTypes" value=""  />    
<input name="houseBuyType" type="checkbox" value="无房产" />无房产
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="全款房" />全款房
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="结清1年以内" />结清1年以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="按揭满3个月以下" />按揭满3个月以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="按揭满3个月以上" />按揭满3个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="按揭满6个月以上" />按揭满6个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseBuyType" type="checkbox" value="按揭12个月以上" />按揭12个月以上
     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px;height: 20;   "><h1>房产信息:</h1></div>
  <li><label>
    	<input name="houseCityone" type="checkbox" value="1" />房产城市
   </label><cite>
    	<input type="hidden" name="houseCitys" id="houseCitys" value=""  />  
    	<input name="houseCity" type="checkbox" value="全国" />全国
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="北京市" />北京市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="广州市" />广州市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="杭州市" />杭州市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="深圳市" />深圳市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="珠海市" />珠海市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="南京市" />南京市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="南宁市" />南宁市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="武汉市" />武汉市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="佛山市" />佛山市
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseCity" type="checkbox" value="上海市" />上海市
     </cite></li>
 
 <li><label>
    	<input name="houseTypeone" type="checkbox" value="1" />房产类型
   </label><cite>
    	<input type="hidden" name="houseTypes" id="houseTypes" value=""  />    
<input name="houseType" type="checkbox" value="商品房" />商品房
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseType" type="checkbox" value="宅基地" />宅基地
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseType" type="checkbox" value="商品铺位" />商品铺位
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseType" type="checkbox" value="商铺房" />商铺房
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseType" type="checkbox" value="别墅" />别墅
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseType" type="checkbox" value="车位" />车位

     </cite></li>
     
     <li><label>
    	<input name="houseAreaone" type="checkbox" value="1" />房产面积
   </label><cite>
    	<input type="hidden" name="houseAreas" id="houseAreas" value=""  />    
<input name="houseArea" type="checkbox" value="60平以下" />60平以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseArea" type="checkbox" value="60~80平" />60~80平
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseArea" type="checkbox" value="80平以上" />80平以上

     </cite></li>
 
 
  <li><label>
    	<input name="houseValueone" type="checkbox" value="1" />房产估值
   </label><cite>
    	<input type="hidden" name="houseValues" id="houseValues" value=""  />    
<input name="houseValue" type="checkbox" value="80万以下" />80万以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseValue" type="checkbox" value="80万~100万" />80万~100万
&nbsp;&nbsp;&nbsp;&nbsp;<input name="houseValue" type="checkbox" value="100万以上" />100万以上

     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>汽车信息:</h1></div>
   <li><label>
    	<input name="vehicleBuyTypeone" type="checkbox" value="1" />汽车购置方式
   </label><cite>
    	<input type="hidden" name="vehicleBuyTypes" id="vehicleBuyTypes" value=""  />    
<input name="vehicleBuyType" type="checkbox" value="全款" />全款
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleBuyType" type="checkbox" value="按揭" />按揭

     </cite></li>
 
 
    <li><label>
    	<input name="vehicleLoanTypeone" type="checkbox" value="1" />可接受车贷类型
   </label><cite>
    	<input type="hidden" name="vehicleLoanTypes" id="vehicleLoanTypes" value=""  />    
<input name="vehicleLoanType" type="checkbox" value="押证不押车" />押证不押车
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleLoanType" type="checkbox" value="不押证不押车" />不押证不押车
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleLoanType" type="checkbox" value="都可以" />都可以
     </cite></li>
     
     <li><label>
    	<input name="licensePlateProvinceone" type="checkbox" value="1" />车牌省
   </label><cite>
    	<input type="hidden" name="licensePlateProvinces" id="licensePlateProvinces" value=""  />    
<input name="licensePlateProvince" type="checkbox" value="全国" />全国
&nbsp;&nbsp;&nbsp;&nbsp;<input name="licensePlateProvince" type="checkbox" value="广东" />广东
&nbsp;&nbsp;&nbsp;&nbsp;<input name="licensePlateProvince" type="checkbox" value="浙江" />浙江
     </cite></li>
         
    <li><label>
    	<input name="vehicleUseone" type="checkbox" value="1" />汽车用途
   </label><cite>
    	<input type="hidden" name="vehicleUses" id="vehicleUses" value=""  />    
<input name="vehicleUse" type="checkbox" value="运营车" />运营车
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleUse" type="checkbox" value="自用车" />自用车
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleUse" type="checkbox" value="非运营" />非运营
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleUse" type="checkbox" value="商用车" />商用车
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleUse" type="checkbox" value="其他" />其他
     </cite></li>
     
    <li><label>
    	<input name="vehiclePriceone" type="checkbox" value="1" />汽车价格
   </label><cite>
    	<input type="hidden" name="vehiclePrices" id="vehiclePrices" value=""  />    
<input name="vehiclePrice" type="checkbox" value="8万以下" />8万以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehiclePrice" type="checkbox" value="8~15万" />8~15万
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehiclePrice" type="checkbox" value="15万以上" />15万以上

     </cite></li>
     
     

     
     <li><label>
    	<input name="vehicleAgeone" type="checkbox" value="1" />车龄
   </label><cite>
    	<input type="hidden" name="vehicleAges" id="vehicleAges" value=""  />    
<input name="vehicleAge" type="checkbox" value="半年内" />半年内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleAge" type="checkbox" value="半年~8年" />半年~8年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleAge" type="checkbox" value="8年以上" />8年以上

     </cite></li>
     
    <li><label>
    	<input name="vehicleInsuranceone" type="checkbox" value="1" />汽车保险
   </label><cite>
    	<input type="hidden" name="vehicleInsurances" id="vehicleInsurances" value=""  />    
<input name="vehicleInsurance" type="checkbox" value="车主、车险投保人不同或不是本人" />车主、车险投保人不同或不是本人
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleInsurance" type="checkbox" value="车主、车险投保人为本人" />车主、车险投保人为本人
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleInsurance" type="checkbox" value="其他" />其他

     </cite></li>
     
      <li><label>
    	<input name="vehicleInsuranceLimitone" type="checkbox" value="1" />车险额度
   </label><cite>
    	<input type="hidden" name="vehicleInsuranceLimits" id="vehicleInsuranceLimits" value=""  />    
<input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以下" />车险保额8万以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="vehicleInsuranceLimit" type="checkbox" value="车险保额8万以上" />车险保额8万以上

     </cite></li>

  
 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>保单信息:</h1></div>
 
       <li><label>
    	<input name="insuranceNameone" type="checkbox" value="1" />保险公司
   </label><cite>
    	<input type="hidden" name="insuranceNames" id="insuranceNames" value=""  />
    	<div class="">
    		<?php if(is_array($insurance) || $insurance instanceof \think\Collection || $insurance instanceof \think\Paginator): $i = 0; $__LIST__ = $insurance;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>		   
&nbsp;&nbsp;<input name="insuranceName" type="checkbox" value="<?php echo $vo['name']; ?>" /><?php echo $vo['name']; ?>
&nbsp;&nbsp;
<?php endforeach; endif; else: echo "" ;endif; ?>
    	</div>
    	 
     </cite></li>
 
 
    <li><label>
    	<input name="insuranceTypeone" type="checkbox" value="1" />保单类型
   </label><cite>
    	<input type="hidden" name="insuranceTypes" id="insuranceTypes" value=""  />    
<input name="insuranceType" type="checkbox" value="传统型" />传统型
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceType" type="checkbox" value="分红型" />分红型
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceType" type="checkbox" value="万能型" />万能型
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceType" type="checkbox" value="其他" />其他
     </cite></li>
     
    <li><label>
    	<input name="insuranceTimeone" type="checkbox" value="1" />保单有效时间
   </label><cite>
    	<input type="hidden" name="insuranceTimes" id="insuranceTimes" value=""  />    
<input name="insuranceTime" type="checkbox" value="不足6个月" />不足6个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceTime" type="checkbox" value="大于等于6个月" />大于等于6个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceTime" type="checkbox" value="大于等于9个月" />大于等于9个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceTime" type="checkbox" value="其他" />其他
     </cite></li>
     
    <li><label>
    	<input name="insurancePaymentMethodone" type="checkbox" value="1" />保单缴费方式
   </label><cite>
    	<input type="hidden" name="insurancePaymentMethods" id="insurancePaymentMethods" value=""  />    
<input name="insurancePaymentMethod" type="checkbox" value="趸缴" />趸缴
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePaymentMethod" type="checkbox" value="年缴" />年缴
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePaymentMethod" type="checkbox" value="季度缴" />季度缴
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePaymentMethod" type="checkbox" value="月缴" />月缴
     </cite></li>

    <li><label>
    	<input name="insuranceAgeLimitone" type="checkbox" value="1" />保单已缴费年限
   </label><cite>
    	<input type="hidden" name="insuranceAgeLimits" id="insuranceAgeLimits" value=""  />    
<input name="insuranceAgeLimit" type="checkbox" value="1年" />1年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceAgeLimit" type="checkbox" value="2年" />2年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceAgeLimit" type="checkbox" value="3年" />3年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insuranceAgeLimit" type="checkbox" value="3年以上" />3年以上
     </cite></li>
     
         <li><label>
    	<input name="insurancePriceone" type="checkbox" value="1" />保单单次缴费
   </label><cite>
    	<input type="hidden" name="insurancePrices" id="insurancePrices" value=""  />    
<input name="insurancePrice" type="checkbox" value="月缴≥200元" />月缴≥200元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePrice" type="checkbox" value="月缴≥300元" />月缴≥300元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePrice" type="checkbox" value="月缴≥500元" />月缴≥500元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePrice" type="checkbox" value="年缴≥2400元" />年缴≥2400元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="insurancePrice" type="checkbox" value="其他" />其他
     </cite></li>

 <div style="height: 20px; border-bottom: 1px black solid; margin-bottom: 20px;"></div>
 <div style="font-size: 50px; height: 20;  "><h1>个人企业信用:</h1></div>
 
    <li><label>
    	<input name="incomeone" type="checkbox" value="1" />个人或企业流水
   </label><cite>
    	<input type="hidden" name="incomes" id="incomes" value=""  />  
    	<input name="income" type="checkbox" value="代发2000以上" />代发2000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="代发3000以上" />代发3000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="代发5000以上" />代发5000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="代发8000以上" />代发8000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="现金3000以上" />现金3000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="现金5000以上" />现金5000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="现金8000以上" />现金8000以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="月流水10万以内" />月流水10万以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="月流水10万~50万" />月流水10万~50万
&nbsp;&nbsp;&nbsp;&nbsp;<input name="income" type="checkbox" value="月流水50万以上" />月流水50万以上
     </cite></li>
 
 
     <li><label>
    	<input name="companyone" type="checkbox" value="1" />拥有个人公司
   </label><cite>
    	<input type="hidden" name="companys" id="companys" value=""  />    
<input name="company" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="company" type="checkbox" value="法人是自己营业执照满一年" />法人是自己营业执照满一年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="company" type="checkbox" value="法人是自己营业执照未满一年" />法人是自己营业执照未满一年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="company" type="checkbox" value="股东且营业执照满一年" />股东且营业执照满一年
&nbsp;&nbsp;&nbsp;&nbsp;<input name="company" type="checkbox" value="股东且营业执照未满一年" />股东且营业执照未满一年

     </cite></li>
     
    <li><label>
    	<input name="taxone" type="checkbox" value="1" />个税缴纳情况
   </label><cite>
    	<input type="hidden" name="taxs" id="taxs" value=""  />    
<input name="tax" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tax" type="checkbox" value="连续申报缴纳不足12个月" />连续申报缴纳不足12个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tax" type="checkbox" value="连续申报缴纳12个月以内" />连续申报缴纳12个月以内
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tax" type="checkbox" value="连续申报缴纳12个月以上且近2月内有缴" />连续申报缴纳12个月以上且近2月内有缴
     </cite></li>
     
    <li><label>
    	<input name="seniorityone" type="checkbox" value="1" />工龄
   </label><cite>
    	<input type="hidden" name="senioritys" id="senioritys" value=""  />    
<input name="seniority" type="checkbox" value="现职工作6个月以上" />现职工作6个月以上
&nbsp;&nbsp;&nbsp;&nbsp;<input name="seniority" type="checkbox" value="现职工作不足6个月" />现职工作不足6个月
&nbsp;&nbsp;&nbsp;&nbsp;<input name="seniority" type="checkbox" value="其他" />其他

     </cite></li>
     
    <li><label>
    	<input name="creditLimitone" type="checkbox" value="1" />信用卡总额度
   </label><cite>
    	<input type="hidden" name="creditLimits" id="creditLimits" value=""  />    
<input name="creditLimit" type="checkbox" value="无信用卡" />无信用卡
&nbsp;&nbsp;&nbsp;&nbsp;<input name="creditLimit" type="checkbox" value="10万以下" />10万以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="creditLimit" type="checkbox" value="10万以上" />10万以上

     </cite></li>
     
   	<li><label>
    	<input name="zhimaCreditone" type="checkbox" value="1" />芝麻信用
   </label><cite>
    	<input type="hidden" name="zhimaCredits" id="zhimaCredits" value=""  />    
<input name="zhimaCredit" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="zhimaCredit" type="checkbox" value="600以下" />600以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="zhimaCredit" type="checkbox" value="600~680" />600~680
&nbsp;&nbsp;&nbsp;&nbsp;<input name="zhimaCredit" type="checkbox" value="680~750" />680~750
&nbsp;&nbsp;&nbsp;&nbsp;<input name="zhimaCredit" type="checkbox" value="750以上" />750以上

     </cite></li>
     
    <li><label>
    	<input name="tinyGrainLoanone" type="checkbox" value="1" />微粒贷
   </label><cite>
    	<input type="hidden" name="tinyGrainLoans" id="tinyGrainLoans" value=""  />    
<input name="tinyGrainLoan" type="checkbox" value="无" />无
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tinyGrainLoan" type="checkbox" value="8000元以下" />8000元以下
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tinyGrainLoan" type="checkbox" value="8000~10000元" />8000~10000元
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tinyGrainLoan" type="checkbox" value="10000元以上" />10000元以上

     </cite></li>
     
    <li><label>
    	<input name="educationone" type="checkbox" value="1" />学历
   </label><cite>
    	<input type="hidden" name="educations" id="educations" value=""  />    
<input name="education" type="checkbox" value="专科" />专科
&nbsp;&nbsp;&nbsp;&nbsp;<input name="education" type="checkbox" value="非全日制本科" />非全日制本科
&nbsp;&nbsp;&nbsp;&nbsp;<input name="education" type="checkbox" value="全日制本科" />全日制本科
&nbsp;&nbsp;&nbsp;&nbsp;<input name="education" type="checkbox" value="研究生" />研究生
&nbsp;&nbsp;&nbsp;&nbsp;<input name="education" type="checkbox" value="博士" />博士
&nbsp;&nbsp;&nbsp;&nbsp;<input name="education" type="checkbox" value="其他" />其他


     </cite></li>


    <li><label>&nbsp;</label><input name="" type="submit" id="btn" value="确认保存" style="padding: 10px 20px 10px 20px;  background: #DC4E00; color: #F0F0EE;"/></li>
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

		var arra = new Array();
		var arrb = new Array();
		var arrc = new Array();
		var arrd = new Array();
		var arre = new Array();
		var arrf = new Array();
		var arrg = new Array();
		var arrh = new Array();
		var arri = new Array();
		var arrj = new Array();
		var arrk = new Array();
		var arro = new Array();
		var arrm = new Array();
		var arrn = new Array();
		var arro = new Array();
		var arrp = new Array();
		var arrq = new Array();
		var arrr = new Array();
		var arrs = new Array();
		var arrt = new Array();
		var arru = new Array();
		var arrv = new Array();
		var arrw = new Array();
		var arrs = new Array();
		var arry = new Array();
		var arrz = new Array();
		
		
		var btnObj = document.getElementById("btn");
		
		
                btnObj.onclick = function() {
                	
                	
     			
                          	

//`educationGood` varchar(255) NOT NULL COMMENT '学历0为本科以下2为本科以上',
 				var educationGood = document.getElementsByName("educationGood");
                   for (var i = 0; i < educationGood.length; i++) {
                        if (educationGood[i].checked) {
                            arra.push(educationGood[i].value);
                        }
                   }
                   document.getElementById("educationGoods").value = arra.join(" | ");    
//`weilidaiGood` varchar(255) NOT NULL COMMENT '微粒贷1有2无0空',
 				var weilidaiGood = document.getElementsByName("weilidaiGood");
                   for (var i = 0; i < weilidaiGood.length; i++) {
                        if (weilidaiGood[i].checked) {
                            arrb.push(weilidaiGood[i].value);
                        }
                   }
                   document.getElementById("weilidaiGoods").value = arrb.join(" | ");    
//`occupationGood` varchar(255) NOT NULL COMMENT '职业1为上班族2为生意人',
 				var occupationGood = document.getElementsByName("occupationGood");
                   for (var i = 0; i < occupationGood.length; i++) {
                        if (occupationGood[i].checked) {
                            arrc.push(occupationGood[i].value);
                        }
                   }
                   document.getElementById("occupationGoods").value = arrc.join(" | ");    
//`socialSecurityGood` varchar(255) NOT NULL COMMENT '社保，0为没填，1为有，2无',
 				var socialSecurityGood = document.getElementsByName("socialSecurityGood");
                   for (var i = 0; i < socialSecurityGood.length; i++) {
                        if (socialSecurityGood[i].checked) {
                            arrd.push(socialSecurityGood[i].value);
                        }
                   }
                   document.getElementById("socialSecurityGoods").value = arrd.join(" | ");    
                   
//`accumulationFundGood` varchar(255) NOT NULL COMMENT '公积金，0为没填，1为有，2为无',
 				var accumulationFundGood = document.getElementsByName("accumulationFundGood");
                   for (var i = 0; i < accumulationFundGood.length; i++) {
                        if (accumulationFundGood[i].checked) {
                            arre.push(accumulationFundGood[i].value);
                        }
                   }
                   document.getElementById("accumulationFundGoods").value = arre.join(" | ");    
//`salaryGood` varchar(255) NOT NULL COMMENT '工资，0没填，1为5000以下，2为5000以上',
 				var salaryGood = document.getElementsByName("salaryGood");
                   for (var i = 0; i < salaryGood.length; i++) {
                        if (salaryGood[i].checked) {
                            arrf.push(salaryGood[i].value);
                        }
                   }
                   document.getElementById("salaryGoods").value = arrf.join(" | ");    
//`licenseGood` varchar(255) NOT NULL COMMENT '执照，0为没填，1为有，2为无',
 				var licenseGood = document.getElementsByName("licenseGood");
                   for (var i = 0; i < licenseGood.length; i++) {
                        if (licenseGood[i].checked) {
                            arrg.push(licenseGood[i].value);
                        }
                   }
                   document.getElementById("licenseGoods").value = arrg.join(" | ");    
//`runningWaterGood` varchar(255) NOT NULL COMMENT '流水，0没填，1为50万以下，2为50万以上',
 				var runningWaterGood = document.getElementsByName("runningWaterGood");
                   for (var i = 0; i < runningWaterGood.length; i++) {
                        if (runningWaterGood[i].checked) {
                            arrh.push(runningWaterGood[i].value);
                        }
                   }
                   document.getElementById("runningWaterGoods").value = arrh.join(" | ");    
//`houseTypeGood` varchar(255) NOT NULL COMMENT '房产类型，0为没填，1为商品房，2为其它',
 				var houseTypeGood = document.getElementsByName("houseTypeGood");
                   for (var i = 0; i < houseTypeGood.length; i++) {
                        if (houseTypeGood[i].checked) {
                            arri.push(houseTypeGood[i].value);
                        }
                   }
                   document.getElementById("houseTypeGoods").value = arri.join(" | ");    
//`houseBuyGood` varchar(255) NOT NULL COMMENT '房产购置方式，0没填，1全款，2月供',
 				var houseBuyGood = document.getElementsByName("houseBuyGood");
                   for (var i = 0; i < houseBuyGood.length; i++) {
                        if (houseBuyGood[i].checked) {
                            arrk.push(houseBuyGood[i].value);
                        }
                   }
                   document.getElementById("houseBuyGoods").value = arrk.join(" | ");    
//`propertyValuesGood` varchar(255) NOT NULL COMMENT '房产价值，0没填，1为80万以下，80万以上（全款特有）',
 				var propertyValuesGood = document.getElementsByName("propertyValuesGood");
                   for (var i = 0; i < propertyValuesGood.length; i++) {
                        if (propertyValuesGood[i].checked) {
                            arrj.push(propertyValuesGood[i].value);
                        }
                   }
                   document.getElementById("propertyValuesGoods").value = arrj.join(" | ");    
//`monthlyPaymentGood` varchar(255) NOT NULL COMMENT '房产月供额，0为没填，1为5000以下，2为5000以上',
 				var monthlyPaymentGood = document.getElementsByName("monthlyPaymentGood");
                   for (var i = 0; i < monthlyPaymentGood.length; i++) {
                        if (monthlyPaymentGood[i].checked) {
                            arro.push(monthlyPaymentGood[i].value);
                        }
                   }
                   document.getElementById("monthlyPaymentGoods").value = arro.join(" | ");    
//`insuranceTypeGood` varchar(255) NOT NULL COMMENT '保单类型,0为没填，1为传统型，2为分红型',
 				var insuranceTypeGood = document.getElementsByName("insuranceTypeGood");
                   for (var i = 0; i < insuranceTypeGood.length; i++) {
                        if (insuranceTypeGood[i].checked) {
                            arrm.push(insuranceTypeGood[i].value);
                        }
                   }
                   document.getElementById("insuranceTypeGoods").value = arrm.join(" | ");    
//`insurancePaymentMethodGood` varchar(255) NOT NULL COMMENT '保单缴费方式，0为没填，1为年缴，2为月缴',
 				var insurancePaymentMethodGood = document.getElementsByName("insurancePaymentMethodGood");
                   for (var i = 0; i < insurancePaymentMethodGood.length; i++) {
                        if (insurancePaymentMethodGood[i].checked) {
                            arrn.push(insurancePaymentMethodGood[i].value);
                        }
                   }
                   document.getElementById("insurancePaymentMethodGoods").value = arrn.join(" | ");    
//`insuranceAgeLimitGood` varchar(255) NOT NULL COMMENT '保单缴费年限，0为没填，1为3年以下，2为3年以上',
 				var insuranceAgeLimitGood = document.getElementsByName("insuranceAgeLimitGood");
                   for (var i = 0; i < insuranceAgeLimitGood.length; i++) {
                        if (insuranceAgeLimitGood[i].checked) {
                            arrp.push(insuranceAgeLimitGood[i].value);
                        }
                   }
                   document.getElementById("insuranceAgeLimitGoods").value = arrp.join(" | ");    
//`vehicleBuyTypeGood` varchar(255) NOT NULL COMMENT '汽车购置方式，0为没填，1为全款，2为月供',
 				var vehicleBuyTypeGood = document.getElementsByName("vehicleBuyTypeGood");
                   for (var i = 0; i < vehicleBuyTypeGood.length; i++) {
                        if (vehicleBuyTypeGood[i].checked) {
                            arrq.push(vehicleBuyTypeGood[i].value);
                        }
                   }
                   document.getElementById("vehicleBuyTypeGoods").value = arrq.join(" | ");    

//`vehicleAgeGood` varchar(255) NOT NULL COMMENT '车龄，0为没填，1为8年以下，2为8年以上',	
 				var vehicleAgeGood = document.getElementsByName("vehicleAgeGood");
                   for (var i = 0; i < vehicleAgeGood.length; i++) {
                        if (vehicleAgeGood[i].checked) {
                            arru.push(vehicleAgeGood[i].value);
                        }
                   }
                   document.getElementById("vehicleAgeGoods").value = arru.join(" | ");    
                	
                	
                	
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
