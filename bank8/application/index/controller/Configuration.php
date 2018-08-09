<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class Configuration extends Index
    {

//iosshop
	  public function ios()
    {

    	
    	$version=$_POST['version'];
    	
    	$ios = db('i_configuration')->where('id',9)->find();
    	$iosversion=$ios['iosversion'];
    	$iosurl=$ios['iosurl'];
    	$iosdescribe=$ios['iosdescribe'];
    	$iosrapeversion=$ios['iosrapeversion'];

    	$aaa = explode(".", $version);
    	$bbb = explode(".", $iosversion);
		$ccc = explode(".", $iosrapeversion);
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
    		
    			$data=['iosversion'=>$iosversion,'displayBug'=>1,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		

    	}elseif($fff==1){
    		
    		$data=['iosversion'=>$iosversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		

    	}elseif($fff==2){
    		
    		$data=['iosversion'=>$iosversion,'displayBug'=>1,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		
    	}

		 return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
    

    //iosshop
	  public function qrcodeupgrade()
    {
		$version=$_POST['version'];
    	$ios = db('ier_configuration')->field('id,iosversion,iosrape,iosurl,iosdescribe')->where('iosversion',$version)->find();
    	
    	$iosss = db('ier_configuration')->order('id desc')->select();
		$iosversion=$iosss[0]['iosversion'];
		$aaa = explode(".", $version);
    	$bbb = explode(".", $iosversion);

    	if($aaa[0]==$bbb[0]){
    		if($aaa[1]==$bbb[1]){
    			if($aaa[2]==$bbb[2]){
    				$isUpdate=0;
		    	}elseif($aaa[2]>$bbb[2]){
		    		$isUpdate=0;
		    	}elseif($aaa[2]<$bbb[2]){
		    		$isUpdate=1;
		    	}
	    	}elseif($aaa[1]>$bbb[1]){
	    		$isUpdate=0;
	    	}elseif($aaa[1]<$bbb[1]){
	    		$isUpdate=1;
	    	}
    	}elseif($aaa[0]>$bbb[0]){
    		$isUpdate=0;
    	}elseif($aaa[0]<$bbb[0]){
    		$isUpdate=1;
    	}

    	if($ios){
    	$data=[
    	'id'=>$ios['id'],
    	'iosversion'=>$iosss[0]['iosversion'],
    	'iosrape'=>$ios['iosrape'],
    	'iosurl'=>$ios['iosurl'],
    	'iosdescribe'=>$ios['iosdescribe'],
    	'isUpdate'=>$isUpdate

    	];	
    	}else{
	    	$data=[
	    	'id'=>0,
	    	'iosversion'=>$iosss[0]['iosversion'],
	    	'iosrape'=>0,
	    	'iosurl'=>'',
	    	'iosdescribe'=>'',
	    	'isUpdate'=>0
	
	    	];	
    	}
    	
 
		 return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }
    
      public function ioswaistcoat()
    {

    	$version=$_POST['version'];
    	$ios = db('ier_configuration')->field('id,iosversion,switchover')->where('iosversion',$version)->find();
  
		if($ios){
			 return json(['state'=>2558,'data'=>$ios,'mesg'=>'操作完成']);
		}else{
			return json(['state'=>2558,'data'=>['id'=>0,'iosversion'=>$version,'switchover'=>0],'mesg'=>'操作完成']);
		}
		
		


    }
    

    //华为安卓配置id=2
	  public function huawei()	  
    {
    	
    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',2)->find();
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
    
        //小米安卓配置id=3
	  public function xiaomi()	  
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
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
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>1,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    } 



    }
