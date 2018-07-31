<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;
class House extends Index{


	//房产评估
	  public function assess()
    {
    	$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}
//		$id=1;
//		$name=1; //姓名
//		$city=2;//城市
//		$building=3;//楼盘名称
//		$site=4;//详细地址
//		$seat=5;//栋数
//		$floor=6;//层
//		$area=7;//面积

		$name=$_POST["name"]; //姓名
		$city=$_POST["city"];//城市
		$building=$_POST["building"];//楼盘名称
		$site=$_POST["site"];//详细地址
		$seat=$_POST["seat"];//栋数
		$floor=$_POST["floor"];//层
		$area=$_POST["area"];//面积


			$adddata=['name'=>$name,'city'=>$city,'building'=>$building,'site'=>$site,'seat'=>$seat,'floor'=>$floor,'area'=>$area,'addtime'=>time(),'user_id'=>$id,'number'=>time().$id];

			$add=db('house')->insert($adddata);
			$vehicleid = db('house')->getLastInsID();

	if($add){
	  	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
	  }
	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);

    }

 //市
	  public function city()
    {


	     $city=db('province')->distinct(true)->field('cityName')->select();




	      foreach ($city as $key => $val) {  

			$district=db('province')->where('cityName',$city[$key]['cityName'])->field('district')->select();
			foreach ($district as $k => $v) {
				$ss[]=$district[$k]['district'];
				}

			$city[$key]['district']=$ss;
			$ss=array();

	}


	  	return json(['state'=>2558,'data'=>$city,'mesg'=>'操作成功']);


    }

 //房评估历史
	  public function history()
    {
		$info= Request::instance()->header();
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];
		$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
    	if($id==0){
    		return json(['state'=>3388,'data'=>[''],'mesg'=>'请登录']);
    	}

		$data=db('house')->where('user_id',$id)->select();

			foreach ($data as $key => $val) {
				if($data[$key]['total']==0){
					$data[$key]['type']="处理中";
				}else{
					$data[$key]['type']="已完成";
				}
			$data[$key]['addtime']=date("Y-m-d H:i:s",$data[$key]['addtime']);

				}
	  	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);


    }









}
