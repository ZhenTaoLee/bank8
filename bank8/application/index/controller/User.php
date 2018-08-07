<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;
use think\Db;
class User extends Index{

    
	//获取验证码
	  public function code()	  
    {
    	$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
		
    	$phone=$_POST["phone"]; 
    	
    		$loge = db('user')->where('phone',$phone)->find();
			if($loge){
				return json(['state'=>4040,'data'=>[''],'mesg'=>'该手机号已注册']);	
			}
					
    	$arr=rand(1000,9999);

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
				curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的用户，您的验证码是：'.$arr.'，请在60秒内输入【八号钱庄】'));//内容
				
				$res = curl_exec( $ch );
				curl_close( $ch );
				$art = json_decode($res, true);
//				$res  = curl_error( $ch );
			Cache::set('code'.$deviceid,$arr,300);

   if($art['error']==0){
			return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
		}
		if($art['error']==-40){
			
			return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
		}
   		return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);
      
    }
 
 
 //获取验证码
	  public function locode()	  
    {
    	$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
		
    	$phone=$_POST["phone"]; 
    	
    	$loge = db('user')->where('phone',$phone)->find();
			if($loge){
				$arr=rand(1000,9999);

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
				curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的用户，您的验证码是：'.$arr.'，请在60秒内输入【八号钱庄】'));//内容
				
				$res = curl_exec( $ch );
				curl_close( $ch );
				$art = json_decode($res, true);
//				$res  = curl_error( $ch );
			Cache::set('codes'.$deviceid,$arr,300);
		if($art['error']==0){
			return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
		}
		if($art['error']==-40){
			
			return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
		}
   		return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);
      	
			}
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'该手机号没注册']);
    	
    }
    
    
 
    
	//注册	
 public function register(){
//		$codes=1111;
$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
 		$cod=Cache::get('code'.$deviceid);
		$data = [''];

		if(request()->isPost()){
			$co =$_POST['code'];
			$phone=$_POST['phone'];
	
			$type=1;
			$addtime=time();
			$regtime=time();
			
			if($co==$cod){
			
				$loge = db('user')->where('phone',$phone)->find();
				if($loge){
					
					return json(['state'=>4040 ,'data'=>$data,'mesg'=>'该手机已注册']);		
				}else{	
							
					$useradd = [ 'phone' =>$phone , 'type' =>$type, 'addtime' =>$addtime, 'regtime' =>$regtime,'portrait'=>'https://zykj.8haoqianzhuang.cn/dd7f3201801221134207823.png','device'=>$deviceid];
					
					$user = db('user')->insert($useradd);
					$userid = db('user')->getLastInsID();

					if($user){
						
		$user = db('user')->where('user_id',$userid)->find();				
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];

		$order1=0;//新增订单
		$order2=0;//正在处理
		$matching=0;//我的匹配	
		
		$ranking=0;//经办我的排名
		$money=0;//经办金额
		
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					$tokenid=$str.$uid;
					
$data = ['user_id'=> $uid ,'nickname'=>$nickname,'phone'=>$phone ,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex ,'applyOrder'=>$order1,'myOrder'=>$order2,'matching'=>$matching,'tokenid'=>$tokenid,'ranking'=>$ranking,'money'=>$money,'ntype'=>0,
'managerBaname'=>0,'managerSex'=>0,'managerPhone'=>0,'managerPortrait'=>0,'managerExperience'=>0,'managerBankname'=>0,'managerCity'=>0,'managerName'=>0,'unpaids'=>0,'allOrder'=>0,'progressOrder'=>0];
//						cookie('code', null);
						return json(['state'=>2558,'data'=>$data,'mesg'=>'注册完成']);
					}else{
						return json(['state'=>4040 ,'data'=>$data,'mesg'=>'注册失败']);
					}					
			}
		}else{
			return json(['state'=>4040 ,'data'=>$data,'mesg'=>'验证码错误']);
		}
		
		}else{
			return json(['state'=>4040 ,'data'=>$data,'mesg'=>'请上传数据']);
		}
		
		
		
		
		}


	//	登录
	   public function login()	  
    {
    	$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
		
		
		
    	if(request()->isPost()){	   
  		$phone=$_POST['phone'];
  		if($phone==' ' || $phone==null ){
  			return json(['state'=>4040,'data'=>[''],'mesg'=>'登录失败,手机号码不能为空']);	
  		}
  		//测试号
  		if($phone==13422561946 || $phone==13556125735 || $phone==13006866000|| $phone==18316541137){
  		$cod=0000;
	  	}else{
	  		$cod=Cache::get('codes'.$deviceid);
	  	}	
	
  		$co =$_POST['code'];
  		if($co==' ' || $co==null ){
  			return json(['state'=>4040,'data'=>[''],'mesg'=>'登录失败,验证码不能为空']);	
  		}
		$addtime=time();
		  		
		$loge = db('user')->where('phone',$phone)->find();
		if($loge){
				if($co!=$cod){
					return json(['state'=>4040,'data'=>[''],'mesg'=>'登录失败，验证码出错']);
				}
					
					$uid=$loge['user_id'];
					$nickname=$loge['nickname'];
					$phone=$loge['phone'];
					$type=$loge['type'];
					$portrait=$loge['portrait'];

					session('sessionid',$uid); //存session
					session('phone',$loge['phone']); //存session	
					
			
		$lo = db('user')->where('user_id',$uid )->update(['addtime' => $addtime,'device'=>$deviceid]);

		$user = db('user')->where('user_id',$uid)->find();				
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];
		$ntype=$user['ntype'];
		//我的匹配
		$matching = db('matching')	
		->field('matching_id,addtime,good_id')
		->where('user_id',$uid)
		->where('good_id','>',0)
		->count();

	//申请进度
	$order1 = db('order')	
	->where('user_id',$uid)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','已放款')
				    ->whereOr('orderType','订单转移');
	})->count();

		
	//我的订单
	$order2 = db('order')	
	->where('user_id',$uid)
	->where(function ($query) {
				    $query->where('orderType','已放款')
				    ->whereOr('orderType','已完成')
				    ->whereOr('orderType','订单失败');
		})->count();
		
		
		
		
