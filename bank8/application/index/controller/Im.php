<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
class Im extends Index{
//	初始化

	  public function show()	  
    {
    	// 指定允许其他域名访问  
header('Access-Control-Allow-Origin:*');  
// 响应类型  
header('Access-Control-Allow-Methods:POST');  
// 响应头设置  
header('Access-Control-Allow-Headers:x-requested-with,content-type');  
    	$appkey="13a85478e49de694877b89d7";
    	function getMillisecond() {
list($t1, $t2) = explode(' ', microtime());
return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}
 
              
		$timestamp = getMillisecond(); 
		$str=rand(1,9000);
		$sbbb=rand(1,999999);
		$random_str=strtoupper (substr (md5 ($str), 0, 20));
		$secret="05701c8b5acd641c7e29fff2"; 
		$signature=md5("appkey=".$appkey."&timestamp=".$timestamp."&random_str=".$random_str."&key=".$secret);
		$snickname="游客".$sbbb;  	
		$admin="zykj".time().$str;
		
		$fft=db('services')->where('type',1)->select();
    $f=db('services')->where('type',1)->count();
    $str=rand(0,$f-1);
    
    
    	$ffft=strtotime(date('Y-m-d',time()));  
    	$ssss=$ffft+32400;
    	$dddd=$ffft+79200;
    	$ssdd=time();
    	if($ssdd<$ssss || $ssdd>$dddd){
    		return json(['state'=>2,'appkey'=>1,'username'=>1,'nickname'=>1,'timestamp'=>1,'random_str'=>1,'nickname'=>1,'signature'=>1,'admin'=>1,'mesg'=>'客服不在']);
    	}
    	
    	
		if($f>0){
			$username=$fft["$str"]['username'];
    	$pas=$fft["$str"]['pas'];
    	$nickname=$fft["$str"]['nickname'];	
    	return json(['state'=>1,'appkey'=>$appkey,'username'=>$username,'nickname'=>$nickname,'timestamp'=>$timestamp,'random_str'=>$random_str,'snickname'=>$snickname,'signature'=>$signature,'admin'=>$admin,'mesg'=>'操作完成']);
    }
    
   	return json(['state'=>2,'appkey'=>1,'username'=>1,'nickname'=>1,'timestamp'=>1,'random_str'=>1,'nickname'=>1,'signature'=>1,'admin'=>1,'mesg'=>'客服不在']);

    }
	
	
	
	
	
	
	
	
	
	//分发客服
	 public function distribute()	  
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
    	$fft=db('services')->where('type',1)->select();
    	$f=db('services')->where('type',1)->count();
    	$str=rand(0,$f-1);
    	$ffft=strtotime(date('Y-m-d',time()));  
    	$ssss=$ffft+32400;
    	$dddd=$ffft+79200;
    	$ssdd=time();
    	if($ssdd<$ssss || $ssdd>$dddd){
    		return json(['state'=>2558,'data'=>['username'=>'','nickname'=>''],'mesg'=>'客服没有在']);
    	}
			if($f>0){
			$username=$fft["$str"]['username'];
//  	$pas=$fft["$str"]['pas'];
    	$nickname=$fft["$str"]['nickname'];	
    	return json(['state'=>2558,'data'=>['username'=>$username,'nickname'=>$nickname],'mesg'=>'操作完成']);
    }

