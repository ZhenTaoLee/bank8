<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
class Good extends Index{

    
	//产品详情
	  public function particulars()	  
    {
  
    $id=$_POST['good_id']; 
//	$id=102;
   	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->where('good_id',$id)
	->select();
	$info= Request::instance()->header();
		$sss=$info['user-agent'];
		foreach ($data as $key => $val) {
	
if(strpos($sss,'iOS') !== false ){
	$data[$key]['goodtype'] = $data[$key]['goodtype'];
}else{
	if($data[$key]['goodtype']==4){		
		$data[$key]['goodtype'] = 5;
	}elseif($data[$key]['goodtype']==5){
		$data[$key]['goodtype'] = 4;
	}else{
	$data[$key]['goodtype'] = $data[$key]['goodtype'];	
	}
}
				}
	
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
      
    }
    
//产品推荐
	 public function show()	  
    {
    	
    $id=$_POST['good_id']; 

//	$id=102;
	$fff = db('good')->where('good_id',$id)->find();//查找good表
	$sid=$fff['goodtype'];
	$bankid=$fff['bankid'];
	
	$sss= db('bank')->where('b_id',$bankid)->find();
	$cityName=$sss['city'];
    $map['city']  = ['like',"%" . $cityName . "%"];
     $map['putaway']  = 1;	
   	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->where('goodtype',$sid)
	->where($map)
	->select();
	$info= Request::instance()->header();
		$sss=$info['user-agent'];
		foreach ($data as $key => $val) {  
	if(strpos($sss,'iOS') !== false ){
	$data[$key]['goodtype'] = $data[$key]['goodtype'];
}else{
	if($data[$key]['goodtype']==4){		
		$data[$key]['goodtype'] = 5;
	}elseif($data[$key]['goodtype']==5){
		$data[$key]['goodtype'] = 4;
	}else{
	$data[$key]['goodtype'] = $data[$key]['goodtype'];	
	}
}
				$data[$key]['url']="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];
				
				}
	
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
      
    }
    
    

    

   //获取搜索历史
	 public function history()	  
    {
    	$info= Request::instance()->header(); 
    	//判断是否存在tokenid
    	if(array_key_exists('tokenid', $info)!== false){
			$rest = substr($info['tokenid'] , 20 , 5);
    		$id=$rest;
		}else{
			$id=0;
		}
	
  	$hot=[['hot'=>'房贷'],['hot'=>'平安'],['hot'=>'大数'],['hot'=>'利息低'],['hot'=>'额度高']];

   	$history = db('searchhistory')
	->field('history')
	->where('user_id',$id)
	->limit(8)
	->select();
   	return json(['state'=>2558,'data'=>['hot'=>$hot,'history'=>$history],'mesg'=>'操作完成']);
      
    }
    
//清空搜索历史  
	public function delete()
	{
		$info= Request::instance()->header(); 
		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
//$id=84;
		$delete=db('searchhistory')->where('user_id',$id)->delete();
		if($delete){
		return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'清空失败']);
	}
	
	//搜索
		 public function search()	  
    {
    	
    	$antistop=trim($_POST['antistop']);
		$info= Request::instance()->header(); 
    	//判断是否存在tokenid
    	if(array_key_exists('tokenid', $info)!== false){
			$rest = substr($info['tokenid'] , 20 , 5);
    		$id=$rest;
    		if($id!=0){
    			$adddata=['history'=>$antistop,'user_id'=>$id,'addtime'=>time()];
				$add=db('searchhistory')->insert($adddata);
    		}
		}
//	$id=102;

    $map['goodName']  = ['like',"%" . $antistop . "%"];
    $map['putaway']  = 1;	
   	$data1 = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->where($map)
	->select();
	
	$mas['label']  = ['like',"%" . $antistop . "%"];
	$data2 = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->where($mas)
	->select();
	
	$mab['bankname']  = ['like',"%" . $antistop . "%"];
	$data3 = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->where($mab)
	->select();
	
	
	$list = array_merge_recursive($data1,$data2,$data3); //两份表单共匹配的


			$tmp_array = array();  
  
			$data = array();  
		
			  
			// 1. 循环出所有的行. ( $val 就是某个行)  
			foreach($list as $k => $val){  
			  
			    $hash = md5(json_encode($val));  
			    if (in_array($hash, $tmp_array)) {  
			   
			    }else{  
			        // 2. 在 foreach 循环的主体中, 把每行数组对象得hash 都赋值到那个临时数组中.  
			        $tmp_array[] = $hash;  
			        $data[] = $val;  
			    }  
			}  
			
			foreach ($data as $key => $val) {  
				 
				$data[$key]['url']="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];
				
				}
	
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
      
    }

}

