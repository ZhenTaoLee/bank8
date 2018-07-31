<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Db;

class Handle extends Index{


	//经办排行
	  public function show()
    {

   	$cityName=$_POST['cityName'];
   	
   	$page=$_POST['page'];
//	$cityName="广州";
// 	$page=1;
	$map['city']  = ['like',"%" . $cityName . "%"];



if($page==0){


//  $number=$_POST['number'];
    $data = db('handle')
	->join('bank','bank.b_id = bank_id','left')
	->field('han_id,orderReceivings,bank_id,experience,name,reputations,reputation,phone,portrait,sex,
	bank.bankname,makeABargain,limit')
	->where($map)
	->order('grade desc')
	->select();
}else{

	$f=$page-1;
	$s=$f*8;

//  $number=$_POST['number'];
    $data = db('handle')
	->join('bank','bank.b_id = bank_id','left')
	->field('han_id,orderReceivings,bank_id,experience,name,reputations,reputation,phone,portrait,sex,bank.bankname,makeABargain,limit')
	->where($map)
	->order('grade desc')->limit($s,8)->select();
}


	foreach ($data as $key => $val) {


		$data[$key]['limit']=$data[$key]['limit']."万";

				}
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);



    }

		//金币充值展示
		public function gold ( )
		{
			$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    // 	$deviceid=$info['deviceid'];
		// $user = db('user')->where('user_id',$id)->find();
		// $device=$user['device'];
		// if($deviceid!=$device){
		// 	return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		// }
		$data = db('goldcoin')->field('id,goldimg,golded')->select();

		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

		}


		//使用巴币加分
		public function addIntegral()
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

			//经办要加分数
			$graderes = $_POST['grade'];

			//查询已有分数
			$marks = db('handle')->field('money,grade,handlecity')->where('u_id',$id)->find();
			$res = $marks['money'];
			$rs = $marks['grade'];
			$handlecity=$marks['handlecity'];
			//分数对应巴币
			$moneyres = $graderes*10;

			$grade = $rs + $graderes;
			$money = $res - $moneyres;
			$arr=rand(100000,999999);
			$payodd=time().$arr;
			$data = [
			'grade' => $grade,
			'money' => $money
			];


			//判断金币余额
			if ($res >= 10){

			$mark = db('handle')->where('u_id', $id)->update($data);

			$expensedd = ['expensetype' => '余额消费', 'addAndSubtract' => "-",'goldmoney'=>$moneyres,'userid'=>$id,'addtime'=>time(),'payment'=>'余额支付','goldorder_sn'=>$payodd];
			$payed = ['consume' =>1,'explain' => '购买积分消费', 'patte' =>3,'money'=>$graderes,'userid'=>$id,'paytime'=>time(),'payment'=>'余额支付','payodd'=>$payodd,'city'=>$handlecity];


			if($mark){

				$expense = db('expense')->insert($expensedd);
				$addpay = db('pay')->insert($payed);

				return json(['state'=>2558,'data'=>$data,'mesg'=>'加分完成']);
			}else{

			return json(['state'=>4040,'data'=>[''],'mesg'=>'加分失败']);
			}

			}else{

			return json(['state'=>4040,'data'=>[''],'mesg'=>'余额不足']);

			}


		}

		//我的钱包(账户余额)
		public function money ( )
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

		// $id = 83;
		// 	$deviceid=$info['deviceid'];
		// $user = db('user')->where('user_id',$id)->find();
		// $device=$user['device'];
		// if($deviceid!=$device){
		// 	return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		// }

				$handle = db('handle')->field('money,freeze_money')->where('u_id',$id)->find();

				$money=$handle['money'];
				$freeze_money=$handle['freeze_money'];
				$tmoney= ceil($money/10);



				$data=['money'=>$money,'freeze_money'=>$freeze_money,'tmoney'=>$tmoney];
				return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
