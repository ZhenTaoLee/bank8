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

	
	$hot_good=db('hot_good')->where('rank',1)->find();
	$data=[
		'hot_id'=>$hot_good['hot_id'],
		'goodName'=>$hot_good['goodName'],
		'limit'=>$hot_good['limit'],
		'interest'=>$hot_good['interest'],
		'popularity'=>$hot_good['popularity'],
		'picture'=>$hot_good['drawingOne'],
		'rank'=>$hot_good['rank'],
		'url'=>'http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$hot_good['hot_id']
	];

 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }

     //热门2
	  public function popTwo()
    {
	$data=db('hot_good')->where('rank',2)->whereOr('rank',3)->order('rank asc')->select();
		foreach ($data as $key => $val){	
			$data[$key]['url'] ='http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$data[$key]['hot_id'];		
			$data[$key]['picture'] =$data[$key]['drawingTwo'];	
		}
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }



     //热门3
	  public function popThree()
    {
	$data=db('hot_good')->where('rank','>',3)->order('rank asc')->select();
			foreach ($data as $key => $val){	
				$data[$key]['url'] ='http://test2.8haoqianzhuang.com/index.php/index/Finance/hotdetails?id='.$data[$key]['hot_id'];	
			$data[$key]['picture'] =$data[$key]['drawingThree'];	
		}
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }
}
