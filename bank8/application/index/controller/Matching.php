<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;
class Matching extends Index{

//匹配首页
	  public function genre()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$ss=$_POST;


		//是否拥有房产1是0否
		if(array_key_exists('ownHouse', $ss)!== false){
			$ownHouse=$_POST['ownHouse'];
		}else{
			$ownHouse=0;
		}

		//拥有汽车1是0否
		if(array_key_exists('ownAutomobile', $ss)!== false){
			$ownAutomobile=$_POST['ownAutomobile'];
		}else{
			$ownAutomobile=0;
		}

		//拥有保单1是0否
		if(array_key_exists('ownGuaranteeSlip', $ss)!== false){
			$ownGuaranteeSlip=$_POST['ownGuaranteeSlip'];
		}else{
			$ownGuaranteeSlip=0;
		}

		//个人和企业
		if(array_key_exists('ownPersonage', $ss)!== false){
			$ownPersonage=$_POST['ownPersonage'];
		}else{
			$ownPersonage=0;
		}



		$adddata=['ownHouse'=>$ownHouse,'ownAutomobile'=>$ownAutomobile,'ownGuaranteeSlip'=>$ownGuaranteeSlip,'ownPersonage'=>$ownPersonage,'user_id'=>$id,'addtime'=>time()];

			$add=db('matching')->insert($adddata);
			$matching_id = db('matching')->getLastInsID();

    	if($add){
    	  	return json(['state'=>2558,'data'=>['matching_id'=>$matching_id],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

     }


//基本信息
 public function basic()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	if($id==0){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}

		$matching_id=$_POST['matching_id'];
		$name=$_POST['name'];//姓名
		$sex=$_POST['sex'];//1男0女
		$age=$_POST['age'];//年龄
		$profession=trim($_POST['profession']);//职业
		$credit=trim($_POST['credit']);//征信查询
		$liabilities=trim($_POST['liabilities']);//个人负债
	if(isset($_POST['city'])){
    $cityName=$_POST['city'];
  }else{
  	$cityName=1;
  }
		$socialSecurity=trim($_POST['socialSecurity']);//社保
		if($_POST['socialSecurityBasics']=='' || $_POST['socialSecurityBasics']=='请选择公积金基数'){
			$socialSecurityBasics='不清楚';
		}else{
			$socialSecurityBasics=trim($_POST['socialSecurityBasics']);//社保基数
		}



		$accumulationFund=trim($_POST['accumulationFund']);//公积金

		if($_POST['accumulationFundBasics']=='' || $_POST['accumulationFundBasics']=='请选择公积金基数'){
			$accumulationFundBasics='不清楚';
		}else{
			$accumulationFundBasics=trim($_POST['accumulationFundBasics']);//公积金基数
		}

		$houseBuyType=trim($_POST['houseBuyType']);//房产购置方式

		$upd=db('matching')->where('matching_id',$matching_id)->update(['name'=>$name,'sex'=>$sex,'age'=>$age,'profession'=>$profession,'credit'=>$credit,'liabilities'=>$liabilities,'socialSecurity'=>$socialSecurity,'socialSecurityBasics'=>$socialSecurityBasics,'accumulationFund'=>$accumulationFund,
'accumulationFundBasics'=>$accumulationFundBasics,'houseBuyType'=>$houseBuyType,'city'=>$cityName]);


    	  	return json(['state'=>2558,'data'=>[],'mesg'=>'操作成功']);


      }


     //匹配房产
		  public function house()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
			$matching_id=$_POST['matching_id'];

			$houseCity=$_POST['houseCity'];//房产城市
			$houseArea=$_POST['houseArea'];//房产面积
			$houseValue=$_POST['houseValue'];//房产估值
			$houseType=$_POST['houseType'];//房产类型
			$houseProvince=$_POST['houseProvince'];//房产省
			//删除可能存在的旧数据
			$ff=db('matchinghouse')->where('matching_id',$matching_id)->delete();

		$adddata=['matching_id'=>$matching_id,'houseCity'=>$houseCity,'houseArea'=>$houseArea,'houseValue'=>$houseValue,'houseType'=>$houseType,'houseProvince'=>$houseProvince];

			$add=db('matchinghouse')->insert($adddata);


    	if($add){
    	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

      }


         //匹配汽车
		  public function vehicle()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}

			$matching_id=$_POST['matching_id'];

