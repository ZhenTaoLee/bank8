<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
class Handleorder extends Index{





	
	
//我的订单id
   public function myorder()
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

    $handle = db('handle')	
			->where('u_id',$id)
			->find();
	$bid=$handle['bank_id'];	
	  
		$data = db('order')	
		->join('good','ba_good.good_id = ba_order.good_id','left')
		->join('bank','ba_good.bankid = ba_bank.b_id','left')
		->field('orderNumber,ba_bank.bankname,ba_bank.logo,ba_good.goodName,ba_good.cityName,ba_good.label,ba_good.agelimit,ba_good.accrual,ba_good.limit,orderType,matching_id,user_id,lastmessage,ba_order.order_id,ba_order.addtime,ba_good.good_id')
		->where('bankid',$bid)
		->where('audit',1)
		->where('orderType','待接单')	
		->order('order_id asc')
		->select();
	foreach ($data as $key => $val) {  
		$user = db('user')	
			->where('user_id',$data[$key]['user_id'])
			->find();
			
		$matching = db('matching')	
			->where('matching_id',$data[$key]['matching_id'])
			->find();	
		$data[$key]['name']=$matching['name'];
		$data[$key]['phone']=$user['phone'];
		$data[$key]['photo']=$user['portrait'];
		$data[$key]['orderDate']=date("Y-m-d",$data[$key]['addtime']);
		$data[$key]['url']='https://www.8haoqianzhuang.com/index.php/index/Finance/orderdetail?id='.$data[$key]['order_id']; 
			
				 
}
  
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    	 

      }
     //正在处理
      public function process()
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

    $handle = db('handle')	
			->where('u_id',$id)
			->find();
			
	$hid=$handle['han_id'];	
				  
		$data = db('order')	
		->join('good','ba_good.good_id = ba_order.good_id','left')
		->join('bank','ba_good.bankid = ba_bank.b_id','left')
		->field('orderNumber,ba_bank.bankname,ba_bank.logo,ba_good.goodName,ba_good.cityName,ba_good.label,ba_good.agelimit,ba_good.accrual,ba_good.limit,orderType,matching_id,user_id,lastmessage,ba_order.order_id,ba_order.addtime,ba_good.good_id')
		->where('han_id',$hid)
		->where('audit',1)
		->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
	})
		->order('order_id asc')
		->select();
	foreach ($data as $key => $val) {  
		$user = db('user')	
			->where('user_id',$data[$key]['user_id'])
			->find();
			
		$matching = db('matching')	
			->where('matching_id',$data[$key]['matching_id'])
			->find();	
		$data[$key]['name']=$matching['name'];
		$data[$key]['phone']=$user['phone'];
		$data[$key]['photo']=$user['portrait'];
		$data[$key]['orderDate']=date("Y-m-d",$data[$key]['addtime']);
		$data[$key]['url']='https://www.8haoqianzhuang.com/index.php/index/Finance/orderdetail?id='.$data[$key]['order_id'];	
				 
}
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    	 

      }
      
       public function accomplish()
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

    $handle = db('handle')	
			->where('u_id',$id)
			->find();
	$hid=$handle['han_id'];	
				  
		$data = db('order')	
		->join('good','ba_good.good_id = ba_order.good_id','left')
		->join('bank','ba_good.bankid = ba_bank.b_id','left')
		->field('orderNumber,ba_bank.bankname,ba_bank.logo,ba_good.goodName,ba_good.cityName,ba_good.label,ba_good.agelimit,ba_good.accrual,ba_good.limit,orderType,matching_id,user_id,lastmessage,ba_order.order_id,ba_order.addtime,ba_good.good_id')
		->where('han_id',$hid)
		->where('audit',1)
		->where(function ($query) {
				    $query->where('orderType','已放款')
				    ->whereOr('orderType','已完成');
				})
		->order('order_id asc')
		->select();
	foreach ($data as $key => $val) {  
		$user = db('user')	
			->where('user_id',$data[$key]['user_id'])
			->find();
			
		$matching = db('matching')	
			->where('matching_id',$data[$key]['matching_id'])
			->find();	
		$data[$key]['name']=$matching['name'];
		$data[$key]['phone']=$user['phone'];
		$data[$key]['photo']=$user['portrait'];
		$data[$key]['orderDate']=date("Y-m-d",$data[$key]['addtime']);
			
				 
}
  
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    	 

      } 
      
      


//飞单群
     public function flyorder()
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

    $handle = db('handle')	
			->where('u_id',$id)
			->find();
	$handlecity=$handle['handlecity'];				  
		$data = db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->field('ba_order.lastmessage,ba_matching.age,ba_matching.sex,ba_matching.name,ba_order.matching_id
,city,ba_matching.user_id,ba_order.order_id,ba_order.addtime')
		->where('orderType','订单转移')
		->where('city',$handlecity)
		->order('order_id asc')
		->select();
		
	foreach ($data as $key => $val) {  
		$user = db('user')	
			->where('user_id',$data[$key]['user_id'])
			->find();
		$data[$key]['phone']=$user['phone'];
		$data[$key]['url']='https://www.8haoqianzhuang.com/index.php/index/Finance/flydetail?id='.$data[$key]['order_id']; 
		$data[$key]['photo']=$user['portrait'];
		$data[$key]['orderDate']=date("Y-m-d",$data[$key]['addtime']);
}
  
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    	 

      }
      
      
      
        

