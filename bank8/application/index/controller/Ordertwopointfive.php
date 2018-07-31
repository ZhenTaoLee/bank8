<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;

//订单2.5
class Ordertwopointfive extends Index{


    //申请进度
	 public function progress()
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

//  $id=62;

	$data = db('order')
	->field('order_id,han_id,addtime,good_id,orderNumber,orderType,matching_id')
	->where('user_id',$id)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','订单转移');
	})
	->order('addtime desc')
	->select();


	foreach ($data as $key => $val) {
	$matching = db('matching')
	->field('city')
	->where('matching_id',$data[$key]['matching_id'])
	->find();
	
	
	
	if($matching['city']=='广州'){
	
		$data[$key]['finallyPrice']=899;

	}elseif($matching['city']=='深圳' ){
	
		$data[$key]['finallyPrice']=1499;

	}else{
		$data[$key]['finallyPrice']=0;
	}
		$data[$key]['onePrice']=0;
		$data[$key]['subscription']=0;
		$data[$key]['payment']=0;//1是0否显示隐藏
		$data[$key]['tailPayment']=0;

		if($data[$key]['han_id']==0){

			$data[$key]['handleName']=" ";
			$data[$key]['phone']="02038472080";
			$data[$key]['portrait']="https://zykj.8haoqianzhuang.cn/c2748201804281811474329.png";
			$data[$key]['makeABargain']=0;
			$data[$key]['loan']=0;	
			$data[$key]['belong']='八号钱庄';

		}else{
		$handle = db('handle')
		->where('han_id',$data[$key]['han_id'])
		->find();
		$data[$key]['handleName']=$handle['name'];
		$data[$key]['phone']=$handle['phone'];
		$data[$key]['portrait']=$handle['portrait'];
		$data[$key]['makeABargain']=$handle['makeABargain'];
		$data[$key]['loan']=$handle['limit'];	
		$data[$key]['reputations']=$handle['reputations'];	
	
	$bank = db('bank')
		->where('b_id',$handle['bank_id'])
		->find();
		
		$data[$key]['belong']=$bank['bankname'];
		}

	$good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->where('good_id',$data[$key]['good_id'])->find();

	$data[$key]['goodName']=$good['goodName'];
	$data[$key]['label']=$good['label'];
	$data[$key]['agelimit']=$good['agelimit'];
	$data[$key]['accrual']=$good['accrual'];
	$data[$key]['limit']=$good['limit'];
	$data[$key]['bankname']=$good['bankname'];
	$data[$key]['logo']=$good['logo'];
	$data[$key]['addtimes']=date('Y-m-d', $data[$key]['addtime']);

				}


   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    
    
    
     //全部
	 public function complete()
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

//  $id=62;

	$data = db('order')
	->field('order_id,han_id,addtime,good_id,orderNumber,orderType,matching_id')
	->where('user_id',$id)
	->order('addtime desc')
	->select();


	foreach ($data as $key => $val) {
	$matching = db('matching')
	->field('city')
	->where('matching_id',$data[$key]['matching_id'])
	->find();
	
	
	
	if($matching['city']=='广州'){
		$data[$key]['onePrice']=0;
		$data[$key]['finallyPrice']=899;

	}elseif($matching['city']=='深圳' ){
		$data[$key]['onePrice']=0;
		$data[$key]['finallyPrice']=1499;

	}else{
		$data[$key]['onePrice']=0;
		$data[$key]['finallyPrice']=0;
	}

//if($data[$key]['orderType']=='已放款'){
//			$data[$key]['subscription']=0;
//			$data[$key]['payment']=1;
//			$data[$key]['tailPayment']=1;
//		}else{
			$data[$key]['subscription']=0;
			$data[$key]['payment']=0;
			$data[$key]['tailPayment']=0;
//		}

	

		if($data[$key]['han_id']==0){

			$data[$key]['handleName']=" ";
			$data[$key]['phone']="02038472080";
			$data[$key]['portrait']="https://zykj.8haoqianzhuang.cn/c2748201804281811474329.png";
			$data[$key]['makeABargain']=0;
			$data[$key]['loan']=0;	
			$data[$key]['belong']='八号钱庄';

		}else{
		$handle = db('handle')
		->where('han_id',$data[$key]['han_id'])
		->find();
		$data[$key]['handleName']=$handle['name'];
		$data[$key]['phone']=$handle['phone'];
		$data[$key]['portrait']=$handle['portrait'];
		$data[$key]['makeABargain']=$handle['makeABargain'];
		$data[$key]['loan']=$handle['limit'];	
		$data[$key]['reputations']=$handle['reputations'];	
	
	$bank = db('bank')
		->where('b_id',$handle['bank_id'])
		->find();
		
		$data[$key]['belong']=$bank['bankname'];
		}

	$good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->where('good_id',$data[$key]['good_id'])->find();

	$data[$key]['goodName']=$good['goodName'];
	$data[$key]['label']=$good['label'];
	$data[$key]['agelimit']=$good['agelimit'];
	$data[$key]['accrual']=$good['accrual'];
	$data[$key]['limit']=$good['limit'];
	$data[$key]['bankname']=$good['bankname'];
	$data[$key]['logo']=$good['logo'];
	$data[$key]['addtimes']=date('Y-m-d', $data[$key]['addtime']);

				}


   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    
    
     //待支付
	 public function unpaid()
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

