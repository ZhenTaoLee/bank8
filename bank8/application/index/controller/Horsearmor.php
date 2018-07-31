<?php
namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Cache;
//网站处理类控制器
class Horsearmor extends Index
{



   public function feedback()	  
    {
    					
	return json(['state'=>2558,'data'=>['feedback'=>'反馈成功'],'mesg'=>'反馈成功']);
}


    
	//注册	
 public function register(){

	
	$nickname=$_POST['nickname'];
	$phone=$_POST['phone'];
	$pass=$_POST['pass'];

		
			
				$loge = db('z_user')->where('phone',$phone)->find();
				if($loge){
					
					return json(['state'=>4040 ,'data'=>[''],'mesg'=>'该手机已注册']);		
				}
							
					$useradd = [ 'phone' =>$phone , 'nickname' =>$nickname, 'pass' =>$pass,'portrait'=>'https://zykj.8haoqianzhuang.cn/dd7f3201801221134207823.png'];
					
					$user = db('z_user')->insert($useradd);
					$userid = db('z_user')->getLastInsID();
					
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					$tokenid=$str.$userid;
					$data=[
					'nickname' => $nickname,
					'phone' => $phone,
					'tokenid'=>$tokenid,
					'portrait'=>'https://zykj.8haoqianzhuang.cn/dd7f3201801221134207823.png'
					];
				return json(['state'=>2558,'data'=>$data,'mesg'=>'注册完成']);
		
		
		
		}
	



	//登录	
 public function login(){

	
	$phone=$_POST['phone'];
	$pass=$_POST['pass'];


				$loge = db('z_user')->where('phone',$phone)->find();
				
				if($loge){
					if($pass!=$loge['pass']){
						return json(['state'=>4040 ,'data'=>[''],'mesg'=>'密码错误']);
					}
					
					$userid=$loge['user_id'];
					$nickname=$loge['nickname'];
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
					mt_srand(10000000*(double)microtime());
					for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 20; $i++){
					        $str .= $chars[mt_rand(0, $lc)];  
					}
					$tokenid=$str.$userid;
					$data=[
					'nickname' => $nickname,
					'phone' => $phone,
					'tokenid'=>$tokenid,
					'portrait'=>$loge['portrait']
					];
					return json(['state'=>2558,'data'=>$data,'mesg'=>'登录成功']);	
				}else{
					return json(['state'=>4040 ,'data'=>[''],'mesg'=>'该手机号不存在']);		
				}
							
		
		}
	
	
	
		//个人
 public function personage(){
 	
		$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	
		$loge = db('z_user')->where('user_id',$id)->find();
					$userid=$loge['user_id'];
					$nickname=$loge['nickname'];
					$phone=$loge['phone'];
					$data=[
					'nickname' => $nickname,
					'phone' => $phone,
					'tokenid'=>$tokenid,
					'portrait'=>$loge['portrait']
					];
					
					return json(['state'=>2558,'data'=>$data,'mesg'=>'登录成功']);	
			
		
		}
		
			
		
//获取验证码
	  public function code()	  
    {

    		$phone=$_POST['phone']; 
    	
    		$loge = db('z_user')->where('phone',$phone)->find();
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
			Cache::set('code'.$phone,$arr,300);

   if($art['error']==0){
			return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
		}
		if($art['error']==-40){
			
			return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
		}
   		return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);	
			}else{
				return json(['state'=>4040,'data'=>[''],'mesg'=>'没有此手机号']);
			}	
      
    }
    

  public function forget()	  
    {
    
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	
    	$co =$_POST['code'];
		$phone=$_POST['phone'];
		$pass==$_POST['pass'];
    	$cod=Cache::get('code'.$phone);
    	if($co!=$cod){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'验证码错误']);	
    	}
    	$lo = db('z_user')->where('phone',$phone )->update(['pass' => $pass]);
    	
    	if($lo){
    		return json(['state'=>2558,'data'=>[''],'mesg'=>'修改成功']);
    		
    	}else{
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'修改失败']);
    	}
    	
    }

    //相册列表
         public function photo()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$type =$_POST['type'];
    	if($type==0){
    		$data= db('z_photo')->where('u_id',$id)->select();
    	}else{
    		$data= db('z_photo')->where('u_id',$id)->where('type',$type)->select();
    	}
    	
			foreach ($data as $key => $val) {
				$data[$key]['addtime']=date('Y-m-d H:i:s', $data[$key]['addtime']);
			}
    	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
    	
    } 
      
    
    
        //相册列表
         public function quantity()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>2558,'data'=>['countone'=>0,'counttwo'=>0,'countthree'=>0,'countfour'=>0],'mesg'=>'请登录']);
    	}
   

    		$data= db('z_photo')->where('u_id',$id)->select();
   
    		$countone= db('z_photo')->where('u_id',$id)->where('type',1)->count();
			$counttwo= db('z_photo')->where('u_id',$id)->where('type',2)->count();
			$countthree= db('z_photo')->where('u_id',$id)->where('type',3)->count();
			$countfour= db('z_photo')->where('u_id',$id)->where('type',4)->count();
			
		$data=['countone'=>$countone,'counttwo'=>$counttwo,'countthree'=>$countthree,'countfour'=>$countfour];
    	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
    	
    } 
    
    
    
         //修改昵称
        public function nickname()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$nickname=$_POST['nickname'];

		$upd=db('z_user')->where('user_id',$id)->update(['nickname'=>$nickname]);
		
  		if($upd){
    		return json(['state'=>2558,'data'=>[''],'mesg'=>'修改成功']);
    	}else{
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'修改失败']);
    	}
    	
    }
    
    
    
    
   //添加相片
        public function photoadd()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$photo=$_POST['photo'];
    	$type=$_POST['type'];
    	$padd = [ 'photo' =>'https://zykj.8haoqianzhuang.cn/'.$photo , 'u_id' =>$id, 'addtime' =>time(),'type'=>$type];
    	
		$photoadd = db('z_photo')->insert($padd);
		$photoid = db('z_photo')->getLastInsID();
		
  		if($photo){
    		return json(['state'=>2558,'data'=>[''],'mesg'=>'添加成功']);
    	}else{
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'添加失败']);
    	}
    	
    }
    
      //删除相片
        public function photodelete()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$zid=$_POST['z_photo_id'];
    	
    	$photodelete=db('z_photo')->where('z_photo_id',$zid)->delete();
    	

		
  		if($photodelete){
    		return json(['state'=>2558,'data'=>[''],'mesg'=>'删除成功']);
    	}else{
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'删除失败']);
    	}
    	
    }
    
       //修改头像
        public function portrait()	  
    {
    	$tokenid =$_POST['tokenid'];
		$rest = substr($tokenid , 20 , 5);
    	$id=$rest;
    	if($id==0 || $id==null ){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请登录']);
    	}
    	$portrait='https://zykj.8haoqianzhuang.cn/'.$_POST['portrait'];

		$upd=db('z_user')->where('user_id',$id)->update(['portrait'=>$portrait]);
		
  		if($upd){
    		return json(['state'=>2558,'data'=>[''],'mesg'=>'修改成功']);
    	}else{
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'修改失败']);
    	}
    	
    }
     
}
