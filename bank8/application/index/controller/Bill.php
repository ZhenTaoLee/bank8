<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
//2.5版本的资产管理
class Bill extends Index
	{

//资产统计
	  public function property()
    {
	
	$info= Request::instance()->header();

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
		
	$income= db('b_bill')->where('user_id',$id)->where('type',1)->where($map)->sum('money');
	$expenditure= db('b_bill')->where('user_id',$id)->where('type',2)->where($map)->sum('money');
	
	$data= ['income'=>$income,'expenditure'=>$expenditure];


 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
 
//资产细节
 public function details()
    {
	$info= Request::instance()->header();

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


				$data = db('b_bill')
				->where('user_id',$id)
				->where($map)
				->order('dtime desc')
				->select();
			foreach ($data as $key => $val){
				
				$dictionary = db('b_dictionary')
				->where('typology',$data[$key]['genre'])
				->find();
			$data[$key]['corresponding']=$dictionary['corresponding'];
			
			$fsd=date('Y',$data[$key]['dtime']);
			 $fff=date('m',$data[$key]['dtime']);
			 $sss=date('d',$data[$key]['dtime']);
			$data[$key]['ytime']=$fsd.'年'.intval($fff).'月'.intval($sss).'日';
			
			
			$data[$key]['htime'] =date('H:i',$data[$key]['dtime']);
			$data[$key]['moneys']=$data[$key]['money'];
			if($data[$key]['type']==1){
				$data[$key]['money']="+ ¥ ".sprintf('%.2f',$data[$key]['money']);
			}else{
				$data[$key]['money']="- ¥ ".sprintf('%.2f',$data[$key]['money']);
			}
				}
   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    

public function addincome()
	{
		
	$info= Request::instance()->header();
	$rest = substr($info['tokenid'] , 20 , 5);
	$id=$rest;
	
			$money=$_POST['money'];
			$genre=$_POST['genre'];
			$paymentMode=$_POST['paymentMode'];

			if(strpos($_POST['dtime'],'年') !== false){
				$str = $_POST['dtime'];  
    			$arr = date_parse_from_format('Y年m月d日',$str);
				$dtime= mktime(0,0,0,$arr['month'],$arr['day'],$arr['year']);
			}else{
				$dtime=strtotime($_POST['dtime']);	
			}


			if(array_key_exists('reference', $_POST)!==false){
				$reference=$_POST['reference'];
			}else{
				$reference='';
			}
			
			
			$data = [
				'money'=>$money,
				'genre'=>$genre,
				'paymentMode'=>$paymentMode,
				'dtime'=>$dtime,
				'reference'=>$reference,
	  			'user_id' =>$id,
	  			'type' =>1,
	  			'addtime'=>time()
				];
				$billadd = db('b_bill')->insert($data);
	
				if($billadd){
		            
		            return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		        } else {
		            return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);
		        }
    
	}

public function addexpenditure()
	{
	      
	     	$info= Request::instance()->header();
			$rest = substr($info['tokenid'] , 20 , 5);
			$id=$rest;
	
			$money=$_POST['money'];
			$genre=$_POST['genre'];
			$paymentMode=$_POST['paymentMode'];
			if(strpos($_POST['dtime'],'年') !== false){
				$str = $_POST['dtime'];  
    			$arr = date_parse_from_format('Y年m月d日',$str);
				$dtime= mktime(0,0,0,$arr['month'],$arr['day'],$arr['year']);
			}else{
				$dtime=strtotime($_POST['dtime']);	
			}
			
			if(array_key_exists('reference', $_POST)!==false){
				$reference=$_POST['reference'];
			}else{
				$reference='';
			}
			
			$data = [
				'money'=>$money,
				'genre'=>$genre,
				'paymentMode'=>$paymentMode,
				'dtime'=>$dtime,
				'reference'=>$reference,
	  			'user_id' =>$id,
	  			'type' =>2,
	  			'addtime'=>time()
				];
				$billadd = db('b_bill')->insert($data);
	
				if($billadd){
		            
		            return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		        } else {
		            return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员在路上...']);
		        }
    
	}
	
	
public function delete()
	{
		$id=$_POST['bill_id'];
		$delete=db('b_bill')->delete($id);	
		if($delete){
           return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
        }else {      
           return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员在路上...']);
       }
	}
		
		
		
     public function upd()
	{

	      
	     	$info= Request::instance()->header();
			$rest = substr($info['tokenid'] , 20 , 5);

			$id=$_POST['bill_id'];
			$money=$_POST['money'];
			$genre=$_POST['genre'];
			$paymentMode=$_POST['paymentMode'];
			
			if(strpos($_POST['dtime'],'年') !== false){
				$str = $_POST['dtime'];  
    			$arr = date_parse_from_format('Y年m月d日',$str);
				$dtime= mktime(0,0,0,$arr['month'],$arr['day'],$arr['year']);
			}else{
				$dtime=strtotime($_POST['dtime']);	
			}
			
			
			if(array_key_exists('reference', $_POST)!==false){
				$reference=$_POST['reference'];
			}else{
				$reference='';
			}
			
			$data = [
				'money'=>$money,
				'genre'=>$genre,
				'paymentMode'=>$paymentMode,
				'dtime'=>$dtime,
				'reference'=>$reference,
	  			'addtime'=>time()
				];
				$billadd = db('b_bill')->where('bill_id',$id)->update($data);
	
				if($billadd){
		            return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		        } else {
		            return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员在路上...']);
		        }
    
	}


//券包未使用
 public function unused()
    {
    	$info= Request::instance()->header(); 
    	if(array_key_exists('tokenid', $info)===false){
    		$id=0;		
    	}else{
	    	$rest = substr($info['tokenid'] , 20 , 5);
	    	$id=$rest;	
    	}

				$data = db('c_coupons')
				->where('uid',$id)
				->where('type',0)
				->where('validity','<',time())
				->order('addtime desc')
				->select();
				
			foreach ($data as $key => $val){
				$data[$key]['background'] =$data[$key]['background1'];
			$data[$key]['validity']=date('Y-m-d',$data[$key]['validity']);
			$data[$key]['url'] ="http://test2.8haoqianzhuang.com";
	
				}
   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
//券包已使用
 public function bytesUsed()
    {
		$info= Request::instance()->header(); 
    	if(array_key_exists('tokenid', $info)===false){
    		$id=0;		
    	}else{
	    	$rest = substr($info['tokenid'] , 20 , 5);
	    	$id=$rest;	
    	}

				$data = db('c_coupons')
				->where('uid',$id)
				->where('type',1)
				->where('validity','<',time())
				->order('addtime desc')
				->select();
				
			foreach ($data as $key => $val){
				$data[$key]['background'] =$data[$key]['background2'];
		$data[$key]['validity']=date('Y-m-d',$data[$key]['validity']);
			$data[$key]['url'] ="http://test2.8haoqianzhuang.com";
	
				}
   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
//券包已过期
 public function pastDue()
    {
		$info= Request::instance()->header(); 
    	if(array_key_exists('tokenid', $info)===false){
    		$id=0;		
    	}else{
	    	$rest = substr($info['tokenid'] , 20 , 5);
	    	$id=$rest;	
    	}

				$data = db('c_coupons')
				->where('uid',$id)
				->where('type',0)
				->where('validity','>',time())
				->order('addtime desc')
				->select();
				
			foreach ($data as $key => $val){
				$data[$key]['background'] =$data[$key]['background2'];
		$data[$key]['validity']=date('Y-m-d',$data[$key]['validity']);
			$data[$key]['url'] ="http://test2.8haoqianzhuang.com";
	
				}
   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
	
	

    }
    
    
    
    
    //cdkey
 public function cdkey()
    {

		$cdkey=['cdkey'];
	
   		return json(['state'=>2558,'data'=>['url'=>'http://test2.8haoqianzhuang.com'],'mesg'=>'操作完成']);
	
	

    }
    
    
}
