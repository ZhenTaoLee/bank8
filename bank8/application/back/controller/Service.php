<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 银行产品
*/
class Service extends Index
{
	
	public function show()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
    
		$qianxian=Session::get('qianxian','think');
		$nickname=Session::get('nickname','think');
		
   if($qianxian!='管理员' && $qianxian!='总经理' && $qianxian!='广州经理'  && $qianxian!='杭州经理'  && $qianxian!='深圳经理'  &&  $qianxian!='珠海经理' ){
			$fasdf=1;
	}else{
		$fasdf=0;
	}
	
		$map['operator']=['like',"%".$nickname."%"];
		if(input('get.star')!=''){
			$star = input('get.star');
			$map['star']=['like',"%".$_GET['star']."%"];
		}
		if(input('get.rank')!=''){
			$rank = input('get.rank');
			$map['rank']=['like',"%".$_GET['rank']."%"];
		}

		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name = input('get.name');
			$map['name']=['like',"%".$_GET['name']."%"];
		}
		if(input('get.remark')!=''){
			$remark = input('get.remark');
			$map['remark']=['like',"%".$_GET['remark']."%"];
		}

		$query=[
			'star'=>input('get.star'),
			'rank'=>input('get.rank'),
			'phone'=>input('get.phone'),
			'remark'=>input('get.remark'),
			'name'=>input('get.name')
			];	
				
		$list=db('f_service')	
		->order('addtime desc')
		->where($map)
		->paginate(10,false,array(
	        'query' => $query
		));
		$countt=db('f_service')	->where($map)->count();
		
		$this->assign('countt', $countt);
		$this->assign('list', $list);
		$this->assign('fasdf', $fasdf);
		$this->assign('nickname', $nickname);
        // 渲染模板输出
        return $this->fetch();
        
        
	}
	
	
	
	
	public function gkshow()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    	}
		$qianxian=Session::get('qianxian','think');
		$nickname=Session::get('nickname','think');
	
	if($qianxian=='管理员' || $qianxian=='总经理'  || $qianxian=='总部助理' ){
				$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}

		
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'|| $qianxian=='广州销售'){
			
			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'|| $qianxian=='杭州销售'){
			
			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'|| $qianxian=='深圳销售'){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理' || $qianxian=='珠海销售'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}



		if(input('get.star')!=''){
			$star = input('get.star');
			$map['star']=['like',"%".$_GET['star']."%"];
		}



		if(input('get.rank')!=''){
			$rank = input('get.rank');
			$map['rank']=['like',"%".$_GET['rank']."%"];
		}

		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name = input('get.name');
			$map['name']=['like',"%".$_GET['name']."%"];
		}
		if(input('get.remark')!=''){
			$remark = input('get.remark');
			$map['remark']=['like',"%".$_GET['remark']."%"];
		}
		$query=[
			'star'=>input('get.star'),
			'rank'=>input('get.rank'),
			'phone'=>input('get.phone'),
			'remark'=>input('get.remark'),
			'name'=>input('get.name')
			];	
		
		$list=db('f_service')	
		->order('addtime desc')
		->where($map)
		->where('updtime','<',time()-432000)
		->paginate(10,false,array(
	        'query' => $query
		));
		
		$this->assign('list', $list);
		$this->assign('nickname', $nickname);
        // 渲染模板输出
        return $this->fetch();
        
        
	}
	public function gkshows()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    	}
		$qianxian=Session::get('qianxian','think');
		$nickname=Session::get('nickname','think');
	
	if($qianxian=='管理员' || $qianxian=='总经理'  || $qianxian=='总部助理' ){
			$map='';
		
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'|| $qianxian=='广州销售'){
			
			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'|| $qianxian=='杭州销售'){
			
			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'|| $qianxian=='深圳销售'){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理' || $qianxian=='珠海销售'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}



		if(input('get.star')!=''){
			$star = input('get.star');
			$map['star']=['like',"%".$_GET['star']."%"];
		}



		if(input('get.rank')!=''){
			$rank = input('get.rank');
			$map['rank']=['like',"%".$_GET['rank']."%"];
		}

		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name = input('get.name');
			$map['name']=['like',"%".$_GET['name']."%"];
		}
		if(input('get.remark')!=''){
			$remark = input('get.remark');
			$map['remark']=['like',"%".$_GET['remark']."%"];
		}
		$query=[
		'city'=>input('get.city'),
			'star'=>input('get.star'),
			'rank'=>input('get.rank'),
			'phone'=>input('get.phone'),
			'remark'=>input('get.remark'),
			'name'=>input('get.name')
			];	
		
		$list=db('f_service')	
		->order('addtime desc')
		->where($map)
		->where('updtime','<',time()-432000)
		->paginate(10,false,array(
	        'query' => $query
		));
		
		$this->assign('list', $list);
		$this->assign('nickname', $nickname);
        // 渲染模板输出
        return $this->fetch();
        
        
	}
	
	
	
	public function jlshow()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
		$qianxian=Session::get('qianxian','think');
		$nickname=Session::get('nickname','think');
		
		
	if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理'  ){
		
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}

	}elseif($qianxian=='广州经理'){
			
			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理'){
			
			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理'){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}
	
	
		if(input('get.star')!=''){
			$star = input('get.star');
			$map['star']=['like',"%".$_GET['star']."%"];
		}


		if(input('get.rank')!=''){
			$rank = input('get.rank');
			$map['rank']=['like',"%".$_GET['rank']."%"];
		}
		if(input('get.operator')!=''){
			$operator = input('get.operator');
			$map['operator']=['like',"%".$_GET['operator']."%"];
		}
		
		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name = input('get.name');
			$map['name']=['like',"%".$_GET['name']."%"];
		}
		if(input('get.remark')!=''){
			$remark = input('get.remark');
			$map['remark']=['like',"%".$_GET['remark']."%"];
		}
		
		if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['addtime'] = ['between',"$time1,$time2"];	
		}
		$query=[
			'city'=>input('get.city'),
			'operator'=>input('get.operator'),
			'star'=>input('get.star'),
			'rank'=>input('get.rank'),
			'phone'=>input('get.phone'),
			'remark'=>input('get.remark'),
			'name'=>input('get.name'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
			];	
		
		$list=db('f_service')	
		->order('addtime desc')
		->where($map)
		->paginate(10,false,array(
	        'query' => $query
		));
		
		
		$admin=db('admin')	
		->order('addtime desc')
		->select();
		
		$this->assign('admin', $admin);
		$this->assign('list', $list);
		$this->assign('nickname', $nickname);
        // 渲染模板输出
        return $this->fetch();
        
        
	}
	
	
		public function add()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}
	$qianxian=Session::get('qianxian','think');
  
     	if(request()->isPost()){
			$name=$_POST['name'];
			$phone=$_POST['phone'];
			$loans=$_POST['loans'];
			
			$rank=$_POST['rank'];
			
		if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'   ){
			$city = '总部';
			}elseif($qianxian=='广州经理' || $qianxian=='广州助理'|| $qianxian=='广州销售'){	
					$city = '广州';
			}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'|| $qianxian=='杭州销售'){		
					$city = '杭州';
			}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'|| $qianxian=='深圳销售'){
					$city = '深圳';
			}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'|| $qianxian=='珠海销售'){
					$city = '珠海';
			}


			
			if(array_key_exists("star1", $_POST)){
				$ss1=' 房';
			}else{
				$ss1=' ';
			}
			
			if(array_key_exists("star2", $_POST)){
				$ss2=' 车';
			}else{
				$ss2=' ';
			}
			
			if(array_key_exists("star3", $_POST)){
				$ss3=' 保单';
			}else{
				$ss3=' ';
			}
			
			if(array_key_exists("star4", $_POST)){
				$ss4=' 工薪';
			}else{
				$ss4=' ';
			}
			
			if(array_key_exists("star5", $_POST)){
				$ss5=' 其它';
			}else{
				$ss5=' ';
			}
			if(array_key_exists("star6", $_POST)){
				$ss6=' 已签约';
			}else{
				$ss6=' ';
			}
			$star=$ss1.$ss2.$ss3.$ss4.$ss5.$ss6;
			if($star==''){
				$star='其它';
			}
			
			
			$follow=$_POST['follow'];
			$remark=$_POST['remark'];
			$operator=$_POST['operator'];
			$addtime=time();

			$data = [
				'follow'=>$follow,
				'name'=>$name,
	  			'phone' =>$phone,
	  			'loans'=>$loans,
	  			'city'=>$city,
	  			'rank' =>$rank,
	  			'star' =>$star,
	  			'remark' =>$remark,
	  			'operator' =>$operator,
	  			'addtime' =>$addtime,
	  			'updtime'=>time()
				];
				$f_service = db('f_service')->insert($data);
	
				if($f_service){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		           echo '<script>alert("添加成功"); window.location.href=document.referrer; </script>';
		       } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}


	}
	
	
	
	
		public function upd()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}
