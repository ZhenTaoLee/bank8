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
class Common extends Index
{

//安卓
	public function ashow()
	{
	$list=db('a_configuration')->order('id desc')->paginate(20);
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	
	}
	

	
	
	//安卓
		public function aupd()
	{
		
	if(request()->isPost()){
		
			$iid=$_POST['id'];
			$anversion=$_POST['anversion'];
			$ansrapeersion=$_POST['ansrapeersion'];
			$anurl=$_POST['anurl'];
			$andescribe=$_POST['andescribe'];
			
			$data = [
				'anversion'=>$anversion,
	  			'ansrapeersion' =>$ansrapeersion,
	  			'anurl'=>$anurl,
	  			'andescribe'=>$andescribe
				];

				$admin = db('a_configuration')->where('id',$iid)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ashow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}
			
				
	$id=$_GET['id'];	
	$list=db('a_configuration')->where('id',$id)->find();
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	

		
        
	}
	
	
	
	//ios
		public function ishow()
	{
		
	$list=db('i_configuration')->order('id desc')->paginate(20);
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	

		
        
	}
	//ios
	public function iupd()
	{
		
	if(request()->isPost()){
		
			$iid=$_POST['id'];
			$iosversion=$_POST['iosversion'];
			$iosrapeversion=$_POST['iosrapeversion'];
			$iosurl=$_POST['iosurl'];
			$iosdescribe=$_POST['iosdescribe'];
			
			$data = [
				'iosversion'=>$iosversion,
	  			'iosrapeversion' =>$iosrapeversion,
	  			'iosurl'=>$iosurl,
	  			'iosdescribe'=>$iosdescribe
				];

				$admin = db('i_configuration')->where('id',$iid)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ishow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}
			
				
	$id=$_GET['id'];	
	$list=db('i_configuration')->where('id',$id)->find();
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	

		
        
	}
	
	
	public function eradd()
	{


     	if(request()->isPost()){
     		
			$iosversion=$_POST['iosversion'];
			$switchover=$_POST['switchover'];
			$iosrape=$_POST['iosrape'];
			$iosurl=$_POST['iosurl'];
			$iosdescribe=$_POST['iosdescribe'];
	

			$data = [
				'iosversion'=>$iosversion,
				'iosrape'=>$iosrape,
				'iosurl'=>$iosurl,
				'iosdescribe'=>$iosdescribe,
	  			'switchover' =>$switchover
	  	
				];
				$admin = db('ier_configuration')->insert($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('添加成功', 'common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}
		// 渲染模板输出
        return $this->fetch();
     
	}
		//二维码
	public function ershow()
	{
	$list=db('ier_configuration')->order('id desc')->paginate(200);
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	
	}
	
	
		public function erupd()
	{
		
			$id=$_GET['id'];	
			$ss=$_GET['ss'];		

			$data = [
				'switchover'=>$ss
				];
				$admin = db('ier_configuration')->where('id',$id)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

        
	}
	
			public function erupds()
	{
		
			$id=$_GET['id'];	
			$ss=$_GET['ss'];		

			$data = [
				'iosrape'=>$ss
				];
				$admin = db('ier_configuration')->where('id',$id)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

        
	}
	
	

	
	public function eradddd()
	{


     	if(request()->isPost()){
     		
			$iosversion=$_POST['iosversion'];
			$switchover=$_POST['switchover'];
			$iosrape=$_POST['iosrape'];
			$iosurl=$_POST['iosurl'];
			$iosdescribe=$_POST['iosdescribe'];
	

			$data = [
				'iosversion'=>$iosversion,
				'iosrape'=>$iosrape,
				'iosurl'=>$iosurl,
				'iosdescribe'=>$iosdescribe,
	  			'switchover' =>$switchover
	  	
				];
				$admin = db('ierj_configuration')->insert($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('添加成功', 'common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

			}
		// 渲染模板输出
        return $this->fetch();
     
	}
		//二维码
	public function ershowdd()
	{
	$list=db('ierj_configuration')->order('id desc')->paginate(200);
	$this->assign('list', $list);

        // 渲染模板输出
        return $this->fetch();	
	}
	
	
		public function erupddd()
	{
		
			$id=$_GET['id'];	
			$ss=$_GET['ss'];		

			$data = [
				'switchover'=>$ss
				];
				$admin = db('ierj_configuration')->where('id',$id)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

        
	}
	
			public function erupdsdd()
	{
		
			$id=$_GET['id'];	
			$ss=$_GET['ss'];		

			$data = [
				'iosrape'=>$ss
				];
				$admin = db('ierj_configuration')->where('id',$id)->update($data);
	
				if($admin){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'Common/ershow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

        
	}
    


	
}



?>