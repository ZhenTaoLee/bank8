<?php

namespace app\configuration\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class Xiaomi extends Index
    {


  
    
        //小米安卓配置id=3
	  public function configuration()	  
    {
    	
    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',3)->find();
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 

        //oppo安卓配置id=4
	  public function oppo()	  
    {
    	
    $version=$_POST['version'];

    	$android = db('a_configuration')->where('id',4)->find();
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 


       //应用宝安卓配置id=5
	  public function yinyongbao()	  
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 

       //ali宝安卓配置id=6
	  public function ali()	  
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 

       //360安卓配置id=7
	  public function sanliuling()	  
    {
    	
    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',7)->find();
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 


       //baidu安卓配置id=8
	  public function baidu()	  
    {
    $version=$_POST['version'];

    	$android = db('a_configuration')->where('id',8)->find();
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
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==1){  		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 



    }