//	2.5申请进度	
	$progressOrder = db('order')
	->where('user_id',$uid)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','订单转移');
	})->count();
		
//	2.5全部订单	
	$allOrder = db('order')
	->where('user_id',$uid)
	->count();		
//	2.5待支付		
	$unpaids = db('order')
	->where('user_id',$uid)
	->where('orderType','已放款')
	->count();	
		
		
		if($type==2){
			
	$handletee= db('handle')
    ->where('u_id',$uid)
    ->find();	
		$result = Db::query("select a.*,(@rowNum:=@rowNum+1) as paiming from ba_handle a, (Select (@rowNum :=0) ) b  where handlecity='".$handletee['handlecity']."' order by grade DESC");
		
		
		
		foreach ($result as $v){
                        if($v['u_id'] == $uid){
                        	$ranking=$v['paiming'];
							$money=$v['money'];
                        }
                   }
                  
		}else{
			$ranking=0;
			$money=0;
	
		}

					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					
					$tokenid=$str.$uid;
					
if($type==2){
	$datfff = db('handle')
    ->join('user','u_id = ba_user.user_id','left')
    ->join('bank','bank_id = ba_bank.b_id','left')   ->field('han_id,baname,ba_handle.sex,ba_handle.phone,ba_handle.portrait,experience,ba_bank.bankname,ba_bank.city,ba_user.ntype,ba_handle.name')
    ->where('u_id',$uid)
    ->find();   
    $managerName=$datfff['name'];
    $managerBaname=$datfff['baname'];
    $managerSex=$datfff['sex'];
    $managerPhone=$datfff['phone'];
    $managerPortrait=$datfff['portrait'];
    $managerExperience=$datfff['experience'];
    $managerBankname=$datfff['bankname'];
    $managerCity=$datfff['city'];
	}else{
	$managerName=' ';
    $managerBaname=' ';
    $managerSex=0;
    $managerPhone=0;
    $managerPortrait=' ';
    $managerExperience=' ';
    $managerBankname=' ';
    $managerCity=' ';
	}					
		