			$vehicleBuyType=$_POST['vehicleBuyType'];//汽车购置方式
			$vehicleLoanType=$_POST['vehicleLoanType'];//可接受车贷类型
			$licensePlateProvince=$_POST['licensePlateProvince'];//车牌省
//			$licensePlateCity=$_POST['licensePlateCity'];//车牌城市
			$vehicleUse=$_POST['vehicleUse'];//汽车用途
			$vehiclePrice=$_POST['vehiclePrice'];//汽车价格
			$vehicleAge=$_POST['vehicleAge'];//车龄
			$vehicleInsurance=$_POST['vehicleInsurance'];//汽车保险
	 		$carInsuranceAmount=$_POST['carInsuranceAmount'];//车险额度


			//删除可能存在的旧数据
			$ff=db('matchingvehicle')->where('matching_id',$matching_id)->delete();

		$adddata=['matching_id'=>$matching_id,'vehicleBuyType'=>$vehicleBuyType,'vehicleLoanType'=>$vehicleLoanType,'vehicleUse'=>$vehicleUse,'vehiclePrice'=>$vehiclePrice,'vehicleAge'=>$vehicleAge,'vehicleInsurance'=>$vehicleInsurance,'licensePlateProvince'=>$licensePlateProvince,'carInsuranceAmount'=>$carInsuranceAmount];

			$add=db('matchingvehicle')->insert($adddata);


    	if($add){
    	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

      }
        //匹配保单
		  public function insurances()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}

			$matching_id=$_POST['matching_id'];

			$insuranceName=$_POST['insuranceName'];//保险公司
			$insuranceType=$_POST['insuranceType'];//保单类型
			$insuranceTime=$_POST['insuranceTime'];//保单有效时间
			$insurancePaymentMethod=$_POST['insurancePaymentMethod'];//保单缴费方式

			$insuranceAgeLimit=$_POST['insuranceAgeLimit'];//保单已缴费年限
			$insurancePrice=$_POST['insurancePrice'];//保单单次缴费

			//删除可能存在的旧数据
			$ff=db('matchinginsurance')->where('matching_id',$matching_id)->delete();

		$adddata=['matching_id'=>$matching_id,'insuranceName'=>$insuranceName,'insuranceType'=>$insuranceType,'insurancePaymentMethod'=>$insurancePaymentMethod,'insuranceAgeLimit'=>$insuranceAgeLimit,'insurancePrice'=>$insurancePrice,'insuranceTime'=>$insuranceTime,'insurancePrice'=>$insurancePrice];

			$add=db('matchinginsurance')->insert($adddata);


    	if($add){
    	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

      }


        //个人与企业信用
		  public function personage()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}

			$matching_id=$_POST['matching_id'];
			$income=$_POST['income'];//个人或企业流水
			$company=$_POST['company'];//公司
			$tax=$_POST['tax'];//个税缴纳情况
			$seniority=$_POST['seniority'];//工龄
			$creditLimit=$_POST['creditLimit'];//信用卡总额度
			$zhimaCredit=$_POST['zhimaCredit'];//芝麻信用
			$tinyGrainLoan=$_POST['tinyGrainLoan'];//微粒贷
			$education=$_POST['education'];//学历
			//删除可能存在的旧数据
			$ff=db('matchingpersonage')->where('matching_id',$matching_id)->delete();

		$adddata=['matching_id'=>$matching_id,'income'=>$income,'company'=>$company,'tax'=>$tax,'seniority'=>$seniority,'creditLimit'=>$creditLimit,'zhimaCredit'=>$zhimaCredit,'tinyGrainLoan'=>$tinyGrainLoan,'education'=>$education];

			$add=db('matchingpersonage')->insert($adddata);


    	if($add){
    	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

      }




//	保险公司
	 public function insurance()
    {


		$data = db('insurance')->select();
 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

	}



