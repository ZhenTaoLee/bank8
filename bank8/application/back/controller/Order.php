<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 订单
*/
class Order extends Index
{
	
	
		public function orderdelete()
	{
		
	$data=db('matching')->where('name','like','%测试%')->select();

	foreach ($data as $key => $val) {
				
			$delete1=db('matching')->where('matching_id',$data[$key]['matching_id'])->delete();
			$delete2=db('matchinghouse')->where('matching_id',$data[$key]['matching_id'])->delete();
			$delete3=db('matchinginsurance')->where('matching_id',$data[$key]['matching_id'])->delete();
			$delete4=db('matchingpersonage')->where('matching_id',$data[$key]['matching_id'])->delete();	
			$delete5=db('matchingvehicle')->where('matching_id',$data[$key]['matching_id'])->delete();	
			$delete6=db('order')->where('matching_id',$data[$key]['matching_id'])->delete();	
				
				}


	}
	
	
	
//	订单（全部）
	public function show()
	{
	
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
    $city='';
	$qianxian=Session::get('qianxian','think');
	if($qianxian=='管理员'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='总经理'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='总部助理'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='财务经理'){
		$map='';
		
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理'){
		$city='广州';
		$map['ba_matching.city']=['like',"%广州%"];
	}
	elseif($qianxian=='广州助理'){
		$city='广州';
		$map['ba_matching.city']=['like',"%广州%"];
	}
	elseif($qianxian=='杭州经理'){
		$city='杭州';
		$map['ba_matching.city']=['like',"%杭州%"];
	}
	elseif($qianxian=='杭州助理'){
		$city='杭州';
		$map['ba_matching.city']=['like',"%杭州%"];
	}
	elseif($qianxian=='深圳经理'){
		$city='深圳';
		$map['ba_matching.city']=['like',"%深圳%"];
	}
	elseif($qianxian=='深圳助理'){
		$city='深圳';
		$map['ba_matching.city']=['like',"%深圳%"];
	}
	elseif($qianxian=='珠海经理'){
		$city='珠海';
		$map['ba_matching.city']=['like',"%珠海%"];
	}
	elseif($qianxian=='珠海助理'){
		$city='珠海';
		$map['ba_matching.city']=['like',"%珠海%"];
	}


		
		if(input('get.orderType')!=''){
			$orderType= input('get.orderType');
			$map['orderType']=['like',"%".$_GET['orderType']."%"];
		}
		if(input('get.orderNumber')!=''){
			$orderNumber= input('get.orderNumber');
			$map['orderNumber']=['like',"%".$_GET['orderNumber']."%"];
		}
		if(input('get.uphone')!=''){
			$uphone= input('get.uphone');
			$map['user.phone ']=['like',"%".$_GET['uphone']."%"];
		}
	
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'city' => $city,
			'orderType' => input('get.orderType'),
			'orderNumber' => input('get.orderNumber'),
			'uphone' => input('get.uphone'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
	
		
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where('audit',1)
		->order('order_id desc')
		->where($map)
		->paginate(15,false,array(
	        'query' => $query
		));
		

		
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	      //断单
     public function fly()
    {
    	
if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');


	$oid=$_GET['id'];
			$order = db('order')	
			->where('order_id',$oid)
			->find();
			$hid=$order['han_id'];
			$handle=db('handle')->where('han_id',$hid)->find();
			
	$matching = db('matching')	
	->where('matching_id',$order['matching_id'])
	->find();

		$upd=db('order')->where('order_id',$oid)->update(['orderType'=>'订单失败']);
	
		if($order['flynext']>1){
			$grade=$handle['grade']-5;
		}else{
			$grade=$handle['grade'];
		}
		
		if($matching['city']=='广州' && $order['orderType']!='订单转移' && $order['orderType']!='待接单' ){
			$upds = db('handle')->where('han_id',$hid)->update(['money'=>$handle['money']+500,'freeze_money'=>$handle['freeze_money']-500,'grade'=>$grade]);
}

		$add=db('orderhistory')->insert(['orderType'=>'订单失败','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);

		if($upd){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('断单成功', 'order/show');
	    } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('断单失败');
	    }

    	 

      }
      
      
      
     //	订单（全部）
	public function gdshowss()
	{
	
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

	$qianxian=Session::get('qianxian','think');
	
		if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='广州经理'&& $qianxian!='广州助理' ){
		$this->success('没有权限', 'index/inde');
	}


		$map['orderType']=['like',"%订单转移%"];
	
		if(input('get.orderNumber')!=''){
			$orderNumber= input('get.orderNumber');
			$map['orderNumber']=['like',"%".$_GET['orderNumber']."%"];
		}
		if(input('get.uphone')!=''){
			$uphone= input('get.uphone');
			$map['user.phone ']=['like',"%".$_GET['uphone']."%"];
		}
	
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'orderType' => input('get.orderType'),
			'orderNumber' => input('get.orderNumber'),
			'uphone' => input('get.uphone'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];		
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where('audit',1)
		->order('order_id desc')
		->where($map)
		->paginate(20,false,array(
	        'query' => $query
		));
		

		
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	 

	//	要审核订单（广州）
	public function gshow()
	{
		
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='广州经理'&& $qianxian!='广州助理' ){
		$this->success('没有权限', 'index/inde');
	}
	$map['ba_matching.city']=['like',"%广州%"];


	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
	
	
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',0)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
		//	要审核订单（广州）
	public function qshow()
	{
		
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='广州经理'&& $qianxian!='广州助理' ){
		$this->success('没有权限', 'index/inde');
	}
	$map['ba_matching.city']=['like',"%其它%"];


	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
	
	
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',0)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	
	//	要审核订单（广州）
	public function nogshow()
	{
		
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
    
  	$city='';
	$qianxian=Session::get('qianxian','think');
	if($qianxian=='管理员'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='总经理'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='总部助理'){
		$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理'){
		$city='广州';
		$map['ba_matching.city']=['like',"%广州%"];
	}
	elseif($qianxian=='广州助理'){
		$city='广州';
		$map['ba_matching.city']=['like',"%广州%"];
	}
	elseif($qianxian=='杭州经理'){
		$city='杭州';
		$map['ba_matching.city']=['like',"%杭州%"];
	}
	elseif($qianxian=='杭州助理'){
		$city='杭州';
		$map['ba_matching.city']=['like',"%杭州%"];
	}
	elseif($qianxian=='深圳经理'){
		$city='深圳';
		$map['ba_matching.city']=['like',"%深圳%"];
	}
	elseif($qianxian=='深圳助理'){
		$city='深圳';
		$map['ba_matching.city']=['like',"%深圳%"];
	}
	elseif($qianxian=='珠海经理'){
		$city='珠海';
		$map['ba_matching.city']=['like',"%珠海%"];
	}
	elseif($qianxian=='珠海助理'){
		$city='珠海';
		$map['ba_matching.city']=['like',"%珠海%"];
	}


	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'city' => $city,
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
	
	
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_bank.b_id,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',2)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	//分单（广州）
	public function gow()
	{

	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='广州经理'&& $qianxian!='广州助理' ){
		$this->success('没有权限', 'index/inde');
	}
	
	
		if(request()->isPost()){
			$hid=$_POST['hid'];
			$oid=$_POST['oid'];
			
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			
			
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/gshow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
	       }
	$oid=$_GET['oid'];        
	
		$order=db('order')	
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('bankid')
		->where('order_id',$oid)
		->find();  
			   
//$lists=db('handle')->where('bank_id',$order['bankid'])->select();
//if($lists){
//	$list=$lists;
//}else{
	$list=db('handle')
	->join('bank','ba_bank.b_id = ba_handle.bank_id','left')
		->field('ba_bank.bankname,baname,phone,han_id')
		->where('handlecity','广州')->select();
//}
			foreach ($list as $key => $val) { 
				
	$list[$key]['ordercount']= db('order')->where('han_id',$list[$key]['han_id'])
		->where(function ($query) {
				$query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
})->count();
		
		
	$list[$key]['ordercounts']= db('order')->where('han_id',$list[$key]['han_id'])->where('orderType','已完成')->count();
				
			}
			
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	
		public function gows()
	{

	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='广州经理'&& $qianxian!='广州助理' ){
		$this->success('没有权限', 'index/inde');
	}
	
	
		if(request()->isPost()){
			$hid=$_POST['hid'];
			$oid=$_POST['oid'];
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/show');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
	       }
	$oid=$_GET['oid'];        
	
		$order=db('order')	
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('bankid')
		->where('order_id',$oid)
		->find();  
			   

	$list=db('handle')->where('handlecity','广州')->select();

			foreach ($list as $key => $val) { 
				
	$list[$key]['ordercount']= db('order')->where('han_id',$list[$key]['han_id'])
		->where(function ($query) {
				$query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
})->count();
		
		
	$list[$key]['ordercounts']= db('order')->where('han_id',$list[$key]['han_id'])->where('orderType','已完成')->count();
				
			}
			
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
	
	
	
	//审核通过（广州）
	public function dist()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');

			$oid=$_GET['oid'];
			$as=$_GET['as'];

			$upd = db('order')->where('order_id',$oid)->update(['audit'=>$as,'orderType'=>'订单失败']);
		if($upd){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('修改成功', 'order/gshow');
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }
	}
	
	
	//要审核订单（杭州）
	public function hshow()
	{
		
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='杭州经理'&& $qianxian!='杭州助理' ){
		$this->success('没有权限', 'index/inde');
	}
	$map['ba_matching.city']=['like',"%杭州%"];
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',0)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}

//分单（杭州）
	public function how()
	{

	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&&$qianxian!='总部助理'&& $qianxian!='杭州经理'&& $qianxian!='杭州助理' ){
		$this->success('没有权限', 'index/inde');
	}
		if(request()->isPost()){
			$hid=$_POST['hid'];
			$oid=$_POST['oid'];
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/hshow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
	       }
	        
		$list=db('handle')->where('handlecity','杭州')->select();
			foreach ($list as $key => $val) { 
	$list[$key]['ordercount']= db('order')->where('han_id',$list[$key]['han_id'])
		->where(function ($query) {
				$query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
})->count();
		
		
	$list[$key]['ordercounts']= db('order')->where('han_id',$list[$key]['han_id'])->where('orderType','已完成')->count();
			
			
			}
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}






	//要审核订单（深圳）
	public function sshow()
	{
		
			if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理' &&$qianxian!='总部助理' && $qianxian!='深圳经理'&& $qianxian!='深圳助理' ){
		$this->success('没有权限', 'index/inde');
	}
	$map['ba_matching.city']=['like',"%深圳%"];
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',0)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}

//分单（深圳）
	public function sow()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理' && $qianxian!='总部助理'&& $qianxian!='深圳经理'&& $qianxian!='深圳助理' ){
		$this->success('没有权限', 'index/inde');
	}
		if(request()->isPost()){
			$hid=$_POST['hid'];
			$oid=$_POST['oid'];
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/sshow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
	       }
	        
		$list=db('handle')->where('handlecity','深圳')->select();
			foreach ($list as $key => $val) { 
	$list[$key]['ordercount']= db('order')->where('han_id',$list[$key]['han_id'])
		->where(function ($query) {
				$query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
})->count();
		
		
	$list[$key]['ordercounts']= db('order')->where('han_id',$list[$key]['han_id'])->where('orderType','已完成')->count();
			
			
			}
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}




//要审核订单（珠海）
	public function zshow()
	{
		
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理' &&$qianxian!='总部助理'&& $qianxian!='珠海经理'&& $qianxian!='珠海助理' ){
		$this->success('没有权限', 'index/inde');
	}
	$map['ba_matching.city']=['like',"%珠海%"];
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_order.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];
		$list=db('order')	
		->join('matching','ba_order.matching_id = ba_matching.matching_id','left')
		->join('user','ba_user.user_id = ba_order.user_id','left')
		->join('handle','ba_order.han_id = ba_handle.han_id','left')
		->join('bank','ba_handle.bank_id = ba_bank.b_id','left')
		->join('good','ba_order.good_id = ba_good.good_id','left')
		->field('ba_handle.phone,order_id,orderNumber,orderType,ba_order.addtime,ba_matching.city,ba_matching.name,ba_order.matching_id,pay_Numbers,ba_handle.baname,ba_order.user_id,user.phone as uphone,ba_bank.bankname,ba_good.goodName,ba_order.updtime,ba_order.remark')
		->where($map)
		->where('audit',0)
		->order('order_id desc')
		->paginate(15,false,array(
	        'query' => $query
		));

		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}