$data = [
'user_id'=>$uid,'nickname'=>$nickname,'phone'=>$phone,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex,'applyOrder'=>$order1,'myOrder'=>$order2,'matching'=>$matching,'tokenid'=>$tokenid,'ranking'=>$ranking,'money'=>$money,'ntype'=>$ntype,'managerBaname'=>$managerBaname,'managerSex'=>$managerSex,'managerPhone'=>$managerPhone,'managerPortrait'=>$managerPortrait,'managerExperience'=>$managerExperience,'managerBankname'=>$managerBankname,'managerCity'=>$managerCity,
'managerName'=>$managerName,'unpaids'=>$unpaids,'allOrder'=>$allOrder,'progressOrder'=>$progressOrder];

					
		return json(['state'=>2558,'data'=>$data,'mesg'=>'登录成功']);
				

		}else{
			
			return json(['state'=>4040,'data'=>[''],'mesg'=>'登录失败,手机号码不存在']);			
		}

		}else{
			return json(['state'=>4040,'data'=>[''],'mesg'=>'上传数据为空']);
		}
    }
	
 	
	//	个人中心获和更新
	   public function users()	  
    {   	
    	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		
		if($id==0 || $id==null ){
			
    	$data = ['user_id'=> 0 ,'nickname'=>'','phone'=>0 ,'type'=>0,'portrait'=>'','sex'=>0 ,'applyOrder'=>0,'myOrder'=>0,'matching'=>0,'tokenid'=>$info['tokenid'],'ranking'=>0,'money'=>0,'ntype'=>0,'managerBaname'=>'','managerSex'=>0,'managerPhone'=>0,'managerPortrait'=>'','managerExperience'=>'','managerBankname'=>'','managerCity'=>'','managerName'=>''];

		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		
    	}
    	$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	
    	

		
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];
		$ntype=$user['ntype'];
				//我的匹配
		$matching = db('matching')	
		->field('matching_id,addtime,good_id')
		->where('user_id',$uid)
		->where('good_id','>',0)
		->count();

	//申请进度
	$order1 = db('order')	
	->where('user_id',$id)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				   	->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','已放款')
				    ->whereOr('orderType','订单转移');
	})->count();
	
	//我的订单
	$order2 = db('order')	
	->where('user_id',$id)
	->where(function ($query) {
				    $query->where('orderType','已放款')
				    ->whereOr('orderType','已完成')
				    ->whereOr('orderType','订单失败');
		})->count();
		
		
		
		//	2.5申请进度	
	$progressOrder = db('order')
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
	})->count();
		
//	2.5全部订单	
	$allOrder = db('order')
	->where('user_id',$id)
	->count();		
