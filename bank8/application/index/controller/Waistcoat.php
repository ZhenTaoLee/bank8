<?php

namespace app\index\controller;
use app\common\model\Weather;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

class Waistcoat extends Index
{

	   //首页
	  public function first()
    {
    	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						

//	$id=41; 
  
    $sumlimit= db('bank_check')
		->where('user_id',$id)
		->sum('limits');
//	echo db('bank_check')->getLastSql();die();
	
    $sumdebt= db('bank_check')
		->where('user_id',$id)
		->sum('debt');
		
	$count= db('bank_check')
		->where('user_id',$id)
		->count();	
		
	$showtime=date("d");
	$showtimem=date("m");
	$check= db('bank_check')
		->order('dueDate desc')
		->where('user_id',$id)
		->where('dueDate','>',$showtime)
		->select();	
	if($check){
	$also=$check[0]['dueDate']-	$showtime;//还有
	$charge=$showtimem.'月'.$check[0]['accountantBillDate'].'日出帐';//出帐日
	$debt=$check[0]['debt'];//带还金额
	$repayment=$showtimem.'/'.$check[0]['dueDate'];
		
		$cardbank= db('cardbank')
		->where('id',$check[0]['carid'])
		->find();
		$logo=$cardbank['logo'];
	
	}else{
		$checks= db('bank_check')
		->order('dueDate desc')
		->where('user_id',$id)
		->select();
		if($checks){
			$also=30-$showtime+$checks[0]['dueDate'];//还有
			$charge=$showtimem.'月'.$checks[0]['accountantBillDate'].'日出帐';//出帐日
			$debt=$checks[0]['debt'];//带还金额
			$repayment=$showtimem.'/'.$checks[0]['dueDate'];
		$cardbank= db('cardbank')
		->where('id',$checks[0]['carid'])
		->find();
		$logo=$cardbank['logo'];
		}else{
			$also=0;//还有
			$charge='出帐单日';//出帐日
			$debt=0;//带还金额
			$repayment='0/0';
			$logo='https://zykj.8haoqianzhuang.cn/9042e201805111407131918.png';
		}
		
	}
	$data=[
	'sumlimit'=>$sumlimit,
	'sumdebt'=>$sumdebt,
	'count'=>$count,
    'also'=>$also,
	'charge'=>$charge,
	'debt'=>$debt,
	'logo'=>$logo,
	'repayment'=>$repayment	
	];
	
	
	
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }
   
   	  public function cardbank()
    {
    	

	$cardbank= db('cardbank')->field('id,cardname,logo,whether')->select();	

	
   	return json(['state'=>2558,'data'=>$cardbank,'mesg'=>'操作完成']);
    } 
 	


	   //卡包
	  public function carpackage()
    {
    	
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}
//	$id=41; 
  
	$count= db('bank_check')
		->where('user_id',$id)
		->count();
		
	$data= db('bank_check')
		->join('cardbank','carid = ba_cardbank.id','left')
		->field('bank_check_id,accountantBillDate,dueDate,carNumber,remark,debt,limits,ba_cardbank.cardname,ba_cardbank.logo')
		->where('user_id',$id)
		->select();	

   	return json(['state'=>2558,'data'=>['count'=>$count,'array'=>$data],'mesg'=>'操作完成']);
    }



	   //卡包详情
	  public function carparticulars()
    {
    	

  	$bank_check_id=$_POST['bank_check_id']; 
  

	$data= db('bank_check')
		->join('cardbank','carid = ba_cardbank.id','left')
		->field('bank_check_id,accountantBillDate,dueDate,carNumber,remark,debt,limits,ba_cardbank.cardname,ba_cardbank.logo')
		->where('bank_check_id',$bank_check_id)
		->find();	
if($data){
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
}
   	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
   	
    }
    