//分单（珠海）
	public function zow()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理' && $qianxian!='总部助理' && $qianxian!='珠海经理' && $qianxian!='珠海助理' ){
		$this->success('没有权限', 'index/inde');
	}
		if(request()->isPost()){
			$hid=$_POST['hid'];
			$oid=$_POST['oid'];
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/zshow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
	       }
	        
		$list=db('handle')->where('handlecity','珠海')->select();
			foreach ($list as $key => $val) { 
	$list[$key]['ordercount']= db('order')->where('han_id',$list[$key]['han_id'])
		->where(function ($query) {
				$query->where('orderType','开始受理')
				    ->whereOr('orderType','待沟通')
				    ->whereOr('orderType','准备资料')
				    ->whereOr('orderType','待签约')
				    ->whereOr('orderType','审核中')
				    ->whereOr('orderType','待放款');
})->count();
		
		
	$list[$key]['ordercounts']= db('order')->where('han_id',$list[$key]['han_id'])->where('orderType','已完成')->count();
			
			
			}
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}



//匹配详情
  public function details()
  {
  	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }

			$id=$_GET['id'];
    //查询数据
    // $list=db('goods')->paginate(20);
           			$matching = db('matching')
           			->where('matching_id',$id)
           			->find();
           			
           			$user= db('user')
           			->where('user_id',$matching['user_id'])
           			->find();           			
           			 $matchinghouse = db('matchinghouse')
           			->where('matching_id',$id)
           			->find();          			
           			 $matchinginsurance = db('matchinginsurance')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matchingpersonage = db('matchingpersonage')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matchingvehicle = db('matchingvehicle')
           			->where('matching_id',$id)
           			->find();
           			
 					$matching_pair = db('matching_pair')
           			->where('matching_id',$id)
           			->find();
