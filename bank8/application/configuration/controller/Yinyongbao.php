<?php

namespace app\configuration\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class Yinyongbao extends Index
    {




       //应用宝安卓配置id=5
	  public function configuration()	  
    {
    	
    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',5)->find();
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


    }