$qianxian=Session::get('qianxian','think');
     	if(request()->isPost()){
			$name=$_POST['name'];
			$phone=$_POST['phone'];
			$loans=$_POST['loans'];		
			$rank=$_POST['rank'];
			if(array_key_exists("star1", $_POST)){
				$ss1=' 房';
			}else{
				$ss1=' ';
			}
			if(array_key_exists("star2", $_POST)){
				$ss2=' 车';
			}else{
				$ss2=' ';
			}
			if(array_key_exists("star3", $_POST)){
				$ss3=' 保单';
			}else{
				$ss3=' ';
			}
			if(array_key_exists("star4", $_POST)){
				$ss4=' 工薪';
			}else{
				$ss4=' ';
			}
			if(array_key_exists("star5", $_POST)){
				$ss5=' 其它';
			}else{
				$ss5=' ';
			}
			if(array_key_exists("star6", $_POST)){
				$ss6=' 已签约';
			}else{
				$ss6=' ';
			}
			$star=$ss1.$ss2.$ss3.$ss4.$ss5.$ss6;
			$remark=$_POST['remark'];
			$follow=$_POST['follow'];
			
			$id=$_POST['id'];

			$data = [
				'follow'=>$follow,
				'name'=>$name,
	  			'phone' =>$phone,
	  			'loans'=>$loans,
	  			'rank' =>$rank,
	  			'star' =>$star,
	  			'remark' =>$remark,
	  			'updtime'=>time()
				];
				$f_service = db('f_service')->where('f_service_id',$id)->update($data);
	
				if($f_service){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		           echo '<script>alert("修改成功"); window.location.href=document.referrer; </script>';
		       } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}

	}
		public function upds()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     }
     $qianxian=Session::get('qianxian','think');
     $nickname=Session::get('nickname','think');
			$id=$_POST['id'];
			
			$list=db('f_service')->where('f_service_id',$id)->find();
	
		
			
			$data = [
	  			'operator' =>$nickname,
	  			'updtime'=>time()
				];
				$f_service = db('f_service')->where('f_service_id',$id)->update($data);
	
				if($f_service){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		           $this->success('获取成功', 'Service/show');
		       } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('获取失败');
		        }

	


        
	}
	
		public function delete()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
     	}


		$id=$_GET['id'];
		$delete=db('f_service')->delete($id);
	
		if($delete){
           
            $this->success('删除成功', 'Service/show');
       } else {      
            $this->error('删除失败');
        }
        
   
	}
		
            
	 public function excel()
    {
   $qianxian=Session::get('qianxian','think');
   if($qianxian!='管理员' && $qianxian!='总经理' && $qianxian!='广州经理'  && $qianxian!='杭州经理'  && $qianxian!='深圳经理'  &&  $qianxian!='珠海经理' ){
			$this->error('您没有权限');
		
	}
	
	
        //import('phpexcel.PHPExcel', EXTEND_PATH);//方法二  
        vendor("PHPExcel.PHPExcel"); //方法一
        Vendor('phpoffice.phpexcel.Classes.PHPExcel');//调用类库,路径是基于vendor文件夹的
        Vendor('phpoffice.phpexcel.PHPExcel.Worksheet.Drawing');
        Vendor('phpoffice.phpexcel.PHPExcel.Writer.Excel2007');  
        $objPHPExcel = new \PHPExcel();  
  
  if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'   ){
			$city = '总部';
			}elseif($qianxian=='广州经理' || $qianxian=='广州助理'|| $qianxian=='广州销售'){	
					$city = '广州';
			}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'|| $qianxian=='杭州销售'){		
					$city = '杭州';
			}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'|| $qianxian=='深圳销售'){
					$city = '深圳';
			}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'|| $qianxian=='珠海销售'){
					$city = '珠海';
			}

        //获取表单上传文件  
        $file = request()->file('excel');  
        $info = $file->validate(['size'=>15678,'ext'=>'xlsx,xls,csv'])->move(ROOT_PATH . 'public' . DS . 'excel');  
        if($info){  
            $exclePath = $info->getSaveName();  //获取文件名  
            $file_name = ROOT_PATH . 'public' . DS . 'excel' . DS . $exclePath;   //上传文件的地址  
            $objReader =\PHPExcel_IOFactory::createReader('Excel2007');  
            $obj_PHPExcel =$objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8  
            echo "<pre>";  
            $excel_array=$obj_PHPExcel->getsheet(0)->toArray();   //转换为数组格式  
            array_shift($excel_array);  //删除第一个数组(标题);  
            $data = [];  
            $i=0;  
             $nickname=Session::get('nickname','think');
            foreach($excel_array as $k=>$v) {  
                $data[$k]['name'] = $v[0];
                $data[$k]['phone'] = $v[1]; 
                $data[$k]['loans'] = $v[2]; 
                $data[$k]['rank'] = $v[3]; 
                $data[$k]['star'] = $v[4]; 
                $data[$k]['remark'] = $v[5];   
                $data[$k]['operator'] = $nickname; 
                $data[$k]['city'] = $city; 
                $data[$k]['addtime'] = time(); 
                $data[$k]['updtime'] =0; 
                
                $i++;  
            }  
            
//          show_bug($data);die();
            
           $success=db('f_service')->insertAll($data); //批量插入数据  
           //$i=  
           $error=$i-$success;  
           
           $this->success("添加成功，总{$i}条，成功{$success}条，失败{$error}条。", 'Service/show');
           // Db::name('t_station')->insertAll($city); //批量插入数据  
        }else{  
            // 上传失败获取错误信息  
            echo $file->getError();  
        }  
  
    
    
    
    
}
	

}




?>