//接单
     public function receiveorder()
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
    	
	$oid=$_POST['order_id'];
	$order=db('order')->where('order_id',$oid)->find();
	
    $handle = db('handle')	
			->where('u_id',$id)
			->find();
	$hid=$handle['han_id'];
	

		
		
		if($order['orderType']=='订单转移' || $order['orderType']=='待接单'){
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>'待沟通','han_id'=>$hid]);
		$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
if($upd){
	 $bank = db('bank')	
			->where('b_id',$handle['bank_id'])
			->find();
$content="尊敬的客户您好，您的订单已被".$bank['bankname']."_".$handle['name']."接受处理。";	
$user = db('user')	
	->where('user_id',$order['user_id'])
	->find();

$deviceid=$user['device'];	
if(strlen($deviceid) > 8 && strlen($deviceid) < 32){
			$push = new Movement;
			$data['content'] ='【八号钱庄】'. $content;
         	$push->sendNotifySpecial($deviceid, $data['content']);
}	


	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
}else{
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
}
			
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'此单已接']);	
		

    	 

      }
      
      
      //飞单
     public function fly()
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
    	
	$oid=$_POST['order_id'];
	$lastmessage=$_POST['lastmessage'];
			$order = db('order')	
			->where('order_id',$oid)
			->find();
			$hid=$order['han_id'];
			 $handle=db('handle')->where('han_id',$hid)->find();
			
	$matching = db('matching')	
	->where('matching_id',$order['matching_id'])
	->find();
	if($matching['city']=='广州'){
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>'订单转移','lastmessage'=>$order['lastmessage'].$lastmessage,'flynext'=>$order['flynext']+1]);
		if($order['flynext']>2){
			$grade=$handle['grade']-5;
		}else{
			$grade=$handle['grade'];
		}
			$upds = db('handle')->where('han_id',$hid)->update(['grade'=>$grade]);
	}else{
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>'订单失败','lastmessage'=>$order['lastmessage'].$lastmessage,'flynext'=>$order['flynext']+1]);
		if($order['flynext']>2){
			$grade=$handle['grade']-5;
		}else{
			$grade=$handle['grade'];
		}		
	}
		
		
	$user = db('user')	
	->where('user_id',$order['user_id'])
	->find();	
		
	if($matching['city']=='广州'  ){
		$add=db('orderhistory')->insert(['orderType'=>'订单转移','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		
$content="尊敬的客户您好，您的订单已被转发。";	


$deviceid=$user['device'];	
if(strlen($deviceid) > 8 && strlen($deviceid) < 32){
			$push = new Movement;
			$data['content'] ='【八号钱庄】'. $content;
         	$push->sendNotifySpecial($deviceid, $data['content']);
}
	}else{
		
		$content="尊敬的客户您好，您的订单已失败。";	


$deviceid=$user['device'];	
if(strlen($deviceid) > 8 && strlen($deviceid) < 32){
			$push = new Movement;
			$data['content'] ='【八号钱庄】'. $content;
         	$push->sendNotifySpecial($deviceid, $data['content']);
}


		$add=db('orderhistory')->insert(['orderType'=>'订单失败','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
	}

		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);

    	 

      }
    
      //修改状态
       public function amend()
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
    	
	$oid=$_POST['order_id'];
	$orderType=$_POST['orderType'];
	
	$order = db('order')	
	->where('order_id',$oid)
	->find();
	$orderTypes=$order['orderType'];
	
	if($orderTypes=='待沟通'){
		if($orderType=='开始受理' || $orderType=='准备资料' || $orderType=='待签约'  || $orderType=='审核中' || $orderType=='待放款' ){
			$hid=$order['han_id'];
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType]);
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'不能返回上一级处理']);
		}
	}
	elseif($orderTypes=='开始受理'){
		if($orderType=='准备资料' || $orderType=='待签约'  || $orderType=='审核中' || $orderType=='待放款' ){
			$hid=$order['han_id'];
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType]);
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'不能返回上一级处理']);
		}
	}
	elseif($orderTypes=='准备资料'){
		if( $orderType=='待签约'  || $orderType=='审核中' || $orderType=='待放款' ){
			$hid=$order['han_id'];
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType]);
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'不能返回上一级处理']);
		}
	}
	elseif($orderTypes=='待签约'){
		if($orderType=='审核中' || $orderType=='待放款' ){
		$hid=$order['han_id'];
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType]);
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'不能返回上一级处理']);
		}
	}
	elseif($orderTypes=='审核中'){
		if($orderType=='待放款' ){
			$hid=$order['han_id'];
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType]);
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'不能返回上一级处理']);
		}
	}
	
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);


      }
      
      
      
      
       //修改状态(已放款)
       public function loanAmend()
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
    	
	$oid=$_POST['order_id'];
	$orderMoney=$_POST['orderMoney'];//放款金额
	$good_id=$_POST['good_id'];
	$interestRateType=$_POST['interestRateType'];//利率方式
	$interestRate=$_POST['interestRate'];//利率
	$orderDeadline=$_POST['orderDeadline'];//期数
	

	$order = db('order')	
	->where('order_id',$oid)
	->find();
	
	$orderTypes=$order['orderType'];
	
	$matching = db('matching')	
	->where('matching_id',$order['matching_id'])
	->find();

	
	$good = db('good')	
	->where('good_id',$order['good_id'])
	->find();
	
	