//				var_dump($data);

		}

		//账单记录
	 public function record ()
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

		//订单记录查询
		$list = db('expense')->where('userid',$id)->order('addtime desc')->select();
		$user = db('user')->where('user_id',$id)->find();


		if($user['type']==1){
		foreach ($list as $key => &$val) {
		$tt=$list[$key]['goldmoney'];
		$list[$key]['goldmoney']="¥".$tt;
		$list[$key]['addtime']=date('Y-m-d H:i:s',$list[$key]['addtime']);

		}
		}else{
		foreach ($list as $key => &$val) {
		$ff=$list[$key]['addtime'];
		$list[$key]['goldmoney']=$list[$key]['goldmoney']."八币";
		$list[$key]['addtime']=date('Y-m-d H:i:s',$ff);
		}
		}


					return json(['state'=>2558,'data'=>$list,'mesg'=>'操作完成']);


		}

    public function good()
    {

    $id=$_POST['bank_id'];
    $bank = db('bank')->where('b_id',$id)->find();
    

    if($bank['city']=='广州' ){
    $data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,goodtype,good_id,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
	->where('bankid',$id)
	->where('putaway',1)
	->select();
	
	$info= Request::instance()->header();
		$sss=$info['user-agent'];
	foreach ($data as $key => $val) {
		if(strpos($sss,'iOS') !== false ){
	$data[$key]['goodtype'] = $data[$key]['goodtype'];
}else{
	if($data[$key]['goodtype']==4){		
		$data[$key]['goodtype'] = 5;
	}elseif($data[$key]['goodtype']==5){
		$data[$key]['goodtype'] = 4;
	}else{
	$data[$key]['goodtype'] = $data[$key]['goodtype'];	
	}
}
				$data[$key]['url'] ="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];

				}
    }else{
    	$map['city']  = ['like',"%" . $bank['city'] . "%"];
    	$map['putaway']  = 1;	
    	$data = db('good')
	   	->join('bank','bankid = ba_bank.b_id','left')
		->field('goodName,goodtype,good_id,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->order('ratio asc')
		->where($map)
		->select();
		
		$info= Request::instance()->header();
		$sss=$info['user-agent'];
		
		foreach ($data as $key => $val) {
			$data[$key]['bankname']='鑫易贷';
			$data[$key]['logo']='https://zykj.8haoqianzhuang.cn/d8102201805111509165160.png';
			
if(strpos($sss,'iOS') !== false ){

	if($data[$key]['goodtype']==1){
				$data[$key]['goodtype']==1;
				$data[$key]['goodName']='房信用贷';
			}elseif($data[$key]['goodtype']==2){
				$data[$key]['goodtype']==2;
				$data[$key]['goodName']='车信用贷';
			}elseif($data[$key]['goodtype']==3){
				$data[$key]['goodtype']==3;
				$data[$key]['goodName']='保单信用贷';
			}elseif($data[$key]['goodtype']==4){
				$data[$key]['goodtype']==4;
				$data[$key]['goodName']='信用贷';
			}elseif($data[$key]['goodtype']==5){
				$data[$key]['goodtype']==5;
				$data[$key]['goodName']='公积金信用贷';
			}
}else{
			if($data[$key]['goodtype']==1){
				$data[$key]['goodtype']==1;
				$data[$key]['goodName']='房信用贷';
			}elseif($data[$key]['goodtype']==2){
				$data[$key]['goodtype']==2;
				$data[$key]['goodName']='车信用贷';
			}elseif($data[$key]['goodtype']==3){
				$data[$key]['goodtype']==3;
				$data[$key]['goodName']='保单信用贷';
			}elseif($data[$key]['goodtype']==4){
				$data[$key]['goodtype']==5;
				$data[$key]['goodName']='公积金信用贷';
			}elseif($data[$key]['goodtype']==5){
				$data[$key]['goodtype']==4;
				$data[$key]['goodName']='信用贷';
			}
}
			
			
				$data[$key]['url'] ="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];

				}
    }
//	$id=2;


		

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }

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
//  	$id=84;
    $data = db('handle')
    ->join('user','u_id = ba_user.user_id','left')
    ->join('bank','bank_id = ba_bank.b_id','left')   ->field('han_id,baname,ba_handle.sex,ba_handle.phone,ba_handle.portrait,experience,ba_bank.bankname,ba_bank.city,ba_user.ntype')
    ->where('u_id',$id)
    ->find();

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }

//排行
     public function ranking()
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

	$handle= db('handle')
    ->where('u_id',$id)
    ->find();


      $result = Db::query("select (@rowNum:=@rowNum+1) as paiming,a.han_id,a.name,a.portrait,a.grade,a.u_id,a.bank_id from ba_handle a, (Select (@rowNum :=0) ) b where handlecity='".$handle['handlecity']."' order by grade DESC  limit 10");

	     $results = Db::query("select (@rowNum:=@rowNum+1) as paiming,a.han_id,a.name,a.portrait,a.grade,a.u_id,a.bank_id from ba_handle a, (Select (@rowNum :=0) ) b where handlecity='".$handle['handlecity']."'order by grade DESC");
			 foreach ($results as $key => $val){
				 $bank = db('bank')->where('b_id', $results[$key]['bank_id'])->find();
				 $results[$key]['bankname']=$bank['bankname'];

                        if( $results[$key]['u_id'] == $id){

                            $datalist = ['han_id'=> $results[$key]['han_id'],'name'=> $results[$key]['name'],'portrait'=> $results[$key]['portrait'],'u_id'=> $results[$key]['u_id'],'paiming'=> $results[$key]['paiming'],'grade'=> $results[$key]['grade'],'bankname'=>$bank['bankname']];

                        }

                }

   	return json(['state'=>2558,'data'=>['rankingList'=>$results ,'location' =>$datalist],'mesg'=>'操作完成']);



    }

      //经办提现
      public function withdraw()
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

		 		$money=$_POST['money'];//提现金额
	      // $money=1000;//提现金额


	       $handle = db('handle')->where('u_id',$id)->find();
	       $handleid=$handle['han_id'];
				 $tmoneys =$money*10;

	      $money2=$handle['money'];//可用金额

	      $freeze_money = $handle['freeze_money'];//冻结金额
				$arr=rand(100000,999999);
				$payodd=time().$arr;


         if($money > $money2){

					return json(['state'=>4040,'data'=>[''],'mesg'=>'提现金额与可提现金额有冲突请重新提现']);
           // $tmoney=0;
         }

         if($money<=$money2){


              $paydata = ['handleid' => $handleid, 'deposit' => $money,'addtime'=>time()];

              $withdraw = db('withdraw')->insert($paydata);



							if($withdraw){


								 $money3 = $money2 - $money*10 ;//提现后可用余额
								 $freeze_money = $handle['freeze_money'] + $money*10;//提现后插入数据表的冻结八币

							 	$ndl= db('handle')->where('han_id',$handleid)->update(['money' => $money3,'freeze_money'=>$freeze_money]);


								// $mark = db('handle')->where('u_id', $id)->update($data);
								$expensedd = ['expensetype' => '提现', 'addAndSubtract' => "-",'goldmoney'=>$tmoneys,'userid'=>$id,'addtime'=>time(),'payment'=>'线下提现','goldorder_sn'=>$payodd];
								$expense = db('expense')->insert($expensedd);



								if($ndl){
									return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
								} else {
										 return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
								}

							 return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

						}

							return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);

					}

     }


		 //app充值金币订单
	     public function appOrder ()
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

			 		$handle = db('handle')->where('u_id',$id)->find();
			 		$handleid=$handle['han_id'];


			 		$gid=$_POST['gid'];
	         $payodd = $_POST['payodd'];//支付宝返回单号
	         $patternodd=$_POST['patternodd'];


	         $data = db('goldcoin')->where('id',$gid)->find();
	         $gold = $data['gold'];//拿到拿到金额对呀金币
	         $money = $data['money'];//拿到拿到金额对呀金币
	         //更新经办充值后可用金币
	         $dat = db('handle')->where('han_id',$handleid)->find();
	         $res = $dat['money'] + $gold;
			$handlecity=$dat['handlecity'];

			 		$userdata = db('handle')->where('han_id',$handleid)->update(['money' => $res]);

			 		$paydata = ['userid' => $id, 'payodd' => $payodd,'patte'=>1,'patternodd'=>$patternodd,'money'=>$money,'paytime'=>time(),'explain'=>'充值','city'=>$handlecity];

			 		$pay = db('pay')->insert($paydata);

			 		$expensedd = ['expensetype' => '支付宝支付充值', 'addAndSubtract' => "+",'goldmoney'=>$gold,'userid'=>$id,'addtime'=>time(),'payment'=>'支付宝','goldorder_sn'=>$payodd];

			 		$expense = db('expense')->insert($expensedd);



			 		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);

	     }



	     	public function updPortrait()
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

				$portrait=$_POST['portrait'];
				$ss='https://zykj.8haoqianzhuang.cn/'.$portrait;
				$handle = db('handle')->where('u_id',$id)->find();
				$handleid=$handle['han_id'];

				$upd=db('handle')->where('han_id',$handleid)->update(['portrait' => $ss]);

			  if($upd){
			  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
			  }
			return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);


			}

}
