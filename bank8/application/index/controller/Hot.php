<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
//2.5版本的资产管理
class Hot extends Index
	{

//轮播
	  public function carousel()
    {

	 $data=[
[
'picture'=>'https://zykj.8haoqianzhuang.cn/f7067201807191130438809.png',
'url'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],	 	 
['picture'=>'https://zykj.8haoqianzhuang.cn/f7067201807191130438809.png',
'url'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html']
];
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
 
 
 //热门1
	  public function popOne()
    {

	
	$hot_good=db('hot_good')->select();
	$data=[
		'hot_id'=>$hot_good[0]['hot_id'],
		'goodtype'=>$hot_good[0]['goodtype'],
		'goodName'=>$hot_good[0]['goodName'],
		'limit'=>$hot_good[0]['limit'],
		'accrual'=>$hot_good[0]['accrual'],
		'popularity'=>$hot_good[0]['popularity'],
		'picture'=>$hot_good[0]['drawingOne'],
		'rank'=>$hot_good[0]['rank'],
		'url'=>'http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$hot_good[0]['hot_id']
	];

 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }

     //热门2
	  public function popTwo()
    {
	$data=db('hot_good')->limit('1,2')->order('rank asc')->select();
		foreach ($data as $key => $val){	
			$data[$key]['url'] ='http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$data[$key]['hot_id'];		
			$data[$key]['picture'] =$data[$key]['drawingTwo'];	
		}
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }



     //热门3
	  public function popThree()
    {
	$data=db('hot_good')->limit('3,10')->order('rank asc')->select();
			foreach ($data as $key => $val){	
				$data[$key]['url'] ='http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$data[$key]['hot_id'];	
			$data[$key]['picture'] =$data[$key]['drawingThree'];	
		}
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }
    
    
    
    
//预约
	  public function appointment()
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
	
		$hot_id=$_POST['hot_id'];
		$type=$_POST['type'];
		$cityName=$_POST['cityName'];
		$ageAndRight=$_POST['ageAndRight'];
			$data = [
			'hot_id'=>$hot_id,
			'type'=>$type,
			'cityName'=>$cityName,
			'ageAndRight'=>$ageAndRight,
			'user_id'=>$id,
			'addtime' =>time()
			];
			$hot = db('hot_order')->insert($data);
	

	if($hot){
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
	}else{
		return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);
	}
 	
 	
    }
    
    
    
    
    
    
    
    
    
    
    
}