//市
	  public function city()
    {

	$city=db('provinces')->distinct(true)->field('provinceName')->select();

	foreach ($city as $key => $val) {

			$cityName=db('provinces')->where('provinceName',$city[$key]['provinceName'])->field('cityName')->select();
			foreach ($cityName as $k => $v) {
				$ss[]=$cityName[$k]['cityName'];
				}

			$city[$key]['cityName']=$ss;
			$ss=array();

	}


	  	return json(['state'=>2558,'data'=>$city,'mesg'=>'操作成功']);


    }



	  public function hint()
    {

		$good_id=$_POST['good_id'];

		$good = db('good')->where('good_id',$good_id)->find();
		$cityName=$good['cityName'];
		$goodName=$good['goodName'];
if($cityName=='广州' ){

	if($goodName=='鑫易贷'){
			$hint='';
				$show=0;
			}else{
				$hint='本次贷款放款成功后，平台将收取899元信息咨询费，客户可以到我的订单进行支付。';
			$show=1;
			}
}
elseif($cityName=='深圳' ){
		if($goodName=='鑫易贷'){
			$hint='';
				$show=0;
			}else{
				$hint='本次贷款放款成功后，平台将收取1499元信息咨询费，客户可以到我的订单进行支付。';
			$show=1;
			}
}
else{
	$hint='';
	$show=0;
}



$city=[
'hint'=>$hint,'show'=>$show
];



	  	return json(['state'=>2558,'data'=>$city,'mesg'=>'操作成功']);


    }




 public function good()
    {
    $info= Request::instance()->header();


   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
//

//  $matching_id= 1355;
    $matching_id=$_POST['matching_id'];
   //
    $matching= db('matching')->where('matching_id',$matching_id)->find();

if($matching['city']==1){
	  $cityName=$_POST['cityName'];
//  $cityName='广州';
    $map['cityName']  = ['like',"%" . $cityName . "%"];
	$upd=db('matching')->where('matching_id',$matching_id)->update(['city'=>$cityName]);
}else{
		$cityName=$matching['city'];
//  $cityName='广州';
    $map['cityName']  = ['like',"%" . $cityName . "%"];
}


 	  	$content='有匹配';
 	  	if($cityName=='其它城市'){
 	  	$users=db('user')->where('phone','13710595176')->find();
				$deviceidss=$users['device'];
		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;

									try {
								        $push->sendNotifySpecial($deviceidss, $data['content']);
								   } catch (\JPush\Exceptions\JPushException $e) {
								       // try something else here
								       // print $e;
								   }

		}

 	  	}elseif($cityName=='杭州'){
 	  	$users=db('user')->where('phone','18928869987')->find();
				$deviceidss=$users['device'];
		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
					$push = new Movement;
				$data['content'] ='【八号钱庄】'. $content;
		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
		}

		$userst=db('user')->where('phone','13710595176')->find();
				$deviceidsst=$userst['device'];
		if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;
		         $push->sendNotifySpecial($deviceidsst, $data['content']);
		}

 	  	}elseif($cityName=='深圳'){
 	  	$users=db('user')->where('phone','15019295360')->find();
				$deviceidss=$users['device'];
		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;
		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
		}

 	  	}elseif($cityName=='广州'){
 	  	$users=db('user')->where('phone','13829742636')->find();
				$deviceidss=$users['device'];
		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;
		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
		}

			$userst=db('user')->where('phone','15920965523')->find();
				$deviceidsst=$userst['device'];
		if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;
		         	$push->sendNotifySpecial($deviceidsst, $data['content']);
		}


 	  	}elseif($cityName=='珠海'){
 	  	$users=db('user')->where('phone','18702027845')->find();
				$deviceidss=$users['device'];
		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
					$push = new Movement;
					$data['content'] ='【八号钱庄】'. $content;
		      try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
		}

 	  	}





   if($cityName=="广州" || $cityName=="深圳" ){
    	$payment=0;
    }else{
    	$payment=0;
    }



  $map['sex']  =['like',"%" . $matching['sex'] . "%"]; //性别
	$map['ageMax']  = ['>=',$matching['age']];//最大年龄
	$map['ageMin']  = ['<=',$matching['age']];//最小年龄
  $map['profession']  = ['like',"%" . $matching['profession'] . "%"];//职业
  $map['credit']  = ['like',"%" . $matching['credit'] . "%"];//征信查询
  $map['liabilities']  = ['like',"%" . $matching['liabilities'] . "%"];//个人负债

  $map['socialSecurity']  = ['like',"%" . $matching['socialSecurity'] . "%"];//社保
  if($matching['socialSecurity']!='无'){
  	 $map['socialSecurityBasics']  = ['like',"%" . $matching['socialSecurityBasics'] . "%"];//社保基数
  }
   $map['accumulationFund']  = ['like',"%" . $matching['accumulationFund'] . "%"];//公积金
  if($matching['accumulationFund']!='无'){
  	$map['accumulationFundBasics']  = ['like',"%" . $matching['accumulationFundBasics'] . "%"];  //公积金基数
  }



  $map['houseBuyType']  = ['like',"%" . $matching['houseBuyType'] . "%"];//房产购置方式