//  $id=62;

	$data = db('order')
	->field('order_id,han_id,addtime,good_id,orderNumber,orderType,matching_id')
	->where('user_id',$id)
	->where('orderType','已放款')
	->order('addtime desc')
	->select();


	foreach ($data as $key => $val) {
	$matching = db('matching')
	->field('city')
	->where('matching_id',$data[$key]['matching_id'])
	->find();
	
	
	
	if($matching['city']=='广州'){
	
		$data[$key]['finallyPrice']=899;

	}elseif($matching['city']=='深圳' ){
	
		$data[$key]['finallyPrice']=1499;

	}else{
		$data[$key]['finallyPrice']=0;
	}
		$data[$key]['tailPayment']=1;
		$data[$key]['onePrice']=0;
		$data[$key]['subscription']=0;
		$data[$key]['payment']=1;//1是0否显示隐藏
	

		if($data[$key]['han_id']==0){

			$data[$key]['handleName']=" ";
			$data[$key]['phone']="02038472080";
			$data[$key]['portrait']="https://zykj.8haoqianzhuang.cn/c2748201804281811474329.png";
			$data[$key]['makeABargain']=0;
			$data[$key]['loan']=0;	
			$data[$key]['belong']='八号钱庄';

		}else{
		$handle = db('handle')
		->where('han_id',$data[$key]['han_id'])
		->find();
		$data[$key]['handleName']=$handle['name'];
		$data[$key]['phone']=$handle['phone'];
		$data[$key]['portrait']=$handle['portrait'];
		$data[$key]['makeABargain']=$handle['makeABargain'];
		$data[$key]['loan']=$handle['limit'];	
		$data[$key]['reputations']=$handle['reputations'];	
	
	$bank = db('bank')
		->where('b_id',$handle['bank_id'])
		->find();
		
		$data[$key]['belong']=$bank['bankname'];
		}

	$good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->where('good_id',$data[$key]['good_id'])->find();

	$data[$key]['goodName']=$good['goodName'];
	$data[$key]['label']=$good['label'];
	$data[$key]['agelimit']=$good['agelimit'];
	$data[$key]['accrual']=$good['accrual'];
	$data[$key]['limit']=$good['limit'];
	$data[$key]['bankname']=$good['bankname'];
	$data[$key]['logo']=$good['logo'];
	$data[$key]['addtimes']=date('Y-m-d', $data[$key]['addtime']);

				}


   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    
    

    //订单详情
   public function history()
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

	$order_id=$_POST['order_id'];
