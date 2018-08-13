<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

    //
    class Iosdqj extends Index
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
    
    
          public function fun()
    {

    		$data = db('z_fun')
			->order('rand()')
			->limit(3)
			->select();
		foreach ($data as $key => $val){
		$data[$key]['addtime'] =date('Y-m-d',$data[$key]['addtime']);
	$data[$key]['url'] ="http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji";
	
		}	
			
		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
	
    }
    
    
    
    //支出
 public function expenditure()
    {
    	
	$info= Request::instance()->header();
if(array_key_exists('tokenid', $info)!==false){
	
}
	$rest = substr($info['tokenid'] , 20 , 5);
	$id=$rest;
	
	if(array_key_exists('yearMonth', $_POST)!==false){
		if($_POST['yearMonth']==''){
			$t=time();
		}else{
			$t=strtotime($_POST['yearMonth']);//年份
		}	
	}else{
		$t=time();
	}

$y=date('Y', $t);
$m=date('m', $t);
	$s=$m+1;
	$itime=strtotime($y.'-'.$m."-1");
	$stime=strtotime($y.'-'.$s."-1");
	
$map['dtime'] = ['between',"$itime,$stime"];


			$count1 = db('b_bill')
				->where('user_id',$id)
				->where('genre','消费')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count2 = db('b_bill')
				->where('user_id',$id)
				->where('genre','转账')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count3 = db('b_bill')
				->where('user_id',$id)
				->where('genre','娱乐')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count4 = db('b_bill')
				->where('user_id',$id)
				->where('genre','住房')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count5 = db('b_bill')
				->where('user_id',$id)
				->where('genre','餐饮')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count6 = db('b_bill')
				->where('user_id',$id)
				->where('genre','交通')
				->where('type',2)
				->where($map)
				->sum('money');

				$count7 = db('b_bill')
				->where('user_id',$id)
				->where('genre','购物')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count8 = db('b_bill')
				->where('user_id',$id)
				->where('genre','通讯')
				->where('type',2)
				->where($map)
				->sum('money');

				$count9 = db('b_bill')
				->where('user_id',$id)
				->where('genre','红包')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count10 = db('b_bill')
				->where('user_id',$id)
				->where('genre','取款')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count11 = db('b_bill')
				->where('user_id',$id)
				->where('genre','医疗')
				->where('type',2)
				->where($map)
				->sum('money');
	
				$count12 = db('b_bill')
				->where('user_id',$id)
				->where('genre','教育')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count13 = db('b_bill')
				->where('user_id',$id)
				->where('genre','汽车')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count14 = db('b_bill')
				->where('user_id',$id)
				->where('genre','宠物')
				->where('type',2)
				->where($map)
				->sum('money');
				
				$count15 = db('b_bill')
				->where('user_id',$id)
				->where('genre','其他')
				->where('type',2)
				->where($map)
				->sum('money');
				
			$datas=[
			['genre'=>'消费', 'money'=>$count1 ],
			['genre'=>'转账', 'money'=>$count2 ],
			['genre'=>'娱乐', 'money'=>$count3 ],
			['genre'=>'住房', 'money'=>$count4 ],
			['genre'=>'餐饮', 'money'=>$count5 ],
			['genre'=>'交通', 'money'=>$count6 ],
			['genre'=>'购物', 'money'=>$count7 ],
			['genre'=>'通讯', 'money'=>$count8 ],
			['genre'=>'红包', 'money'=>$count9 ],
			['genre'=>'取款', 'money'=>$count10 ],
			['genre'=>'医疗', 'money'=>$count11 ],
			['genre'=>'教育', 'money'=>$count12 ],
			['genre'=>'汽车', 'money'=>$count13 ],
			['genre'=>'宠物', 'money'=>$count14 ],
			['genre'=>'其他', 'money'=>$count15 ]
			];
			

return json(['state'=>2558,'data'=>$datas,'mesg'=>'操作完成']);



    }
    
    
    
    
    

    //收入
 public function income()
    {
    	
	$info= Request::instance()->header();
	if(array_key_exists('tokenid', $info)!==false){
		
	}
	$rest = substr($info['tokenid'] , 20 , 5);
	$id=$rest;
	
	if(array_key_exists('yearMonth', $_POST)!==false){
		if($_POST['yearMonth']==''){
			$t=time();
		}else{
			$t=strtotime($_POST['yearMonth']);//年份
		}	
	}else{
		$t=time();
	}

$y=date('Y', $t);
$m=date('m', $t);
	$s=$m+1;
	$itime=strtotime($y.'-'.$m."-1");
	$stime=strtotime($y.'-'.$s."-1");
	
$map['dtime'] = ['between',"$itime,$stime"];

				$count1 = db('b_bill')
				->where('user_id',$id)
				->where('genre','工薪')
				->where('type',1)
				->where($map)
				->sum('money');	
				$count2 = db('b_bill')
				->where('user_id',$id)
				->where('genre','兼职')
				->where('type',1)
				->where($map)
				->sum('money');	
				$count3 = db('b_bill')
				->where('user_id',$id)
				->where('genre','理财')
				->where('type',1)
				->where($map)
				->sum('money');	
				$count4 = db('b_bill')
				->where('user_id',$id)
				->where('genre','其他')
				->where('type',1)
				->where($map)
				->sum('money');	

			$datas=[
			['genre'=>'工薪', 'money'=>$count1 ],
			['genre'=>'兼职', 'money'=>$count2 ],
			['genre'=>'理财', 'money'=>$count3 ],
			['genre'=>'其他', 'money'=>$count4 ],
			];
			

return json(['state'=>2558,'data'=>$datas,'mesg'=>'操作完成']);



    }
    }