//	2.5待支付		
	$unpaids = db('order')
	->where('user_id',$id)
	->where('orderType','已放款')
	->count();	
	
	
		if($type==2){
		$handlesrr= db('handle')
	    ->where('u_id',$uid)
	    ->find();	
		$result = Db::query("select a.*,(@rowNum:=@rowNum+1) as paiming from ba_handle a, (Select (@rowNum :=0) ) b  where handlecity='".$handlesrr['handlecity']."' order by grade DESC");
		
		foreach ($result as $v){
                        if($v['u_id'] == $uid){
                        	$ranking=$v['paiming'];
							$money=$v['money'];
                        }
                   }
		}else{
			$ranking=0;
			$money=0;
		}
		
		
	if($type==2){
	$datfff = db('handle')
    ->join('user','u_id = ba_user.user_id','left')
    ->join('bank','bank_id = ba_bank.b_id','left')   ->field('han_id,baname,ba_handle.sex,ba_handle.phone,ba_handle.portrait,experience,ba_bank.bankname,ba_bank.city,ba_user.ntype,ba_handle.name')
    ->where('u_id',$uid)
    ->find();   
    $managerName=$datfff['name'];
    $managerBaname=$datfff['baname'];
    $managerSex=$datfff['sex'];
    $managerPhone=$datfff['phone'];
    $managerPortrait=$datfff['portrait'];
    $managerExperience=$datfff['experience'];
    $managerBankname=$datfff['bankname'];
    $managerCity=$datfff['city'];
	}else{
	$managerName=' ';
    $managerBaname=' ';
    $managerSex=0;
    $managerPhone=0;
    $managerPortrait=' ';
    $managerExperience=' ';
    $managerBankname=' ';
    $managerCity=' ';
	}				
		$data = ['user_id'=> $uid ,'nickname'=>$nickname,'phone'=>$phone ,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex ,'applyOrder'=>$order1,'myOrder'=>$order2,'matching'=>$matching,'tokenid'=>$info['tokenid'],'ranking'=>$ranking,'money'=>$money,'ntype'=>$ntype,'managerBaname'=>$managerBaname,'managerSex'=>$managerSex,'managerPhone'=>$managerPhone,'managerPortrait'=>$managerPortrait,'managerExperience'=>$managerExperience,'managerBankname'=>$managerBankname,'managerCity'=>$managerCity,'managerName'=>$managerName,'unpaids'=>$unpaids,'allOrder'=>$allOrder,'progressOrder'=>$progressOrder];

		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		
			
		
		
    }
    
    
    
    
    
    
    
    
	public function updPortrait()
	{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
		$portrait=$_POST['portrait'];
		$ss='https://zykj.8haoqianzhuang.cn/'.$portrait;
	$upd=db('user')->where('user_id',$id)->update(['portrait' => $ss]);	
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
	public function updName()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;
	$nickname=$_POST['nickname'];
		
	$upd=db('user')->where('user_id',$id)->update(['nickname' => $nickname]);	
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
    
	public function updSex()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;
	$sex=$_POST['sex'];
		
	$upd=db('user')->where('user_id',$id)->update(['sex' => $sex]);	
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
		
	
	
	//退出
	  public function out()	  
    {   	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}


   		$device=rand(1,100000000);
    	$datas = db('user')->where('user_id',$id )->update(['device'=>$device]);
		
		if($datas){
			$data = ['user_id'=> 0 ,'nickname'=>'','phone'=>0 ,'type'=>1,'portrait'=>'','sex'=>0 ,'applyOrder'=>0,'myOrder'=>0,'matching'=>0,'tokenid'=>'','ranking'=>0,'money'=>0,'ntype'=>0];
			
			return json(['state'=>2558,'data'=>$data,'mesg'=>'退出成功']);
		}
		
		return json(['state'=>4040,'data'=>[''],'mesg'=>'退出失败']);
		
    }
    
    
    
    //基本信息
	  public function basic()	  
    {   	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}


			$data = db('user')
			->field('user_id,portrait,name,sex,ageBracket,weilidai,education')
			->where('user_id',$id )
			->find();
		

  
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		
    }


	public function updNames()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;


	$name=$_POST['name'];
		
	$upd=db('user')->where('user_id',$id)->update(['name' => $name,'nickname'=>$name]);
	
		
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
	
	
	public function updWeilidai()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;


	$weilidai=$_POST['weilidai'];
		
	$upd=db('user')->where('user_id',$id)->update(['weilidai' => $weilidai]);
	
		
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}

	
		public function updEducation()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;


	$education=$_POST['education'];
		
	$upd=db('user')->where('user_id',$id)->update(['education' => $education]);
	
		
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
	
	public function updAgeBracket()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;


	$ageBracket=$_POST['ageBracket'];
		
	$upd=db('user')->where('user_id',$id)->update(['ageBracket' => $ageBracket]);
	
		
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
	
	public function updBasic()
		{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
//  	$id=1;

	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$ageBracket=$_POST['ageBracket'];
	$weilidai=$_POST['weilidai'];
	$education=$_POST['education'];
		
	$upd=db('user')->where('user_id',$id)->update(['name' => $name,'sex' => $sex,'ageBracket' => $ageBracket,'weilidai' => $weilidai,'education' => $education,'nickname'=>$name]);
	
		
	  if($upd){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }			
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

			
	}
	
	
	
	

    
 
    
	//登录注册	
 public function loginRegister(){
//		$codes=1111;
$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
		$phone=$_POST['phone'];
 	
		$data = [''];
//测试号
  		if($phone==13422561946 ||  $phone==18024666073){
  			$cod=0000;
	  	}else{
	  		$cod=Cache::get('code'.$deviceid);
	  	}

			$co =$_POST['code'];
			if($co!=$cod){
				return json(['state'=>4040 ,'data'=>$data,'mesg'=>'验证码错误']);
			}
			
			
			$addtime=time();
			$loge = db('user')->where('phone',$phone)->find();
			if($loge){
				
			$uid=$loge['user_id'];
			$nickname=$loge['nickname'];
			$phone=$loge['phone'];
			$type=$loge['type'];
			$portrait=$loge['portrait'];

			session('sessionid',$uid); //存session
			session('phone',$loge['phone']); //存session	
					
			
		$lo = db('user')->where('user_id',$uid )->update(['addtime' => $addtime,'device'=>$deviceid]);

		$user = db('user')->where('user_id',$uid)->find();				
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];
		$ntype=$user['ntype'];
		$name=$user['name'];
		$ageBracket=$user['ageBracket'];
		$weilidai=$user['weilidai'];
		$education=$user['education'];


		
//	2.5申请进度	
	$progressOrder = db('order')
	->where('user_id',$uid)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','订单转移');
	})->count();
		
