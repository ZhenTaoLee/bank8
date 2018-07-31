<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 客户
*/
class User extends Index
{
	//用户
	public function show()
	{
			if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];

			$list=db('user')->where($map)/*->where('type',1)*/->order('user_id desc')->paginate(20);
		}else{
			$list=db('user')/*->where('type',1)*/->order('regtime desc')->paginate(20);
		}	
		$usercount=db('user')/*->where('type',1)*/->count();
		$this->assign('list', $list);
		$this->assign('usercount', $usercount);
        // 渲染模板输出
        return $this->fetch();
	}
	
		public function handleadd()
	{
	
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
   }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理' ){
		$this->success('没有权限', 'index/inde');
	}	
		if(request()->isPost()){
		$bname=$_POST['bname'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        
        $bankid=$_POST['bankid'];
        $li=db('bank')->where('b_id',$bankid)->find();
        $handlecity=$li['city'];
			
	
			$id=$_POST['id'];
			$l = db('handle')->where('u_id',$id)->find();
			if($l){
			$this->error('该账号已是经办账号，升级失败');	
			}
			 $file = request()->file('img');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();

            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
//            //获取当前控制器名称
//
//            $controllerName=$this->getContro();

            // 上传到七牛后保存的文件名
            $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
//            require_once APP_APP_VIR . '/../vendor/qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'ZzQu0_1dTgSOZT5unMqrAxNC8NyvfQFosJowZ8zG';
            $secretKey = 'PsMaLHUhufgFvGTnU_X_s0dcCcZQyny4WI0bz-Ad';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = 'bank8';
            $domain = 'https://zykj.8haoqianzhuang.cn/';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            
            if ($err !== null) {
                $this->error('上传头像失败');
            } else {
                //返回图片的完整URL
                $portrait=$domain . $ret['key'];
            }
  		
            
            $money=0;
            $grade=200;
            $sex=$_POST['sex'];
            $reputations=$_POST['reputations'];
            $reputation=$_POST['reputation'];
            $cardNumber=$_POST['cardNumber'];
            $identityCard=$_POST['identityCard'];
 			$experience=$_POST['experience'];
			$data = [
			'experience'=>$experience,
			'sex'=>$sex,
			'handlecity'=>$handlecity,
			'reputations'=>$reputations,
			'reputation'=>$reputation,
			'cardNumber'=>$cardNumber,
			'identityCard'=>$identityCard,
			'baname'=>$bname,
  			'bank_id' =>$bankid,
			'name' => $name,
			'phone' => $phone, 
			'money' => $money,  					
			'grade' => $grade, 
			'u_id' => $id, 			
			'portrait'=>$portrait
		
			];
			$handle = db('handle')->insert($data);
			$user= db('user')->where('user_id', $id)->update(['type' => 2,'name'=>$bname,'ntype'=>1]);
			if($handle){
				if($user){
					$this->success('升级成功', 'user/show');
				}
				
			}
			$this->error('升级失败');	
		}
		
		$list = db('bank')->field('b_id,bankname,city')->select();
		
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	//经办列表
	public function handleshow()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
   $qianxian=Session::get('qianxian','think'); 
    if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$handlecity='';
			if(input('get.handlecity')!=''){
			$handlecity = input('get.handlecity');
			$map['handlecity']=['like',"%".$_GET['handlecity']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			
			$handlecity = '广州';
			$map['handlecity']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){
			
			$handlecity = '杭州';
			$map['handlecity']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$handlecity = '深圳';
			$map['handlecity']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$handlecity = '珠海';
			$map['handlecity']=['like',"%珠海%"];
	}


		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		
		if(input('get.baname')!=''){
			$baname = input('get.baname');
			$map['baname']=['like',"%".$_GET['baname']."%"];
		}
	
		
		$query=[
			'phone' => input('get.phone'),
			'baname' => input('get.baname'),
			'handlecity'=>$handlecity
			];	

			$list=db('handle')
			->join('bank','bank_id = ba_bank.b_id','left')
			->order('han_id desc')
			->where($map)
			->paginate(20,false,array(
	        'query' => $query
			));
			
			
	
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
        
	}
	
	
	
}



?>