//删除
	public function delete()
	{		
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}
		$bank_check_id=$_POST['bank_check_id']; 
		$delete=db('bank_check')->delete($bank_check_id);
		$deletes=db('advices')->where('oncemany',$bank_check_id)->delete();
	
		if($delete){
			return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}
	return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员正在路上...']);
	}
	
	
	
		public function add()
	{
		
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}	
	
			$carid=$_POST['id'];
			$accountantBillDate=$_POST['accountantBillDate'];//账单日
			$dueDate=$_POST['dueDate'];//还款日
			$carNumber='**** **** **** '.$_POST['carNumber'];//卡号
			$remark=$_POST['remark'];//备注
			$debt=$_POST['debt'];//借款
			$limits=$_POST['limits'];//额度
			
			$data = [
	  			'addtime' =>time(),
	  			'carid'=>$carid,
	  			'user_id' =>$id,
	  			'carNumber'=>$carNumber,
	  			'dueDate'=>$dueDate,
	  			'accountantBillDate'=>$accountantBillDate,
	  			'remark'=>$remark,
	  			'debt'=>$debt,
	  			'limits'=>$limits
				];
			$add = db('bank_check')->insert($data);		
			
	$cardbank= db('cardbank')->where('id',$carid)->find();	
		
	
			$datas = [
				'userid'=>$id,
	  			'addtime' =>time(),
	  			'type'=>'添加信用卡成功!',
	  			'content' =>$cardbank['cardname'].'信用卡, 近期待还金额:￥'.$debt.'元, 账单日为每月'.$accountantBillDate.'号，还款日为每月'.$dueDate.'号，请及时还款，以免影响您的个人信用。'
				];
			
			$advicesadd = db('advices')->insert($datas);	
			
		if($add){
			return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}
	return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员正在路上...']);

   
        
	}
	
			public function upd()
	{
		
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}	
			$bank_check_id=$_POST['bank_check_id']; 		
			$accountantBillDate=$_POST['accountantBillDate'];//账单日
			$dueDate=$_POST['dueDate'];//还款日
			$remark=$_POST['remark'];//备注
			$debt=$_POST['debt'];//借款
			$limits=$_POST['limits'];//额度
			
			$data = [

	  			'dueDate'=>$dueDate,
	  			'accountantBillDate'=>$accountantBillDate,
	  			'remark'=>$remark,
	  			'debt'=>$debt,
	  			'limits'=>$limits
				];
				
		$upd = db('bank_check')->where('bank_check_id',$bank_check_id)->update($data);
	
		if($upd){
			return json(['state'=>2558,'data'=>[''],'mesg'=>'操作完成']);
		}
	return json(['state'=>4040,'data'=>[''],'mesg'=>'程序员正在路上...']);

   
        
	}
	
	
	
		public function advices()
	{
	$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;						
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}	

		
	$data= db('advices')
		->field('type,content,addtime,oncemany')
		->order('addtime desc')
		->where('userid',$id)
		->select();
			
	foreach ($data as $key => $val) {  
		if($data[$key]['oncemany']>0){
			$data[$key]['jump']=1;
		}else{
			$data[$key]['jump']=0;
		}
		$data[$key]['bank_check_id']=$data[$key]['oncemany'];
		$data[$key]['addtime']=date('Y-m-d H:i:s', $data[$key]['addtime']);
			
		}
				
				
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);    	


        
	}


		public function advs()
	{


		
	$data= db('bank_check')->select();
			
	foreach ($data as $key => $val) {  
			$showtime=date("d");
			$showtimey=date("Y");
			$showtimem=date("m");
			if($data[$key]['dueDate']>5){
				
		if($showtime==$data[$key]['dueDate']-5 || $showtime==$data[$key]['dueDate']-1){
			$datas = [
				'userid'=>$data[$key]['user_id'],
	  			'addtime' =>time(),
	  			'type'=>'还款提醒!',
	  			'oncemany'=>$data[$key]['bank_check_id'],
	  			'content' =>'还款日期：' .$showtimey. '-' .$showtimem. '-' .$data[$key]['dueDate'] . '待还金额：￥' .$data[$key]['debt']. '元，请及时还款，以免影响您的个人信用。'
				];
			$advicesadd = db('advices')->insert($datas);	
				
			}
						
			}else{
				if($showtime==1){
				$datas = [
				'userid'=>$data[$key]['user_id'],
	  			'addtime' =>time(),
	  			'oncemany'=>$data[$key]['bank_check_id'],
	  			'type'=>'还款提醒!',
	  			'content' =>'还款日期：' .$showtimey. '-' .$showtimem. '-' .$data[$key]['dueDate'] . '待还金额：￥' .$data[$key]['debt']. '元，请及时还款，以免影响您的个人信用。'
				];
			$advicesadd = db('advices')->insert($datas);	
					
				}
			}
		
		
		
			
		}
				
				
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);    	


        
	}




//		public function num()
//	{
//		
//		
//	$ss=$_GET['num'];
//	$str =file_get_contents("http://bankcardsilk.api.juhe.cn/bankcardsilk/query.php?num=".$ss."&key=f60cfe28f19f7dec77805c54208445d9");  
//
// //对json格式的字符串进行编码  
// $arr =json_decode($str,TRUE);
//
//      
//	}	
}
