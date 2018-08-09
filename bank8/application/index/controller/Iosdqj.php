<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class iosdqj extends Index
    {

//版本控制器
  public function qrcodeupgrade()
    {
		$version=$_POST['version'];
    	$ios = db('ier_configuration')->field('id,iosversion,iosrape,iosurl,iosdescribe')->where('iosversion',$version)->find();
    	
    	$iosss = db('ierj_configuration')->order('id desc')->select();
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
    	$ios = db('ierj_configuration')->field('id,iosversion,switchover')->where('iosversion',$version)->find();
  
		if($ios){
			 return json(['state'=>2558,'data'=>$ios,'mesg'=>'操作完成']);
		}else{
			return json(['state'=>2558,'data'=>['id'=>0,'iosversion'=>$version,'switchover'=>0],'mesg'=>'操作完成']);
		}
		
		


    }
    


    }