//$order_id=123;
	$order = db('order')
	->where('order_id',$order_id)
	->find();

	$good = db('good')
	->where('good_id',$order['good_id'])
	->find();

	$bank = db('bank')
	->where('b_id',$good['bankid'])
	->find();

	$data = db('orderhistory')
	->field('addtime,orderType,han_id')
	->where('order_id',$order_id)
	->where('han_id',$order['han_id'])
	->order('orderhistory_id desc')
	->select();
		foreach ($data as $key => $val) {
		$handle = db('handle')
		->where('han_id',$data[$key]['han_id'])
		->find();

		$banks = db('bank')
		->where('b_id',$handle['bank_id'])
		->find();

		$data[$key]['years']=date('Y-m', $data[$key]['addtime']);
		$data[$key]['days']=date('d', $data[$key]['addtime']);
		$data[$key]['months']=date('m-d', $data[$key]['addtime']);
		$data[$key]['timedivision ']=date('H:i', $data[$key]['addtime']);
		//缺少分类每个状态不同的描述
		if($data[$key]['orderType']=='待接单'){
			$data[$key]['describe']="您的贷款申请已经提交给客户经理，请耐心等待。如果疑问，请联系8号钱庄在线客服！";
		}elseif($data[$key]['orderType']=='待沟通'){
			$data[$key]['describe']=$banks['bankname']."的".$handle['name']."已接收您的贷款申请，请保持电话畅通，稍后客户经理会与您取得联系。";
		}elseif($data[$key]['orderType']=='开始受理'){
			$data[$key]['describe']='您申请的'.$bank['bankname'].'的'.$good['goodName'].'已开始受理，请您准备好产品申请所需资料，以免耽搁您的放款进度！';
		}elseif($data[$key]['orderType']=='准备资料'){
			$data[$key]['describe']="贷款申请中，具体情况请联系接单客户经理。";
		}elseif($data[$key]['orderType']=='待签约'){
			$data[$key]['describe']='您申请的'.$bank['bankname'].'的'.$good['goodName'].'资料提交成功，需要您进行签约，请耐心等待或者联系您的客户经理进行签约。';
		}elseif($data[$key]['orderType']=='审核中'){
			$data[$key]['describe']='您申请的'.$bank['bankname'].'的'.$good['goodName'].'已开始审核，请耐心等待结果。';
		}elseif($data[$key]['orderType']=='待放款'){
			$data[$key]['describe']='您申请的'.$bank['bankname'].'的'.$good['goodName'].'审核通过，具体情况请联系接单客户经理。';
		}elseif($data[$key]['orderType']=='已放款'){
			$data[$key]['describe']='您申请贷款成功放款'.$order['orderMoney'].'元，请注意查看收款账户，并尽快支付办理手续费，以免影响您的的个人信用及其它。';
		}elseif($data[$key]['orderType']=='订单转移'){
			$data[$key]['describe']='您申请的'.$bank['bankname'].'的'.$good['goodName'].$handle['name'].'暂时不能办理，系统正在为您为推荐其它客户经理为您办理。请耐心等待。';
		}elseif($data[$key]['orderType']=='订单完成'){
			$data[$key]['describe']="订单完成，感谢您的使用！";
		}elseif($data[$key]['orderType']=='订单失败'){
			$data[$key]['describe']="您的申请的产品，暂时无法办理，具体情况请联系客户经理，如有疑问请咨询8号钱庄在客服。";
		}

		}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }





 //消息详情
	 public function particulars()
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

//  $id=62;
	$order_id=$_POST['order_id'];


	$data = db('order')
	->field('order_id,han_id,addtime,good_id,orderNumber,orderType,matching_id')
	->where('order_id',$order_id)
	->select();


	foreach ($data as $key => $val) {
		
	$matching = db('matching')
	->field('city')
	->where('matching_id',$data[$key]['matching_id'])
	->find();
	
	
	
	if($matching['city']=='广州'){
	
		$data[$key]['finallyPrice']=899;

	}elseif($matching['city']=='深圳' ){
	
		$data[$key]['finallyPrice']=1499;

	}else{
		$data[$key]['finallyPrice']=0;
	}
		$data[$key]['onePrice']=0;
		$data[$key]['subscription']=0;
		$data[$key]['payment']=0;//1是0否显示隐藏
		$data[$key]['tailPayment']=0;

		if($data[$key]['han_id']==0){

			$data[$key]['handleName']=" ";
			$data[$key]['phone']="02038472080";
			$data[$key]['portrait']="https://zykj.8haoqianzhuang.cn/c2748201804281811474329.png";
			$data[$key]['makeABargain']=0;
			$data[$key]['loan']=0;	
			$data[$key]['belong']='八号钱庄';

		}else{
		$handle = db('handle')
		->where('han_id',$data[$key]['han_id'])
		->find();
		$data[$key]['handleName']=$handle['name'];
		$data[$key]['phone']=$handle['phone'];
		$data[$key]['portrait']=$handle['portrait'];
		$data[$key]['makeABargain']=$handle['makeABargain'];
		$data[$key]['loan']=$handle['limit'];	
		$data[$key]['reputations']=$handle['reputations'];	
	
	$bank = db('bank')
		->where('b_id',$handle['bank_id'])
		->find();
		
		$data[$key]['belong']=$bank['bankname'];
		}

	$good = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->where('good_id',$data[$key]['good_id'])->find();

	$data[$key]['goodName']=$good['goodName'];
	$data[$key]['label']=$good['label'];
	$data[$key]['agelimit']=$good['agelimit'];
	$data[$key]['accrual']=$good['accrual'];
	$data[$key]['limit']=$good['limit'];
	$data[$key]['bankname']=$good['bankname'];
	$data[$key]['logo']=$good['logo'];
	$data[$key]['addtimes']=date('Y-m-d', $data[$key]['addtime']);

				}


   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    
    
    
    
        
}