    	return json(['state'=>2558,'data'=>['username'=>'','nickname'=>''],'mesg'=>'客服没有在']);
    	
    	
    	   	
    }
    //登录
	public function login()
	{
		if(request()->isPost()){
			
    	 $name=$_POST['name'];
   		 $pas=$_POST['pas'];
   		 
   		 $admin=db('services')->where('username',$name)->find();
   		 if($admin){
   		 	if($pas==$admin['pas']){
   		 		Session::set('username',$admin['username']);
        	Session::set('pas',$admin['pas']);
        	Session::set('nickname',$admin['nickname']);
        	Session::set('id',$admin['services_id']);
        	$aa= db('services')->where('services_id', $admin['services_id'])->update(['type' => 1]);
        	$this->success('欢迎登陆', 'Im/services');
        	
   		 	}
   		 		 $this->error('密码错误');

	    	}	
	    	$this->error('用户名错误'); 
	      }
	       return $this->fetch();
	       
	}
	//客服端
	public function services()
	{
		
		if(Session::has('username')==null){
     		 $this->success('请登陆', 'im/login');
     	}
     	
		$appkey="13a85478e49de694877b89d7";
		function getMillisecond() {
		list($t1, $t2) = explode(' ', microtime());
		return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
		}          
		$timestamp = getMillisecond();
		$str=rand(1,9000);
		$random_str=strtoupper (substr (md5 ($str), 0, 20));
		$secret="05701c8b5acd641c7e29fff2"; 
		$signature=md5("appkey=".$appkey."&timestamp=".$timestamp."&random_str=".		$random_str."&key=".$secret);
		
		$stime=time()-10800;
		
		
	if(is_array($_GET)&&count($_GET)>0){
		
		$services_id=$_GET['sid'];
	 	$admin=db('services')->where('services_id',$services_id)->find();
		$username=$admin['username'];		
		$pas=$admin['pas'];
		$nickname=$admin['nickname'];
		$id=$services_id;
		$type=$admin['type'];
	
  $usernames = $_GET['username'];
  $this->assign('usernemesd', $usernames);
  $data = ['readsd' =>0];
  $message = db('message')->where('username',$usernames)->update($data);
   
  $lists=db('message')->where('services_id',$services_id)->where('username',$usernames)->order('message_id asc')->select();
  
   $nicknames=db('message')->distinct(true)->field('nickname,appkeys')->where('username',$usernames)->find();
   
   $this->assign('nicknames', $nicknames);
  $this->assign('lists', $lists);
 }else{
 	
 	 $this->assign('usernemesd', '');
 		$username=Session::get('username');		
		$pas=Session::get('pas');
		$nickname=Session::get('nickname');
		$id=Session::get('id');
		$admin=db('services')->where('services_id',$id)->find();
		$type=$admin['type'];
 	$lists=db('message')->where('services_id',0)->select();
  $this->assign('lists', $lists);
  
  	$nicknames=db('message')->distinct(true)->field('nickname,appkeys')->where('message_id',0)->find();
    $this->assign('nicknames', $nicknames);
  
 
  
  
 }

$record=db('record')->select();
   
		$list=db('message')->field('username,nickname,max(message_id) as id')->where('addtime','>',$stime)->where('services_id',$id) ->group('username')->order('id desc')->select();
    	foreach ($list as $key => $val) { 	
				 	$listf=db('message')->where('username',$list[$key]['username'])->where('services_id',$id)->order('message_id desc')->select();
				 	
					$count=db('message')->where('username',$list[$key]['username'])->where('services_id',$id)->count();
					 
					$sum=db('message')->where('username',$list[$key]['username'])->where('services_id',$id)->sum('readsd');  
					
					$list[$key]['content'] =$listf[0]['content'];
					
					$list[$key]['count'] =$count;
					
					$list[$key]['sum'] =$sum;
					
					
				 } 
		
		$this->assign('type', $type);
		$this->assign('record', $record);
		$this->assign('list', $list);
		$this->assign('id', $id);
		$this->assign('appkey', $appkey);
		$this->assign('timestamp', $timestamp);		
		$this->assign('random_str', $random_str);
		$this->assign('signature', $signature);
		$this->assign('username', $username);
		$this->assign('pas', $pas);
		$this->assign('nickname', $nickname);

        // 渲染模板输出
        return $this->fetch();
        
	}
	
	//下线
	public function type0()
	{
		
		if(Session::has('username')==null){
     		 $this->success('请登陆', 'im/login');
     	}
     	$id=$_POST['sid'];
     	
     	
    	$ffft=strtotime(date('Y-m-d',time()));  
    	$ssss=$ffft+32400;
    	$dddd=$ffft+79200;
    	$ssdd=time();
    	
    		 	
    $din=db('services')->where('type',1)->count();
     	if($din==1){
     		if($ssdd>$dddd){
    		$aa= db('services')->where('services_id',$id)->update(['type' => 0]);	
    	}
     			echo 1;
     	}else{
     		$aa= db('services')->where('services_id',$id)->update(['type' => 0]);		
     		if($aa){
     			echo 2;
     		}else{
     			echo 3;
     		}
     	}
	
        
	}
	//上线
	public function type1()
	{
		
		if(Session::has('username')==null){
     		 $this->success('请登陆', 'im/login');
     	}
     	
     	$id=$_POST['sid'];
$aa= db('services')->where('services_id',$id)->update(['type' => 1]);
       if($aa){
     			echo 2;
     		}else{
     			echo 3;
     		} 
     		
	}
	
	
	
		public function otheradd()	  
    {
    	if($_POST['nickname']==null || $_POST['nickname']=='' || $_POST['nickname']==false || $_POST['nickname']==' ' ){
    		$nickname=$_POST['username'];
    	}else{
    		$nickname=$_POST['nickname'];
    	}
				$nickname=$_POST['nickname'];
				$stype=1;
				$username=$_POST['username'];
				$content=$_POST['content'];
				$services_id=$_POST['sid'];
				$appkeys=$_POST['appkeys'];
				$addtime=time();
			
				$data = [
				'appkeys'=>$appkeys,
				'nickname'=>$nickname,
				'stype' => $stype,
				'username' => $username, 
				'content' => $content, 
				'services_id' => $services_id, 
				'addtime' => $addtime
				];
				
				$message = db('message')->insert($data);
				
				if($message){
					echo 0;
				}else{
					echo 1;
				}
	
			
 				
	

    }
	
	
			public function myadd()	  
    {
    	if($_POST['nickname']==''){
    		$nickname=$_POST['username'];
    	}else{
    		$nickname=$_POST['nickname'];
    	}
				$appkeys=$_POST['appkeys'];
				$stype=2;
				$username=$_POST['username'];
				$content=$_POST['content'];
				$services_id=$_POST['sid'];
				$addtime=time();
			
				$data = [
				'appkeys'=>$appkeys,
				'nickname'=>$nickname,
				'stype' => $stype,
				'username' => $username, 
				'content' => $content, 
				'services_id' => $services_id, 
				'readsd' => 0,
				'addtime' => $addtime
				
				];
				
				$message = db('message')->insert($data);
				
				if($message){
					echo 0;
				}else{
					echo 1;
				}
	
    }
	
	
	
	
				public function left()	  
    {
    				
    				$stime=time()-10800;
						$services_id=$_POST['sid'];
						
						$list=db('message')->field('username,nickname,max(message_id) as id')->where('addtime','>',$stime)->where('services_id',$services_id) ->group('username')->order('id desc')->select();
						
    	foreach ($list as $key => $val) { 	
				 	$listf=db('message')->where('username',$list[$key]['username'])->where('services_id',$services_id)->order('message_id desc')->select();
				 	
					$count=db('message')->where('username',$list[$key]['username'])->where('services_id',$services_id)->count();
					 
					$sum=db('message')->where('username',$list[$key]['username'])->where('services_id',$services_id)->sum('readsd');  
					
					$list[$key]['content'] =$listf[0]['content'];
					
					$list[$key]['count'] =$count;
					
					$list[$key]['sum'] =$sum;
					
					
				 } 

			return json($list);
				
				
				
    }
    
    
    
    	public function content()	  
    {
    	
    	$username=$_POST['usernemesd'];
    	if($_POST['usernemesd']==''){
    		
    		$lists=['services_id'=>0];
    		return json($lists);
    	};
			$services_id=$_POST['sid'];
      $lists=db('message')->where('services_id',$services_id)->where('username',$username)->order('message_id asc')->select();
      return json($lists);
      
   }
	

				public function shortcut()	  
    {

	
				$content=$_POST['content'];
				$name=$_POST['sid'];
				$addtime=time();
			
				$data = [
				'content' => $content,
				's_id' => $name, 
				'addtime' => $addtime
				];
				
				$shortcut = db('shortcut')->insert($data);
				
				if($shortcut){
					echo 0;
				}else{
					echo 1;
				}
	
    }
    
    
    
    
	
	
}