//拥有房产
if($matching['ownHouse']==1){
	 $matchinghouse= db('matchinghouse')->where('matching_id',$matching_id)->find();
//房产
 	$map['houseCity']  = ['like',"%" . $matchinghouse['houseCity'] . "%"];//房产城市
  $map['houseArea']  = ['like',"%" . $matchinghouse['houseArea'] . "%"];//房产面积
  $map['houseValue']  = ['like',"%" . $matchinghouse['houseValue'] . "%"];//房产估值
  $map['houseType']  = ['like',"%" . $matchinghouse['houseType'] . "%"];//房产类型

 }
 if($matching['ownAutomobile']==1){
   $matchinghouse= db('matchingvehicle')->where('matching_id',$matching_id)->find();
  $map['vehicleBuyType']  = ['like',"%" . $matchinghouse['vehicleBuyType'] . "%"];//汽车购置方式
 	$map['vehicleLoanType']  = ['like',"%" . $matchinghouse['vehicleLoanType'] . "%"];//可接受车贷类型
  $map['licensePlateCity']  = ['like',"%" . $matchinghouse['licensePlateCity'] . "%"];//车牌城市
  $map['vehicleUse']  = ['like',"%" . $matchinghouse['vehicleUse'] . "%"];//汽车用途
  $map['vehiclePrice']  = ['like',"%" . $matchinghouse['vehiclePrice'] . "%"];//汽车价格
  $map['vehicleAge']  = ['like',"%" . $matchinghouse['vehicleAge'] . "%"];//车龄
  $map['vehicleInsurance']  = ['like',"%" . $matchinghouse['vehicleInsurance'] . "%"];//汽车保险
  $map['vehicleInsuranceLimit']  = ['like',"%" . $matchinghouse['carInsuranceAmount'] . "%"];//车险额度

}

if($matching['ownGuaranteeSlip']==1){
$matchinginsurance= db('matchinginsurance')->where('matching_id',$matching_id)->find();

$map['insuranceName']  = ['like',"%" . $matchinginsurance['insuranceName'] . "%"];//保险公司
$map['insuranceType']  = ['like',"%" . $matchinginsurance['insuranceType'] . "%"];//保单类型
$map['insuranceTime']  = ['like',"%" . $matchinginsurance['insuranceTime'] . "%"];//保单有效时间


$map['insurancePaymentMethod']  = ['like',"%" . $matchinginsurance['insurancePaymentMethod'] . "%"];//保单缴费方式
$map['insuranceAgeLimit']  = ['like',"%" . $matchinginsurance['insuranceAgeLimit'] . "%"];//保单已缴费年限

$map['insurancePrice']  = ['like',"%" . $matchinginsurance['insurancePrice'] . "%"];//保单单次缴费


}



if($matching['ownPersonage']==1){
$matchingpersonage= db('matchingpersonage')->where('matching_id',$matching_id)->find();

$map['income']  = ['like',"%" . $matchingpersonage['income'] . "%"];//保单单次缴费
$map['company']  = ['like',"%" . $matchingpersonage['company'] . "%"];//保单单次缴费
$map['tax']  = ['like',"%" . $matchingpersonage['tax'] . "%"];//保单单次缴费
$map['seniority']  = ['like',"%" . $matchingpersonage['seniority'] . "%"];//保单单次缴费
$map['creditLimit']  = ['like',"%" . $matchingpersonage['creditLimit'] . "%"];//保单单次缴费
$map['zhimaCredit']  = ['like',"%" . $matchingpersonage['zhimaCredit'] . "%"];//保单单次缴费
$map['tinyGrainLoan']  = ['like',"%" . $matchingpersonage['tinyGrainLoan'] . "%"];//保单单次缴费
$map['education']  = ['like',"%" . $matchingpersonage['education'] . "%"];//保单单次缴费
}