//	    var_dump($list);
$this->assign('matching_pair', $matching_pair);
$this->assign('user', $user);
$this->assign('matching', $matching);
$this->assign('matchinghouse', $matchinghouse);
$this->assign('matchinginsurance', $matchinginsurance);
$this->assign('matchingpersonage', $matchingpersonage);
$this->assign('matchingvehicle', $matchingvehicle);
    	return $this->fetch();



  }

	public function updremark()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }

			$id=$_POST['id'];
			$remark=$_POST['remark'];


//echo $remark;die();
		$upd = db('order')->where('order_id',$id)->update(['remark'=>$remark,'updtime'=>time()]);
	
		if($upd){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
//	            $this->success('修改成功', "good/show");
 echo '<script>alert("更新成功！"); window.location.href=document.referrer; </script>';
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }
	}
	





	//分单（广州）
	public function gowddddd()
	{

	
	

			$hid=115;
			$oid=186;
			
			$handle=db('handle')->where('han_id',$hid)->find();
			$handleupd = db('handle')->where('han_id',$hid)->update(['orderReceivings'=>$handle['orderReceivings']+1]);
			
			
			$upd = db('order')->where('order_id',$oid)->update(['han_id'=>$hid,'orderType'=>'待沟通','audit'=>1]);
			$add=db('orderhistory')->insert(['orderType'=>'待沟通','addtime'=>time(),'order_id'=>$oid,'han_id'=>$hid]);
			if($upd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('分配成功', 'order/gshow');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('分配失败');
		        }
		        
	      }
	
	


}





?>