//	2.5全部订单	
	$allOrder = db('order')
	->where('user_id',$uid)
	->count();		
//	2.5待支付		
	$unpaids = db('order')
	->where('user_id',$uid)
	->where('orderType','已放款')
	->count();	
		
		
		if($type==2){
			
	$handletee= db('handle')
    ->where('u_id',$uid)
    ->find();	
		$result = Db::query("select a.*,(@rowNum:=@rowNum+1) as paiming from ba_handle a, (Select (@rowNum :=0) ) b  where handlecity='".$handletee['handlecity']."' order by grade DESC");
		
		
		
		foreach ($result as $v){
                        if($v['u_id'] == $uid){
                        	$ranking=$v['paiming'];
							$money=$v['money'];
                        }
                   }
                  
		}else{
			$ranking=0;
			$money=0;
	
		}

					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					
					$tokenid=$str.$uid;
					
if($type==2){
	$datfff = db('handle')
    ->join('user','u_id = ba_user.user_id','left')
    ->join('bank','bank_id = ba_bank.b_id','left')   ->field('han_id,baname,ba_handle.sex,ba_handle.phone,ba_handle.portrait,experience,ba_bank.bankname,ba_bank.city,ba_user.ntype,ba_handle.name')
    ->where('u_id',$uid)
    ->find();   
    $managerName=$datfff['name'];
    $managerBaname=$datfff['baname'];
    $managerSex=$datfff['sex'];
    $managerPhone=$datfff['phone'];
    $managerPortrait=$datfff['portrait'];
    $managerExperience=$datfff['experience'];
    $managerBankname=$datfff['bankname'];
    $managerCity=$datfff['city'];
	}else{
	$managerName=' ';
    $managerBaname=' ';
    $managerSex=0;
    $managerPhone=0;
    $managerPortrait=' ';
    $managerExperience=' ';
    $managerBankname=' ';
    $managerCity=' ';
	}					
		
