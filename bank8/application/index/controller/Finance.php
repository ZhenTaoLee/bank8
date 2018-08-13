<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;


  //展示资讯页，产品页，每日快报
  class Finance extends Index
  {


    //问题页面
    public function problem()
    {
      // $id = $_POST['id'];//
      $id = $_GET['id'];
      $list = db('issue')->where('issue_id',$id)->find();

      $res=db('issue')->where('type',$list['type'])->where('issue_id','<>',$id)->order('addtime desc')->paginate(5);
      // var_dump($list["webtest"]);
      $this->assign('list', $list);

      $this->assign('res', $res);

          return $this->fetch();
    }



    //资讯详情表
    public function details()
    {

      $id = $_GET['id'];
      // $id = 35;
      $list = db('journalism')->where('journalism_id',$id)->find();
      //标签字符串切割
      $ret = explode('，', $list["tag"]);
      // var_dump($ret);
      $res=db('journalism')->where('status',1)->where('journalism_id','<>',$id)->order('addtime desc')->paginate(5);
      // var_dump($list["webtest"]);

      $this->assign('ret', $ret);

      $this->assign('list', $list);

      $this->assign('res', $res);

          return $this->fetch();

    }



    //每日快报
    public function dailyExpress()
    {

      $id = $_GET['id'];
      // $id = 16;
      $list = db('bulletin')->where('bulletin_id',$id)->find();
      // $res=db('bulletin')->where('bulletin','<>',$id)->order('addtime desc')->paginate(5);

      //标签字符串切割
      // $ret = explode('，', $list["tag"]);
      // var_dump($list);
      // $res=db('bulletin')->where('bulletin','<>',$id)->order('addtime desc')->paginate(5);
      // var_dump($list["webtest"]);
      $weekarray=array("日","一","二","三","四","五","六");
      $week= "星期".$weekarray[date("w",$list['addtime'])];
    	$s=date("Y-m-d",$list['addtime']);
    	$Stime=strtotime($s);

    	$day=date("d",$list['addtime']);
    	$m=date("m",$list['addtime']);

   		if($m==1){
   			$month='Jan';
   		}
   		elseif($m==2){
   			$month='Feb';
   		}
   		elseif($m==3){
   			$month='Mar';
   		}
   		elseif($m==4){
   			$month='Apr';
   		}
   		elseif($m==5){
   			$month='May';
   		}
   		elseif($m==6){
   			$month='June';
   		}
   		elseif($m==7){
   			$month='July';
   		}
   		elseif($m==8){
   			$month='Aug';
   		}
   		elseif($m==9){
   			$month='Sept';
   		}
   		elseif($m==10){
   			$month='Oct';
   		}
   		elseif($m==11){
   			$month='Nov';
   		}
   		elseif($m==12){
   			$month='Dec';
   		}


      $this->assign('list', $list);
      $this->assign('month', $month);
      $this->assign('day', $day);
      $this->assign('week', $week);



          return $this->fetch();

    }

    //产品详情
    public function detailed()
    {

         $id = $_GET['id'];
      //左连接查询产品表
      $list = db('good')
      ->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,agelimit,accrual,condition,datum,notice,limit,ba_bank.bankname,ba_bank.logo,ba_bank.city')
			->where('good_id',$id)
			->order('ratio asc')
			->find();
//var_dump($list);die();
			 $lists = db('good')
      ->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,agelimit,accrual,condition,datum,notice,limit,ba_bank.bankname,ba_bank.logo,ba_bank.city')
			->where('goodtype',$list['goodtype'])
			->where('ba_bank.city',$list['city'])
			->order('ratio asc')
			->paginate(3);

      $this->assign('list', $list);
      $this->assign('lists', $lists);


          return $this->fetch();

    }

    //热门产品详情
    public function hotDetails()
    {
      
      //产品详情

       $id = $_GET['id'];
      //查询产品表
      $list = db('hot_good')
      ->field('goodName,hot_id,limit,accrual,popularity,drawingOne,drawingTwo,drawingThree,rank,logo,label,agelimit,location,carask,perask,miso,liabilities,datum,mode,rate')
      ->where('hot_id',$id)
      ->find();
      //var_dump($list);die();
      //  $lists = db('good')
      //    ->join('bank','bankid = ba_bank.b_id','left')
      // ->field('goodName,good_id,goodtype,label,agelimit,accrual,condition,datum,notice,limit,ba_bank.bankname,ba_bank.logo,ba_bank.city')
      // ->where('goodtype',$list['goodtype'])
      // ->where('ba_bank.city',$list['city'])
      // ->order('ratio asc')
      // ->paginate(3);

      $this->assign('list', $list);
    // $this->assign('lists', $lists);


    return $this->fetch();

    


    }


   //小城趣事详情
    public function funDetails()
    {
      
      //产品详情

       $id = $_GET['id'];
      //查询产品表
      $list = db('z_fun')
      ->field('fun_id,headline,picture,reading,wedtext,addtime,num')
      ->where('fun_id',$id)
      ->find();

      
       $res=db('z_fun')->where('fun_id','<>',$id)->order('addtime desc')->paginate(3);

      $this->assign('res', $res);

      $this->assign('list', $list);
    // $this->assign('lists', $lists);


    return $this->fetch();

    


    }




 public function flydetail()
    {



    $oid=$_GET['id'];
//		$oid=77;
    $order = db('order')->where('order_id',$oid)->find();
    $lastmessage=$order['lastmessage'];
    $orderNumber=$order['orderNumber'];
    $user = db('user')->where('user_id',$order['user_id'])->find();

$phone=$user['phone'];//手机号
$portrait=$user['portrait'];

$good = db('good')->where('good_id',$order['good_id'])->find();
$goodName=$good['goodName'];
$label=$good['label'];//标签
$agelimit=$good['agelimit'];//期限
$accrual=$good['accrual'];//利息
$limit=$good['limit'];//额度

 $bank = db('bank')->where('b_id',$good['bankid'])->find();

 $logo=$bank['logo'];//logo

    $matching = db('matching')->where('matching_id',$order['matching_id'])->find();
    $name=$matching['name'];//姓名
    $sex=$matching['sex'];//性别
    $age=$matching['age'];//年龄
    $profession=$matching['profession'];//职业
    $credit=$matching['credit'];//征信查询
    $liabilities=$matching['liabilities'];//个人负债
    $socialSecurity=$matching['socialSecurity'];//社保
    $socialSecurityBasics=$matching['socialSecurityBasics'];//社保基数
    $accumulationFund=$matching['accumulationFund'];//公积金
    $accumulationFundBasics=$matching['accumulationFundBasics'];//公积金基数
    $houseBuyType=$matching['houseBuyType'];//房产购置方式


$ownHouse=$matching['ownHouse'];//是否拥有房产1是0否
$ownAutomobile=$matching['ownAutomobile'];//拥有汽车1是0否
$ownGuaranteeSlip=$matching['ownGuaranteeSlip'];//拥有保单1是0否
$ownPersonage=$matching['ownPersonage'];//个人和企业

if($ownHouse==1){

$matchinghouse = db('matchinghouse')->where('matching_id',$order['matching_id'])->find();
   $houseCity=$matchinghouse['houseCity'];//房产城市
   $houseArea=$matchinghouse['houseArea'];//房产面积
   $houseValue=$matchinghouse['houseValue'];//房产估值
   $houseType=$matchinghouse['houseType'];//房产类型

}else{
	$houseCity='无';//房产城市
   $houseArea='无';//房产面积
   $houseValue='无';//房产估值
   $houseType='无';//房产类型

}

if($ownAutomobile==1){

$matchingvehicle = db('matchingvehicle')->where('matching_id',$order['matching_id'])->find();

   $vehicleBuyType=$matchingvehicle['vehicleBuyType'];//汽车购置方式
    $vehicleLoanType=$matchingvehicle['vehicleLoanType'];//可接受车贷类型
    $licensePlateProvince=$matchingvehicle['licensePlateProvince'];//汽车购置方式
  	$vehicleUse=$matchingvehicle['vehicleUse'];//汽车用途
    $vehiclePrice=$matchingvehicle['vehiclePrice'];//汽车价格
    $vehicleAge=$matchingvehicle['vehicleAge'];//车龄
    $vehicleInsurance=$matchingvehicle['vehicleInsurance'];//汽车保险
   	$carInsuranceAmount=$matchingvehicle['carInsuranceAmount'];//车险额度

}else{

   $vehicleBuyType='无';//汽车购置方式
    $vehicleLoanType='无';//可接受车贷类型
    $licensePlateProvince='无';//汽车购置方式
  	$vehicleUse='无';//汽车用途
    $vehiclePrice='无';//汽车价格
    $vehicleAge='无';//车龄
    $vehicleInsurance='无';//汽车保险
   	$carInsuranceAmount='无';//车险额度

}


if($ownGuaranteeSlip==1){
	$matchinginsurance = db('matchinginsurance')->where('matching_id',$order['matching_id'])->find();

	$insuranceName=$matchinginsurance['insuranceName'];//保险公司
	$insuranceType=$matchinginsurance['insuranceType'];//保单类型
	$insuranceTime=$matchinginsurance['insuranceTime'];//保单有效时间
	$insurancePaymentMethod=$matchinginsurance['insurancePaymentMethod'];//保单缴费方式
	$insuranceAgeLimit=$matchinginsurance['insuranceAgeLimit'];//保单已缴费年限
	$insurancePrice=$matchinginsurance['insurancePrice'];//保单单次缴费

}else{

	$insuranceName='无';//保险公司
	$insuranceType='无';//保单类型
	$insuranceTime='无';//保单有效时间
	$insurancePaymentMethod='无';//保单缴费方式
	$insuranceAgeLimit='无';//保单已缴费年限
	$insurancePrice='无';//保单单次缴费
}

if($ownPersonage==1){
$matchingpersonage = db('matchingpersonage')->where('matching_id',$order['matching_id'])->find();

	$income=$matchingpersonage['income'];//个人或企业流水
	$company=$matchingpersonage['company'];//公司
	$tax=$matchingpersonage['tax'];//个税缴纳情况
	$seniority=$matchingpersonage['seniority'];//工龄
	$creditLimit=$matchingpersonage['creditLimit'];//信用卡总额度
	$zhimaCredit=$matchingpersonage['zhimaCredit'];//芝麻信用
	$tinyGrainLoan=$matchingpersonage['tinyGrainLoan'];//微粒贷
	$education=$matchingpersonage['education'];//学历


}else{

	$income='无';//个人或企业流水
	$company='无';//公司
	$tax='无';//个税缴纳情况
	$seniority='无';//工龄
	$creditLimit='无';//信用卡总额度
	$zhimaCredit='无';//芝麻信用
	$tinyGrainLoan='无';//微粒贷
	$education='无';//学历
}


 $data =[
 'orderNumber'=>$orderNumber,
 'goodName'=>$goodName,
 'portrait'=>$portrait,
 'phone'=> $phone ,
 'label'=> $label ,
 'agelimit'=> $agelimit ,
 'accrual'=> $accrual ,
 'limit'=> $limit ,
 'logo'=> $logo ,
 'name'=> $name ,
 'sex'=> $sex ,
 'age'=> $age ,
 'profession'=> $profession ,
 'credit'=> $credit ,
 'liabilities'=> $liabilities ,
 'socialSecurity'=> $socialSecurity ,
 'socialSecurityBasics'=> $socialSecurityBasics ,
 'accumulationFund'=> $accumulationFund ,
 'accumulationFundBasics'=> $accumulationFundBasics ,
 'houseBuyType'=> $houseBuyType ,
 'houseCity'=> $houseCity ,
 'houseArea'=> $houseArea ,
 'houseValue'=> $houseValue ,
 'houseType'=> $houseType ,
 'vehicleBuyType'=> $vehicleBuyType ,
 'vehicleLoanType'=> $vehicleLoanType ,
 'licensePlateProvince'=> $licensePlateProvince ,
 'vehicleUse'=> $vehicleUse ,
 'vehiclePrice'=> $vehiclePrice ,
 'vehicleAge'=> $vehicleAge ,
 'vehicleInsurance'=> $vehicleInsurance ,
 'carInsuranceAmount'=> $carInsuranceAmount ,
 'insuranceName'=> $insuranceName ,
 'insuranceType'=> $insuranceType ,
 'insuranceTime'=> $insuranceTime ,
 'insurancePaymentMethod'=> $insurancePaymentMethod ,
 'insuranceAgeLimit'=> $insuranceAgeLimit ,
 'insurancePrice'=> $insurancePrice ,
 'income'=> $income ,
 'company'=> $company ,
 'tax'=> $tax ,
 'seniority'=> $seniority ,
 'creditLimit'=> $creditLimit ,
 'zhimaCredit'=> $zhimaCredit ,
 'tinyGrainLoan'=> $tinyGrainLoan ,
 'education'=> $education ,
 'lastmessage'=> $lastmessage


 ];

	$this->assign('data', $data);

	return $this->fetch();


      }


 public function orderdetail()
    {



    $oid=$_GET['id'];
//		$oid=77;
    $order = db('order')->where('order_id',$oid)->find();
    $lastmessage=$order['lastmessage'];
     $orderNumber=$order['orderNumber'];
     $addtime=$order['addtime'];
    $user = db('user')->where('user_id',$order['user_id'])->find();

$phone=$user['phone'];//手机号
$portrait=$user['portrait'];

$good = db('good')->where('good_id',$order['good_id'])->find();
$goodName=$good['goodName'];
$label=$good['label'];//标签
$agelimit=$good['agelimit'];//期限
$accrual=$good['accrual'];//利息
$limit=$good['limit'];//额度

 $bank = db('bank')->where('b_id',$good['bankid'])->find();

 $logo=$bank['logo'];//logo

    $matching = db('matching')->where('matching_id',$order['matching_id'])->find();
    $name=$matching['name'];//姓名
    $sex=$matching['sex'];//性别
    $age=$matching['age'];//年龄
    $profession=$matching['profession'];//职业
    $credit=$matching['credit'];//征信查询
    $liabilities=$matching['liabilities'];//个人负债
    $socialSecurity=$matching['socialSecurity'];//社保
    $socialSecurityBasics=$matching['socialSecurityBasics'];//社保基数
    $accumulationFund=$matching['accumulationFund'];//公积金
    $accumulationFundBasics=$matching['accumulationFundBasics'];//公积金基数
    $houseBuyType=$matching['houseBuyType'];//房产购置方式


$ownHouse=$matching['ownHouse'];//是否拥有房产1是0否
$ownAutomobile=$matching['ownAutomobile'];//拥有汽车1是0否
$ownGuaranteeSlip=$matching['ownGuaranteeSlip'];//拥有保单1是0否
$ownPersonage=$matching['ownPersonage'];//个人和企业

if($ownHouse==1){

$matchinghouse = db('matchinghouse')->where('matching_id',$order['matching_id'])->find();
   $houseCity=$matchinghouse['houseCity'];//房产城市
   $houseArea=$matchinghouse['houseArea'];//房产面积
   $houseValue=$matchinghouse['houseValue'];//房产估值
   $houseType=$matchinghouse['houseType'];//房产类型

}else{
	$houseCity='无';//房产城市
   $houseArea='无';//房产面积
   $houseValue='无';//房产估值
   $houseType='无';//房产类型

}

if($ownAutomobile==1){

$matchingvehicle = db('matchingvehicle')->where('matching_id',$order['matching_id'])->find();

   $vehicleBuyType=$matchingvehicle['vehicleBuyType'];//汽车购置方式
    $vehicleLoanType=$matchingvehicle['vehicleLoanType'];//可接受车贷类型
    $licensePlateProvince=$matchingvehicle['licensePlateProvince'];//汽车购置方式
  	$vehicleUse=$matchingvehicle['vehicleUse'];//汽车用途
    $vehiclePrice=$matchingvehicle['vehiclePrice'];//汽车价格
    $vehicleAge=$matchingvehicle['vehicleAge'];//车龄
    $vehicleInsurance=$matchingvehicle['vehicleInsurance'];//汽车保险
   	$carInsuranceAmount=$matchingvehicle['carInsuranceAmount'];//车险额度

}else{

   $vehicleBuyType='无';//汽车购置方式
    $vehicleLoanType='无';//可接受车贷类型
    $licensePlateProvince='无';//汽车购置方式
  	$vehicleUse='无';//汽车用途
    $vehiclePrice='无';//汽车价格
    $vehicleAge='无';//车龄
    $vehicleInsurance='无';//汽车保险
   	$carInsuranceAmount='无';//车险额度

}


if($ownGuaranteeSlip==1){
	$matchinginsurance = db('matchinginsurance')->where('matching_id',$order['matching_id'])->find();

	$insuranceName=$matchinginsurance['insuranceName'];//保险公司
	$insuranceType=$matchinginsurance['insuranceType'];//保单类型
	$insuranceTime=$matchinginsurance['insuranceTime'];//保单有效时间
	$insurancePaymentMethod=$matchinginsurance['insurancePaymentMethod'];//保单缴费方式
	$insuranceAgeLimit=$matchinginsurance['insuranceAgeLimit'];//保单已缴费年限
	$insurancePrice=$matchinginsurance['insurancePrice'];//保单单次缴费

}else{

	$insuranceName='无';//保险公司
	$insuranceType='无';//保单类型
	$insuranceTime='无';//保单有效时间
	$insurancePaymentMethod='无';//保单缴费方式
	$insuranceAgeLimit='无';//保单已缴费年限
	$insurancePrice='无';//保单单次缴费
}

if($ownPersonage==1){
$matchingpersonage = db('matchingpersonage')->where('matching_id',$order['matching_id'])->find();

	$income=$matchingpersonage['income'];//个人或企业流水
	$company=$matchingpersonage['company'];//公司
	$tax=$matchingpersonage['tax'];//个税缴纳情况
	$seniority=$matchingpersonage['seniority'];//工龄
	$creditLimit=$matchingpersonage['creditLimit'];//信用卡总额度
	$zhimaCredit=$matchingpersonage['zhimaCredit'];//芝麻信用
	$tinyGrainLoan=$matchingpersonage['tinyGrainLoan'];//微粒贷
	$education=$matchingpersonage['education'];//学历


}else{

	$income='无';//个人或企业流水
	$company='无';//公司
	$tax='无';//个税缴纳情况
	$seniority='无';//工龄
	$creditLimit='无';//信用卡总额度
	$zhimaCredit='无';//芝麻信用
	$tinyGrainLoan='无';//微粒贷
	$education='无';//学历
}


 $data =[
 'addtime'=>$addtime,
 'orderNumber'=>$orderNumber,
 'goodName'=>$goodName,
 'portrait'=>$portrait,
 'phone'=> $phone ,
 'label'=> $label ,
 'agelimit'=> $agelimit ,
 'accrual'=> $accrual ,
 'limit'=> $limit ,
 'logo'=> $logo ,
 'name'=> $name ,
 'sex'=> $sex ,
 'age'=> $age ,
 'profession'=> $profession ,
 'credit'=> $credit ,
 'liabilities'=> $liabilities ,
 'socialSecurity'=> $socialSecurity ,
 'socialSecurityBasics'=> $socialSecurityBasics ,
 'accumulationFund'=> $accumulationFund ,
 'accumulationFundBasics'=> $accumulationFundBasics ,
 'houseBuyType'=> $houseBuyType ,
 'houseCity'=> $houseCity ,
 'houseArea'=> $houseArea ,
 'houseValue'=> $houseValue ,
 'houseType'=> $houseType ,
 'vehicleBuyType'=> $vehicleBuyType ,
 'vehicleLoanType'=> $vehicleLoanType ,
 'licensePlateProvince'=> $licensePlateProvince ,
 'vehicleUse'=> $vehicleUse ,
 'vehiclePrice'=> $vehiclePrice ,
 'vehicleAge'=> $vehicleAge ,
 'vehicleInsurance'=> $vehicleInsurance ,
 'carInsuranceAmount'=> $carInsuranceAmount ,
 'insuranceName'=> $insuranceName ,
 'insuranceType'=> $insuranceType ,
 'insuranceTime'=> $insuranceTime ,
 'insurancePaymentMethod'=> $insurancePaymentMethod ,
 'insuranceAgeLimit'=> $insuranceAgeLimit ,
 'insurancePrice'=> $insurancePrice ,
 'income'=> $income ,
 'company'=> $company ,
 'tax'=> $tax ,
 'seniority'=> $seniority ,
 'creditLimit'=> $creditLimit ,
 'zhimaCredit'=> $zhimaCredit ,
 'tinyGrainLoan'=> $tinyGrainLoan ,
 'education'=> $education ,
 'lastmessage'=> $lastmessage


 ];

	$this->assign('data', $data);

	return $this->fetch();


      }
  }