//	if($matching['city']=='广州' ){
//		
//		$han_id=$order['han_id'];
//		$handle = db('handle')	
//		->where('han_id',$han_id)
//		->find();
//		
//	if($handle['bank_id']==10132 ){
//	$content="恭喜恭喜！尊敬的客户您好，您的订单".$order['orderNumber']."，订单已完成！请您尽快核实并确认。";
//		
//	$user = db('user')	
//	->where('user_id',$order['user_id'])
//	->find();
//$phone=$user['phone'];
//$deviceid=$user['device'];	
//
//		$orderType='已完成';
//	
//	
//		}else{
//	$content="恭喜恭喜！尊敬的客户您好，您的订单".$order['orderNumber']."，订单已放款！请您尽快核实并确认。";//支付订单服务费
//		
//	$user = db('user')	
//	->where('user_id',$order['user_id'])
//	->find();
//		$phone=$user['phone'];
//		$deviceid=$user['device'];	
//		$orderType='已放款';	
//			
//		}
//		
//	}elseif($matching['city']=='深圳'){
//		
//	if($good['good_id']==712){
//	$content="恭喜恭喜！尊敬的客户您好，您的订单".$order['orderNumber']."，订单已完成！请您尽快核实并确认。";
//		
//	$user = db('user')	
//	->where('user_id',$order['user_id'])
//	->find();
//$phone=$user['phone'];
//$deviceid=$user['device'];	
//
//		$orderType='已完成';	
//			
//		}else{
//			
//	$content="恭喜恭喜！尊敬的客户您好，您的订单".$order['orderNumber']."，订单已放款！请您尽快核实并确认。";//支付订单服务费
//		
//	$user = db('user')	
//	->where('user_id',$order['user_id'])
//	->find();
//		$phone=$user['phone'];
//		$deviceid=$user['device'];	
//		$orderType='已放款';	
//			
//		}
//		
//	}else{
			
		
$content="恭喜恭喜！尊敬的客户您好，您的订单".$order['orderNumber']."，订单已完成！请您尽快核实并确认。";
		
	$user = db('user')	
	->where('user_id',$order['user_id'])
	->find();
$phone=$user['phone'];
$deviceid=$user['device'];	
		$orderType='已完成';
	
//	}
	
if(strlen($deviceid) > 8 && strlen($deviceid) < 32){
			$push = new Movement;
			$data['content'] ='【八号钱庄】'. $content;
         	$push->sendNotifySpecial($deviceid, $data['content']);
}		
	//短信发送  	
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");//螺丝猫
				curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-1d3905ba2c31fe033fdfddbc94e63757');//秘钥
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => $content."【八号钱庄】"));//内容
				
				$res = curl_exec( $ch );
				curl_close( $ch );
				$art = json_decode($res, true);
//				$res  = curl_error( $ch );


	
		$hid=$order['han_id'];
		
		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>$orderType,'orderMoney'=>$orderMoney,'good_id'=>$good_id,'interestRateType'=>$interestRateType,'interestRate'=>$interestRate,'orderDeadline'=>$orderDeadline]);
		$handle=db('handle')->where('han_id',$hid)->find();
		
		$upds = db('handle')->where('han_id',$hid)->update(['grade'=>$handle['grade']+3,
		'makeABargain'=>$handle['makeABargain']+1,'limit'=>$handle['limit']+$orderMoney]);
		
		$add=db('orderhistory')->insert(['orderType'=>$orderType,'addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);

	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);



      }
      
      
      
        //获取机构和产品
       public function ordergood()
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
    

	$handle=db('handle')->where('u_id',$id)->find();


	$bank=db('bank')->where('city',$handle['handlecity'])->field('b_id,bankname,logo')->select();
$ss=array();
	foreach ($bank as $key => $val) {  

			$good=db('good')->where('bankid',$bank[$key]['b_id'])->select();
			foreach ($good as $k => $v) { 
				
				$ss[$k]['good_id']=$good[$k]['good_id'];
				$ss[$k]['goodName']=$good[$k]['goodName'];
				$ss[$k]['label']=$good[$k]['label'];
				$ss[$k]['agelimit']=$good[$k]['agelimit'];
				$ss[$k]['accrual']=$good[$k]['accrual'];
				$ss[$k]['limit']=$good[$k]['limit'];
				$ss[$k]['goodName']=$good[$k]['goodName'];
				}
				
			$bank[$key]['good']=$ss;

			$ss=array();

	}


	  	return json(['state'=>2558,'data'=>$bank,'mesg'=>'操作成功']);


      }
      
      
      
      
      
}