$map['putaway']  = 1;
//$matching['']
//`ownHouse` int(11) NOT NULL DEFAULT '0' COMMENT '是否拥有房产1是0否',
//`ownAutomobile` int(11) NOT NULL COMMENT '拥有汽车1是0否',
//`ownGuaranteeSlip` int(11) NOT NULL COMMENT '拥有保单1是0否',
//`ownPersonage` int(11) NOT NULL COMMENT '个人和企业',

if($matching['city']=='其它城市'){

	 $goodsdsf = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where('good_id',753)
		->select();
		$datas=[
		'payment'=>$payment,
		'goodName'=>$goodsdsf[0]['goodName'],
	 	'bankid'=>$goodsdsf[0]['bankid'],
	  'good_id'=>$goodsdsf[0]['good_id'],
	  'label'=>$goodsdsf[0]['label'],
	  'agelimit'=>$goodsdsf[0]['agelimit'],
	  'accrual'=>$goodsdsf[0]['accrual'],
	  'limit'=>$goodsdsf[0]['limit'],
	  'bankname'=>$goodsdsf[0]['bankname'],
	  'logo'=>$goodsdsf[0]['logo'],
    'url'=>"https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$goodsdsf[0]['good_id'],
    'addtime'=>date('Y-m-d H:i:s', $matching['addtime']),
    'matchingNumber'=>$matching['addtime'].$matching_id
];
$upds=db('matching')->where('matching_id',$matching_id)->update(['city'=>$matching['city'],'good_id'=>$goodsdsf[0]['good_id']]);

return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datas,'list'=>['']],'mesg'=>'操作完成']);
}

	$mas['cityName']  =  ['like',"%" . $cityName . "%"];
	 $goodsds = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where($mas)
		->where(function ($query) {
				    $query->where('good_id',713)
				    ->whereOr('good_id',712)
				    ->whereOr('good_id',711)
				    ->whereOr('good_id',710);
		})
		->select();
		$datasf=[
		'payment'=>$payment,
		'goodName'=>$goodsds[0]['goodName'],
	 	'bankid'=>$goodsds[0]['bankid'],
	  'good_id'=>$goodsds[0]['good_id'],
	  'label'=>$goodsds[0]['label'],
	  'agelimit'=>$goodsds[0]['agelimit'],
	  'accrual'=>$goodsds[0]['accrual'],
	  'limit'=>$goodsds[0]['limit'],
	  'bankname'=>$goodsds[0]['bankname'],
	  'logo'=>$goodsds[0]['logo'],
    'url'=>"https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$goodsds[0]['good_id'],
    'addtime'=>date('Y-m-d H:i:s', $matching['addtime']),
    'matchingNumber'=>$matching['addtime'].$matching_id
];
$upds=db('matching')->where('matching_id',$matching_id)->update(['city'=>$cityName,'good_id'=>$goodsds[0]['good_id']]);



//只拥有房产或简匹房产
if($matching['ownHouse']==0 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==0){


		$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
		->where('goodtype',5)
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}

    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where($map)
		->where('goodtype',5)
		->order('ratio asc')
		->select();

$data = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(9)
				->select();


}




//只拥有房产或简匹房产
if($matching['ownHouse']==1 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==0){


		$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
				->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}

    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where($map)
				->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',5);
})
		->order('ratio asc')
		->select();


$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(4)
				->select();

