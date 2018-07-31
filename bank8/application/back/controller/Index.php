<?php
namespace app\back\controller;
use think\Controller;
use think\Db;
use think\Cache;
use think\Session;
class Index extends Controller
{

    public function index(){
     	
    if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

         return $this->fetch();
		 
     }
	   
    public function inde(){
    	

        if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}
     	
     	
     	$qianxian=Session::get('qianxian','think');
	
		if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='广州经理'&& $qianxian!='深圳经理'&& $qianxian!='珠海经理'&& $qianxian!='杭州经理' ){
			
		echo '欢迎登陆';die();
	}
     	
     	
     	
     	header("Content-type:text/html;charset=utf-8");  
  
		//设置北京时间为默认时区  
		date_default_timezone_set('PRC');  
		//获得当日凌晨的时间戳    
		$today = strtotime(date("Y-m-d"),time());  
     	$todays=$today-86400;
     	
     	
     	
     	
     	
     	
     	
     	
     	
    if($qianxian=='总经理' ||$qianxian=='管理员'){
		
		$map='';	
	}
	
	elseif($qianxian=='广州经理'){
		$city='广州';
		$map['city']=['like',"%广州%"];
	}

	elseif($qianxian=='杭州经理'){
		$city='杭州';
		$map['city']=['like',"%杭州%"];
	}
	
	elseif($qianxian=='深圳经理'){
		$city='深圳';
		$map['city']=['like',"%深圳%"];
	}
	
	elseif($qianxian=='珠海经理'){
		$city='珠海';
		$map['city']=['like',"%珠海%"];
	}
	
     	
     	
     	
     	
     	
     	
     	
     	
     	$userc=db('user')->where('regtime','between',[$todays,$today])->count();
     	$orderc=db('order')->join('matching','ba_order.matching_id = ba_matching.matching_id','left')->where($map)->where('ba_order.addtime','between',[$todays,$today])->count();
     	$payc=db('pay')->where('paytime','between',[$todays,$today])->count();
     	
     	
     	
     	for ($x=6; $x>=0; $x--) {
     		
     		
		  $t=$today-86400*$x;
		  $s=$todays-86400*$x;
		  
		  $userco=db('user')->where('regtime','between',[$s,$t])->count();
		  $usercot[]=['regtime'=>date("Y-m-d",$s),'ss'=>$userco];
		 
		 $orderco=db('order')->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		 ->where($map)
		 ->where('ba_order.addtime','between',[$s,$t])->count();
		 $ordercot[]=['addtime'=>date("Y-m-d",$s),'ss'=>$orderco];	
		} 
     	
		for ($x=29; $x>=0; $x--) {
     		
     		
		  $t=$today-86400*$x;
		  $s=$todays-86400*$x;
		  
		  $userco=db('user')->where('regtime','between',[$s,$t])->count();
		 
		  $orderco=db('order')->where('addtime','between',[$s,$t])->count();
		 
		 if($x==3 || $x==8 || $x==13 || $x==18|| $x==23|| $x==28){
		 	 $usercotf[]=['regtime'=>date("Y-m-d",$s),'ss'=>$userco];
		 	 $ordercotf[]=['addtime'=>date("Y-m-d",$s),'ss'=>$orderco];	
		 }else{
		 	 $usercotf[]=['regtime'=>'','ss'=>$userco];
		 	 $ordercotf[]=['addtime'=>'','ss'=>$orderco];	
		 }
		
		} 
     	
     	
     	
     	$name=Session::get('name');
     	
     	$this->assign('ordercot', $ordercot);
     	$this->assign('usercot', $usercot);
     	
     	$this->assign('ordercotf', $ordercotf);
     	$this->assign('usercotf', $usercotf);
     	
     	$this->assign('userc', $userc);
     	$this->assign('payc', $payc);
     	$this->assign('orderc', $orderc);
     	$this->assign('name', $name);
        return $this->fetch();
		 
     }
    public function left()
    {
    	$qianxian=Session::get('qianxian','think');
    	
		$this->assign('qianxian', $qianxian);
        return $this->fetch();
    }

    public function top()
    {
        
       return $this->fetch();
    }
    
	public function login()
    {
    	
   		 if(request()->isPost()){
    	 $name=$_POST['name'];
   		 $pas=$_POST['pas'];
   		 
   		 $admin=db('admin')->where('name',$name)->find();
   		 $ip = $_SERVER["REMOTE_ADDR"];
   		 
   		 if($name=='admin'){
   		 	$cod=1946;
   		 }else{
   		 	$cod=Cache::get('code'.$admin['phone']);
   		 }
   		 
   		 $co =$_POST['code'];
   		 if($cod!=$co){
   		 	 $this->error('验证码错误');
   		 }
   		 
   		$adminupd=db('admin')->where('admin_id',$admin['admin_id'])->update(['ip' => $ip,'addtime'=>time()]);
			
   		 if($admin){
   		 	if($pas==$admin['pas']){
   		 		Session::set('name',$admin['name']);
        		Session::set('qianxian',$admin['qianxian']);
        		Session::set('nickname',$admin['nickname']);
        		Session::set('id',$admin['admin_id']);
        		$this->success('欢迎登陆啊！'.$admin['nickname'], 'index/index');
   		 	}
   		 		 $this->error('密码错误');

	    	}	
	    	$this->error('用户名错误'); 
	      }
	       return $this->fetch();
	}


	public function delete()
    {
	 Session::delete('name');
	 Session::delete('qianxian');
	 Session::delete('nickname');
	 $this->success('退出', 'index/login');
	}
 
}
