<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class Aii extends Index
    {





       //ali宝安卓配置id=6
	  public function configuration()	  
    {
    	
    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',6)->find();
    	$anversion=$android['anversion'];
    	$ansrapeersion=$android['ansrapeersion'];
    	$anurl=$android['anurl'];
    	$andescribe=$android['andescribe'];

    	$aaa = explode(".", $version);
    	$bbb = explode(".", $anversion);
		$ccc = explode(".", $ansrapeersion);
		
    	if($aaa[0]==$bbb[0]){
    		if($aaa[1]==$bbb[1]){
    			if($aaa[2]==$bbb[2]){
    				$fff=0;
		    	}elseif($aaa[2]>$bbb[2]){
		    		$fff=1;
		    	}elseif($aaa[2]<$bbb[2]){
		    		$fff=2;
		    	}
	    	}elseif($aaa[1]>$bbb[1]){
	    		$fff=1;
	    	}elseif($aaa[1]<$bbb[1]){
	    		$fff=2;
	    	}
    	}elseif($aaa[0]>$bbb[0]){
    		$fff=1;
    	}elseif($aaa[0]<$bbb[0]){
    		$fff=2;
    	}
    	
    	
    	if($aaa[0]==$ccc[0]){
    		if($aaa[1]==$ccc[1]){
    			if($aaa[2]==$ccc[2]){
    				$ansrape=0;
		    	}elseif($aaa[2]>$ccc[2]){
		    		$ansrape=0;
		    	}elseif($aaa[2]<$ccc[2]){
		    		$ansrape=1;
		    	}
	    	}elseif($aaa[1]>$ccc[1]){
	    		$ansrape=0;
	    	}elseif($aaa[1]<$ccc[1]){
	    		$ansrape=1;
	    	}
    	}elseif($aaa[0]>$ccc[0]){
    		$ansrape=0;
    	}elseif($aaa[0]<$ccc[0]){
    		$ansrape=1;
    	}
    	if($fff==0){  
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 

   	//活动
	  public function activity()
    {
    $info= Request::instance()->header(); 
    	
		$version=$info['version'];
    	$android = db('a_configuration')->where('id',6)->find();
    	$anversion=$android['anversion'];
    	$ansrapeersion=$android['ansrapeersion'];
    	$anurl=$android['anurl'];
    	$andescribe=$android['andescribe'];

    	$aaa = explode(".", $version);
    	$bbb = explode(".", $anversion);
		$ccc = explode(".", $ansrapeersion);
		
    	if($aaa[0]==$bbb[0]){
    		if($aaa[1]==$bbb[1]){
    			if($aaa[2]==$bbb[2]){
    				$fff=0;
		    	}elseif($aaa[2]>$bbb[2]){
		    		$fff=1;
		    	}elseif($aaa[2]<$bbb[2]){
		    		$fff=2;
		    	}
	    	}elseif($aaa[1]>$bbb[1]){
	    		$fff=1;
	    	}elseif($aaa[1]<$bbb[1]){
	    		$fff=2;
	    	}
    	}elseif($aaa[0]>$bbb[0]){
    		$fff=1;
    	}elseif($aaa[0]<$bbb[0]){
    		$fff=2;
    	}
    	
    	
    	if($fff==1){
    		 $data=[
	 	[
		 'activityPicture'=>'https://zykj.8haoqianzhuang.cn/a9c42201806251451338922.png',
		 'activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'
		 ]
	 ];
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    	
    	
	 $data=[
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/a9c42201806251451338922.png',
	 'activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/c1ae420180625145243537.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/a9c42201806251451338922.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/c1ae420180625145243537.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html']
	 ];
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    } 


    }