$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(5)
				->select();



			$data = array_merge_recursive($data1,$data2);

}
//只拥有汽车或简匹汽车
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==0){
		$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
				->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',5);
})
		->count();

		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}

    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();

		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
					->limit(4)
				->select();


			$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
					->limit(5)
				->select();

				$data = array_merge_recursive($data1,$data2);

}
//只拥有保单或简匹保单
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==0){

		$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
				->where(function ($query) {
				    $query->where('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->count();
//		echo db('good')->getLastSql();die();

		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where(function ($query) {
				    $query->where('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(4)
				->select();

		$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(5)
				->select();

			$data = array_merge_recursive($data1,$data2);

}
//只拥有个人或简匹个人
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==1){

		$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
		->where(function ($query) {
				    $query->where('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where(function ($query) {
				    $query->where('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(4)
				->select();


				$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->order('ratio asc')
				->where($map)
				->limit(5)
				->select();


		$data = array_merge_recursive($data1,$data2);

}
//12
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==0){
	
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',2)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',2)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

				$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();
		$data = array_merge_recursive($data1,$data2,$data3);
}

//123
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==0){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
		return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();



		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

			$data4 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

		$data = array_merge_recursive($data1,$data2,$data3,$data4);
}

//1234
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where($map)
		->order('ratio asc')
		->select();

		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

				$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data4 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data5 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(1)
				->select();

				$data = array_merge_recursive($data1,$data2,$data3,$data4,$data5);
}

//13
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==0){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();


						$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();


			$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
			->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

				$data = array_merge_recursive($data1,$data2,$data3);

}

//14
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				     ->whereOr('goodtype',4)
				     ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();

		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();
				$data = array_merge_recursive($data1,$data2,$data3);

}


//124
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',2)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				     ->whereOr('goodtype',2)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

				$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

								$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data4 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();



				$data = array_merge_recursive($data1,$data2,$data3,$data4);

}


//134
elseif($matching['ownHouse']==1 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',1)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();



		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',1)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();



			$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();


			$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();


			$data4 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();


				$data = array_merge_recursive($data1,$data2,$data3,$data4);


}


//23
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==0){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->paginate(3);

			$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->paginate(3);

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->paginate(3);


								$data = array_merge_recursive($data1,$data2,$data3);

}


//24
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==0 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',2)
 						->whereOr('goodtype',4)
 						->whereOr('goodtype',5);

})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',2)
					 ->whereOr('goodtype',4)
					 ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

				$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();


				$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

		$data = array_merge_recursive($data1,$data2,$data3);
}


//234
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==1 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
		return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',2)
				    ->whereOr('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();


		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',2)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(2)
				->select();


						$data4 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

			$data = array_merge_recursive($data1,$data2,$data3,$data4);
}


//34
elseif($matching['ownHouse']==0 && $matching['ownAutomobile']==0 && $matching['ownGuaranteeSlip']==1 && $matching['ownPersonage']==1){
			$goodcount = db('good')
   	->join('goods','good_id = ba_goods.goodid','left')
		->where($map)
->where(function ($query) {
				    $query->where('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->count();
		if($goodcount>1){
			$ff=rand(0,$goodcount-1);
		}elseif($goodcount==1){
			$ff=0;
		}elseif($goodcount==0){
			return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datasf,'list'=>['']],'mesg'=>'操作完成']);
		}
    //推荐
    $good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
   	->join('goods','good_id = ba_goods.goodid','left')
		->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
->where(function ($query) {
				    $query->where('goodtype',3)
				    ->whereOr('goodtype',4)
				    ->whereOr('goodtype',5);
})
		->where($map)
		->order('ratio asc')
		->select();

		$data1 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',3)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data2 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
				->where('goodtype',4)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();

						$data3 = db('good')
  			->join('bank','bankid = ba_bank.b_id','left')
   			->join('goods','good_id = ba_goods.goodid','left')
				->field('goodName,bankid,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
				->order('ratio asc')
->where('goodtype',5)
				->where('good_id','<>',$good[0]['good_id'])
				->where($map)
				->limit(3)
				->select();
							$data = array_merge_recursive($data1,$data2,$data3);

}




	$isResult=1;
	$datas=[
		'payment'=>$payment,
		'goodName'=>$good[0]['goodName'],
	 	'bankid'=>$good[0]['bankid'],
	  'good_id'=>$good[0]['good_id'],
	  'label'=>$good[0]['label'],
	  'agelimit'=>$good[0]['agelimit'],
	  'accrual'=>$good[0]['accrual'],
	  'limit'=>$good[0]['limit'],
	  'bankname'=>$good[0]['bankname'],
	  'logo'=>$good[0]['logo'],
    'url'=>"https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$good[0]['good_id'],
    'addtime'=>date('Y-m-d H:i:s', $matching['addtime']),
    'matchingNumber'=>$matching['addtime'].$matching_id
];

    $upd=db('matching')->where('matching_id',$matching_id)->update(['city'=>$cityName,'good_id'=>$good[0]['good_id']]);



	foreach ($data as $key => $val) {
				$data[$key]['payment'] =$payment;
				$data[$key]['url'] ="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];
				$data[$key]['addtime']=date('Y-m-d H:i:s', $matching['addtime']);
				$data[$key]['matchingNumber']=$matching['addtime'].$matching_id;
				}





   	return json(['state'=>2558,'data'=>['isResult'=>1,'recommend'=>$datas,'list'=>$data],'mesg'=>'操作完成']);

    }





}
