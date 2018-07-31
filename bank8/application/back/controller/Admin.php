<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;
use think\Cache;
use think\Db;
/**
* 
*/
class Admin extends Index
{

	public function show()
	{
		
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian=='管理员' || $qianxian=='总经理'  ){
	$list=db('admin')->order('addtime desc')->paginate(20);
		$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	
	}

	$this->success('没有权限', 'index/inde');
		
        
	}
	
	public function add()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}
	$qianxian=Session::get('qianxian','think');
	if($qianxian=='管理员' || $qianxian=='总经理'  ){
		      
     	if(request()->isPost()){
			$name=$_POST['name'];
			$pas=$_POST['pas'];
			$nickname=$_POST['nickname'];
			$qianxian=$_POST['qianxian'];
			$phone=$_POST['phone'];
			$data = [
				'phone'=>$phone,
	  			'name' =>$name,
	  			'pas'=>$pas,
	  			'nickname' =>$nickname,
	  			'qianxian'=>$qianxian
				];
				$admin = db('admin')->insert($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('添加成功', 'admin/show');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}
		// 渲染模板输出
        return $this->fetch();
	}
      $this->success('没有权限', 'index/inde');	

  
	}
	
	public function delete()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}
$qianxian=Session::get('qianxian','think');
	if($qianxian=='管理员' || $qianxian=='总经理'  ){
		 $id=$_GET['id'];
		$delete=db('admin')->delete($id);
	
		if($delete){
           
            $this->success('删除成功', 'admin/show');
       } else {      
            $this->error('删除失败');
        }
        
   
	}
		
             $this->success('没有权限', 'index/inde');
	}

    
    
    
	//获取验证码
	  public function code()	  
    {

		
    	$username=$_POST["username"]; 
    	
    	$loge = db('admin')->where('name',$username)->find();
		$phone=$loge['phone'];
					
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
      
    }

	
}



?>