$data = [
'user_id'=>$uid,'nickname'=>$nickname,'phone'=>$phone,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex,'tokenid'=>$tokenid,'ranking'=>$ranking,'money'=>$money,'ntype'=>$ntype,'managerBaname'=>$managerBaname,'managerSex'=>$managerSex,'managerPhone'=>$managerPhone,'managerPortrait'=>$managerPortrait,'managerExperience'=>$managerExperience,'managerBankname'=>$managerBankname,'managerCity'=>$managerCity,
'managerName'=>$managerName,'unpaids'=>$unpaids,'allOrder'=>$allOrder,'progressOrder'=>$progressOrder,
'name'=>$name,'ageBracket'=>$ageBracket,'weilidai'=>$weilidai,'education'=>$education];

					
		return json(['state'=>2558,'data'=>$data,'mesg'=>'登录成功']);
				

				
			}else{
				$type=1;
			$addtime=time();
			$regtime=time();
						
				$useradd = [ 'phone' =>$phone , 'type' =>$type, 'addtime' =>$addtime, 'regtime' =>$regtime,'portrait'=>'https://zykj.8haoqianzhuang.cn/dd7f3201801221134207823.png','device'=>$deviceid];
					
					$user = db('user')->insert($useradd);
					$userid = db('user')->getLastInsID();

					if($user){
						
		$user = db('user')->where('user_id',$userid)->find();				
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];
		
		$ranking=0;//经办我的排名
		$money=0;//经办金额
		
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					$tokenid=$str.$uid;
					
$data = ['user_id'=> $uid ,'nickname'=>$nickname,'phone'=>$phone ,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex ,'tokenid'=>$tokenid,'ranking'=>$ranking,'money'=>$money,'ntype'=>0,
'managerBaname'=>0,'managerSex'=>0,'managerPhone'=>0,'managerPortrait'=>0,'managerExperience'=>0,'managerBankname'=>0,'managerCity'=>0,'managerName'=>0,'unpaids'=>0,'allOrder'=>0,'progressOrder'=>0,'name'=>'','ageBracket'=>'','weilidai'=>0,'education'=>0];
//						cookie('code', null);
						return json(['state'=>2558,'data'=>$data,'mesg'=>'注册完成']);
					}else{
						return json(['state'=>4040 ,'data'=>$data,'mesg'=>'注册失败']);
					}	
						
				
			}
			
			
		}


	//登录注册	
 public function usersTow(){
//		$codes=1111;
	    $info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
			


		$user = db('user')->where('user_id',$id)->find();				
		$uid=$user['user_id'];
		$nickname=$user['nickname'];
		$phone=$user['phone'];
		$type=$user['type'];
		$portrait=$user['portrait'];
		$sex=$user['sex'];
		$ntype=$user['ntype'];
		$name=$user['name'];
		$ageBracket=$user['ageBracket'];
		$weilidai=$user['weilidai'];
		$education=$user['education'];


		
//	2.5申请进度	
	$progressOrder = db('order')
	->where('user_id',$uid)
	->where(function ($query) {
				    $query->where('orderType','开始受理')
				    ->whereOr('orderType','待接单')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款')
				    ->whereOr('orderType','订单转移');
	})->count();
		
//	2.5全部订单	
	$allOrder = db('order')
	->where('user_id',$uid)
	->count();		
//	2.5待支付		
	$unpaids = db('order')
	->where('user_id',$uid)
	->where('orderType','已放款')
	->count();	
		
		
		if($type==2){
			
	$handletee= db('handle')
    ->where('u_id',$uid)
    ->find();	
		$result = Db::query("select a.*,(@rowNum:=@rowNum+1) as paiming from ba_handle a, (Select (@rowNum :=0) ) b  where handlecity='".$handletee['handlecity']."' order by grade DESC");
		
		
		
		foreach ($result as $v){
                        if($v['u_id'] == $uid){
                        	$ranking=$v['paiming'];
							$money=$v['money'];
                        }
                   }
                  
		}else{
			$ranking=0;
			$money=0;
	
		}

					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					
					$tokenid=$str.$uid;
					
if($type==2){
	$datfff = db('handle')
    ->join('user','u_id = ba_user.user_id','left')
    ->join('bank','bank_id = ba_bank.b_id','left')   ->field('han_id,baname,ba_handle.sex,ba_handle.phone,ba_handle.portrait,experience,ba_bank.bankname,ba_bank.city,ba_user.ntype,ba_handle.name')
    ->where('u_id',$id)
    ->find();   
    $managerName=$datfff['name'];
    $managerBaname=$datfff['baname'];
    $managerSex=$datfff['sex'];
    $managerPhone=$datfff['phone'];
    $managerPortrait=$datfff['portrait'];
    $managerExperience=$datfff['experience'];
    $managerBankname=$datfff['bankname'];
    $managerCity=$datfff['city'];
	}else{
	$managerName=' ';
    $managerBaname=' ';
    $managerSex=0;
    $managerPhone=0;
    $managerPortrait=' ';
    $managerExperience=' ';
    $managerBankname=' ';
    $managerCity=' ';
	}					
		
$data = [
'user_id'=>$uid,'nickname'=>$nickname,'phone'=>$phone,'type'=>$type,'portrait'=>$portrait,'sex'=>$sex,'tokenid'=>$tokenid,'ranking'=>$ranking,'money'=>$money,'ntype'=>$ntype,'managerBaname'=>$managerBaname,'managerSex'=>$managerSex,'managerPhone'=>$managerPhone,'managerPortrait'=>$managerPortrait,'managerExperience'=>$managerExperience,'managerBankname'=>$managerBankname,'managerCity'=>$managerCity,
'managerName'=>$managerName,'unpaids'=>$unpaids,'allOrder'=>$allOrder,'progressOrder'=>$progressOrder,
'name'=>$name,'ageBracket'=>$ageBracket,'weilidai'=>$weilidai,'education'=>$education];

					
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
				
		}

	
		  public function codesd()	  
    {
    	$info= Request::instance()->header(); 
//  	   	return json(['data'=>$info,'mesg'=>'1111']);
		$deviceid=$info['deviceid'];
		
    	$phone=$_POST["phone"]; 
 			
    	$arr=rand(1000,9999);

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
				curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的用户，您的验证码是：'.$arr.'，请在60秒内输入【八号钱庄】'));//内容
				
				$res = curl_exec( $ch );
				curl_close( $ch );
				$art = json_decode($res, true);
//				$res  = curl_error( $ch );
			Cache::set('code'.$deviceid,$arr,300);

   if($art['error']==0){
			return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
		}
		if($art['error']==-40){
			
			return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
		}
   		return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);
      
    }
	
	
		//退出
	  public function outTwo()	  
    {   	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];					
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($id==0 || $id==null ){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}


   		$device=rand(1,100000000);
    	$data = db('user')->where('user_id',$id )->update(['device'=>$device]);
		
		if($data){
			$data = [
'user_id'=>0,
'nickname'=>'',
'phone'=>'',
'type'=>1,
'portrait'=>'https:\/\/zykj.8haoqianzhuang.cn\/dd7f3201801221134207823.png',
'sex'=>0,
'tokenid'=>'',
'ranking'=>0,
'money'=>0,
'ntype'=>0,
'managerBaname'=>'',
'managerSex'=>0,
'managerPhone'=>'',
'managerPortrait'=>'',
'managerExperience'=>'',
'managerBankname'=>'',
'managerCity'=>'',
'managerName'=>'',
'unpaids'=>0,
'allOrder'=>0,
'progressOrder'=>0,
'name'=>'',
'ageBracket'=>'',
'weilidai'=>0,
'education'=>0
];


  			
			return json(['state'=>2558,'data'=>$data,'mesg'=>'退出成功']);
		}
		
		return json(['state'=>4040,'data'=>[''],'mesg'=>'退出失败']);
		
    }
	
	
	
	
	
	
}

