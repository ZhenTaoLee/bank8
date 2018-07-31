<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;
class Tax extends Index{

	// 1、张三在2018年一月份税前工资12000元，他需要缴纳各项社会保险金1100元，那么他的税后工资是多少呢？
	//   应纳税所得额==(应发工资－四金)－3500 =12000 － 1100 － 3500 = 7400元，参照上面的工资税率表不含税部分，超过4,155元至7,755元的部分，则适用税率20%，速算扣除数为555。
	//   应缴税款 = 应纳税所得额*税率 － 速算扣除数 = 7400*20% －555= 925元。
	//   实发工资=应发工资－四金－缴税 = 12000 －1100－925 = 9975元
	//个税计算器
	  public function individual()
    {

      	$info= Request::instance()->header();

				// return json(['state'=>2558,'data'=>$info,'mesg'=>'您无需缴纳个人所得税']);


				// 	//**************无用户登录状态下返回个税计算结果*************//
				// 	if ($info['tokenid'] == "" && $info['tokenid'] == 0 && $info['tokenid'] == false) {
				//
				// 		 // return json(['state'=>2558,'data'=>$info,'mesg'=>'您无需缴纳个人所得税']);
				// 		$types="工资税前"; //收入类型
		    // 		$salary=$_POST["salary"];//税前工资
		    // 		$insurance=$_POST["insurance"];//社保
		    //     $threshold=$_POST["threshold"];//起征点
				//
				//
				// 		if ($insurance>=$salary) {
				// 			return json(['state'=>2558,'data'=>['taxableIncome'=>0,'taxRate'=>"0",'deduction'=>0,'taxation'=>0,'wage'=>0],'mesg'=>'您无需缴纳个人所得税']);
				// 		}
				//
				//
				//
		    //     $res = $salary - $insurance;//应发工资－四金
		    //     $taxableIncome = $res - $threshold;//应纳税所得额
				//
		    //     switch ( $taxableIncome ) {
				//
		    //         case $taxableIncome>=0 && $taxableIncome<=1500:
		    //            $taxRate = "3";//适用税率
		    //            $taxint = 0.03;
		    //            $deduction = 0;//速算扣除数
		    //            break;
				//
		    //         case $taxableIncome>=1500 && $taxableIncome<=4500:
		    //           $taxRate = "10";//适用税率
		    //            $taxint = 0.1;
		    //           $deduction = 105;//速算扣除数
		    //           break;
				//
		    //         case $taxableIncome>=4500 && $taxableIncome<=9000:
		    //           $taxRate = "20";//适用税率
		    //            $taxint = 0.2;
		    //           $deduction = 555;//速算扣除数
		    //           break;
				//
		    //         case $taxableIncome>=9000 && $taxableIncome<=35000:
		    //           $taxRate = "25";//适用税率
		    //            $taxint = 0.25;
		    //           $deduction = 1005;//速算扣除数
		    //           break;
				//
		    //         case $taxableIncome>=35000 && $taxableIncome<=55000:
		    //           $taxRate = "30";//适用税率
		    //            $taxint = 0.3;
		    //           $deduction = 2755;//速算扣除数
		    //           break;
				//
		    //         case $taxableIncome>=55000 && $taxableIncome<=80000:
		    //           $taxRate = "35";//适用税率
		    //            $taxint = 0.35;
		    //           $deduction = 5505;//速算扣除数
		    //           break;
				//
		    //         case $taxableIncome>=80000:
		    //           $taxRate = "45";//适用税率
		    //            $taxint = 0.45;
		    //           $deduction = 13505;//速算扣除数
		    //           break;
				//
		    //         default:
		    //         $taxRate = 0;//适用税率
		    //          $taxint = 0;
		    //         $deduction = 0;//速算扣除数
		    //      }
				//
		    //      $data = $taxableIncome * $taxint;
		    //      $taxation = $data - $deduction;//应纳税款
		    //      $wage = $salary - $insurance - $taxation;//实发工资
				//
				//
				// 		 return json(['state'=>2558,'data'=>['taxableIncome'=>$taxableIncome,'taxRate'=>$taxRate,'deduction'=>$deduction,'taxation'=>$taxation,'wage'=>$wage],'mesg'=>'操作成功']);
				//
				//
				// }


				//
     		// $rest = substr($info['tokenid'] , 20 , 5);
      	// $id=$rest;


    		$types="工资税前"; //收入类型
    		$salary=$_POST["salary"];//税前工资
    		$insurance=$_POST["insurance"];//社保
        $threshold=$_POST["threshold"];//起征点
    		// $funds=$_POST["funds"];//公积金
				//
  			// $adddata=['types'=>$types,'salary'=>$salary,'insurance'=>$insurance,'threshold'=>$threshold,'addtime'=>time(),'user_id'=>$id];
  			// $add=db('tax')->insert($adddata);
  			// $vehicleid = db('tax')->getLastInsID();

				if ($insurance>=$salary) {
					return json(['state'=>2558,'data'=>['taxableIncome'=>0,'taxRate'=>"0",'deduction'=>0,'taxation'=>0,'wage'=>0],'mesg'=>'您无需缴纳个人所得税']);
				}

				$gsdata =$salary -$insurance;
				if ($gsdata <= 300 && $gsdata < 0) {
					return json(['state'=>2558,'data'=>['taxableIncome'=>0,'taxRate'=>"0",'deduction'=>0,'taxation'=>0,'wage'=>0],'mesg'=>'您无需缴纳个人所得税']);
				}


        $res = $salary - $insurance;//应发工资－四金
        $taxableIncome = $res - $threshold;//应纳税所得额

        switch ( $taxableIncome ) {

            case $taxableIncome>=0 && $taxableIncome<=1500:
               $taxRate = "3";//适用税率
               $taxint = 0.03;
               $deduction = 0;//速算扣除数
               break;

            case $taxableIncome>=1500 && $taxableIncome<=4500:
              $taxRate = "10";//适用税率
               $taxint = 0.1;
              $deduction = 105;//速算扣除数
              break;

            case $taxableIncome>=4500 && $taxableIncome<=9000:
              $taxRate = "20";//适用税率
               $taxint = 0.2;
              $deduction = 555;//速算扣除数
              break;

            case $taxableIncome>=9000 && $taxableIncome<=35000:
              $taxRate = "25";//适用税率
               $taxint = 0.25;
              $deduction = 1005;//速算扣除数
              break;

            case $taxableIncome>=35000 && $taxableIncome<=55000:
              $taxRate = "30";//适用税率
               $taxint = 0.3;
              $deduction = 2755;//速算扣除数
              break;

            case $taxableIncome>=55000 && $taxableIncome<=80000:
              $taxRate = "35";//适用税率
               $taxint = 0.35;
              $deduction = 5505;//速算扣除数
              break;

            case $taxableIncome>=80000:
              $taxRate = "45";//适用税率
               $taxint = 0.45;
              $deduction = 13505;//速算扣除数
              break;

            default:
            $taxRate = 0;//适用税率
             $taxint = 0;
            $deduction = 0;//速算扣除数
         }

         $data = $taxableIncome * $taxint;
         $taxation = $data - $deduction;//应纳税款
         $wage = $salary - $insurance - $taxation;//实发工资

        // $taxRate=1;//适用税率
        // $deduction=1;//速算扣除数


    	if($info){
    	  	return json(['state'=>2558,'data'=>['taxableIncome'=>$taxableIncome,'taxRate'=>$taxRate,'deduction'=>$deduction,'taxation'=>$taxation,'wage'=>$wage],'mesg'=>'操作成功']);
    	  }
    	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);


      }














}
