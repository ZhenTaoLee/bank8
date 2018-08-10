<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
//2.5版本的首页
class Homepage extends Index
	{


		//网页地址
		static public function http()
		{
				$http = "http://test2.8haoqianzhuang.com";
				return $http;
		}

//八号快报
 public function journalism()
    {
    		$http = $this->http();
				$data = db('journalism')
				->field('journalism_id,headline')
				->where('status',1)
				->order('addtime desc')
				->select();
			foreach ($data as $key => $val){
		
			$data[$key]['url'] ="$http".'/index.php/index/Finance/details?id='.$data[$key]['journalism_id'];
	
				}
   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    
	//活动
	  public function activity()
    {
    	
    	
   

	 $data=[
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/a9c42201806251451338922.png',
	 'activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/c1ae420180625145243537.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/a9c42201806251451338922.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html'],
	 ['activityPicture'=>'https://zykj.8haoqianzhuang.cn/c1ae420180625145243537.png','activityurl'=>'http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/cesji.html']
	 ];
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }

//资产统计
	  public function property()
    {
$info= Request::instance()->header();

if(array_key_exists('tokenid', $info)!==false){
	$rest = substr($info['tokenid'] , 20 , 5);
	$id=$rest;
	if($id!=0){
	$y=date('Y', time());
	$m=date('m', time());
	$s=$m+1;
	$itime=strtotime($y.'-'.$m."-1");
	$stime=strtotime($y.'-'.$s."-1");
	
	$map['dtime'] = ['between',"$itime,$stime"];
		
	$income= db('b_bill')->where('user_id',$id)->where('type',1)->where($map)->sum('money');
	$expenditure= db('b_bill')->where('user_id',$id)->where('type',2)->where($map)->sum('money');
	
	$data= ['income'=>sprintf('%.2f', $income),'expenditure'=>sprintf('%.2f', $expenditure)];	
	}else{
	$data= ['income'=>0.00,'expenditure'=>0.00];
	}
	
}else{
	$data= ['income'=>0.00,'expenditure'=>0.00];
}

 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }
    
    

    //推荐产品
	  public function good()
    {
$info= Request::instance()->header();
	$http = $this->http();
	
    $cityName=$_POST['cityName'];
   
    $map['city']  = ['like',"%" . $cityName . "%"];
    $map['putaway']  = 1;

	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
	->order('ratio asc')
	->limit(6)
	->where($map)
	->select();

	foreach ($data as $key => $val){
		if(array_key_exists('tokenid', $info)!==false){
			$rest = substr($info['tokenid'] , 20 , 5);
			$id=$rest;
			if($id==0 || $id==null ){	
			$data[$key]['attention']=0;
			}else{
				$ss= db('collects')
				->where('user_id',$id)
				->where('good_id',$data[$key]['good_id'])
				->find();
				if($ss){
					$data[$key]['attention']=1;
				}else{
					$data[$key]['attention']=0;
				}
		}

		}else{
		$data[$key]['attention']=0;
		}
	$data[$key]['url'] ="$http".'/index.php/index/Homepage/detailed?id='.$data[$key]['good_id'];
	
				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }

  //产品详情
	  public function detailed()
    {
		
         $id = $_GET['id'];
      //左连接查询产品表
      	$list = db('good')
      		->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,agelimit,accrual,condition,datum,notice,limit,ba_bank.bankname,ba_bank.logo,ba_bank.city')
			->where('good_id',$id)
			->order('ratio asc')
			->find();


    	$this->assign('list', $list);
		return $this->fetch();

	}


   //推荐产品
	  public function goods()
    {
	$info= Request::instance()->header();
	$http = $this->http();
	
    $cityName=$_POST['cityName'];
    $goodtype=$_POST['goodtype'];
    $map['city']  = ['like',"%" . $cityName . "%"];
    $sort=$_POST['sort'];
    $map['putaway']  = 1;
    
   if($_POST['page']>0){
   	
   	
			$f=$_POST['page']-1;
			$s=$f*8;
			
			if($sort==0){
					
			if($goodtype==0){
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('popularity desc')
				->limit($s,8)
				->where($map)
				->select();
				
			}elseif($goodtype<4){
				
				$map['goodtype']  = ['like',"%" . $goodtype . "%"];
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('popularity desc')
				->limit($s,8)
				->where($map)
				->select();
				
			}else{
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('popularity desc')
				->limit($s,8)
				->where($map)
				->where(function ($query) {
							    $query->where('goodtype',4)
							    ->whereOr('goodtype',5);
				})
				->select();
			
			}
			}elseif($sort==1){
					
			if($goodtype==0){
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('ratio asc')
				->limit($s,8)
				->where($map)
				->select();
				
			}elseif($goodtype<4){
				
				$map['goodtype']  = ['like',"%" . $goodtype . "%"];
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('ratio asc')
				->limit($s,8)
				->where($map)
				->select();
				
			}else{
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('ratio asc')
				->limit($s,8)
				->where($map)
				->where(function ($query) {
							    $query->where('goodtype',4)
							    ->whereOr('goodtype',5);
				})
				->select();
			
			}
				
			}else{
					
			if($goodtype==0){
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('maxLimit desc')
				->limit($s,8)
				->where($map)
				->select();
				
			}elseif($goodtype<4){
				
				$map['goodtype']  = ['like',"%" . $goodtype . "%"];
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('maxLimit desc')
				->limit($s,8)
				->where($map)
				->select();
				
			}else{
				
				$data = db('good')
			   	->join('bank','bankid = ba_bank.b_id','left')
				->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
				->order('maxLimit desc')
				->limit($s,8)
				->where($map)
				->where(function ($query) {
							    $query->where('goodtype',4)
							    ->whereOr('goodtype',5);
				})
				->select();
			
			}
				
			}
			
			
   }else{
   	
   	
   if($sort==0){
   			if($goodtype==0){
		   		
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity
,limit,accrual,hot')
			->order('popularity desc')
			->where($map)
			->select();
			
		}elseif($goodtype<4){
			
			$map['goodtype']  = ['like',"%" . $goodtype . "%"];
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('popularity desc')
			->where($map)
			->select();
			
		}else{
			
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('popularity desc')
			->where($map)
			->where(function ($query) {
						    $query->where('goodtype',4)
						    ->whereOr('goodtype',5);
			})
			->select();
			
		}
   	
   	}elseif($sort==1){
   		if($goodtype==0){
		   		
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where($map)
			->select();
			
		}elseif($goodtype<4){
			
			$map['goodtype']  = ['like',"%" . $goodtype . "%"];
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where($map)
			->select();
			
		}else{
			
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where($map)
			->where(function ($query) {
						    $query->where('goodtype',4)
						    ->whereOr('goodtype',5);
			})
			->select();
			
		}
   		
   	}else{
   		
   		if($goodtype==0){
		   		
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('maxLimit desc')
			->where($map)
			->select();
			
		}elseif($goodtype<4){
			
			$map['goodtype']  = ['like',"%" . $goodtype . "%"];
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('maxLimit desc')
			->where($map)
			->select();
			
		}else{
			
			$data = db('good')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('maxLimit desc')
			->where($map)
			->where(function ($query) {
						    $query->where('goodtype',4)
						    ->whereOr('goodtype',5);
			})
			->select();
			
		}
   		
   	}
		
   }
   
    

	

	foreach ($data as $key => $val){
		if(array_key_exists('tokenid', $info)!==false){
			$rest = substr($info['tokenid'] , 20 , 5);
			$id=$rest;
			if($id==0 || $id==null ){	
			$data[$key]['attention']=0;
			}else{
				$ss= db('collects')
				->where('user_id',$id)
				->where('good_id',$data[$key]['good_id'])
				->find();
				if($ss){
					$data[$key]['attention']=1;
				}else{
					$data[$key]['attention']=0;
				}
		}

		}else{
		$data[$key]['attention']=0;
		}
	$data[$key]['url'] ="$http".'/index.php/index/Homepage/detailed?id='.$data[$key]['good_id'];
	
	$data[$key]['goodNameLogo']='<img src="'.$data[$key]['logo'].'" alt="" style="width: 10px; height: 10px;">'.$data[$key]['goodName'].'按时而烦恼打算给你多少大家撒个房间爱上';
				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }


//收藏页
     public function goodCollects()
 	{
		$info= Request::instance()->header(); 
		$http = $this->http();
	
   		
    	if(array_key_exists('tokenid', $info)===false){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}
    	
    	$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
//  	$deviceid=$info['deviceid'];							
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}
    	
	    $cityName=$_POST['cityName'];
	    $map['city']  = ['like',"%" . $cityName . "%"];

//  	$user = db('user')->where('user_id',$id)->find();
//		$device=$user['device'];	
//			
//		if($deviceid!=$device){
//			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
//		}
		 if($_POST['page']>0){
		   	$f=$_POST['page']-1;
			$s=$f*8;
			$data= db('collects')
			->join('good','ba_collects.good_id = ba_good.good_id','left')
			->join('bank','ba_good.bankid = ba_bank.b_id','left')
			->field('ba_collects.good_id,ba_good.goodName,ba_good.goodtype,ba_good.label,ba_good.picture,ba_bank.bankname,ba_bank.logo,ba_good.putaway,ba_good.popularity,ba_good.limit,ba_good.accrual')

			->where('user_id',$id)
			->where($map)
			->limit($s,8)
			->select();
		   }else{
		   	$data= db('collects')
			->join('good','ba_collects.good_id = ba_good.good_id','left')
			->join('bank','ba_good.bankid = ba_bank.b_id','left')
			->field('ba_collects.good_id,ba_good.goodName,ba_good.goodtype,ba_good.label,ba_good.picture,ba_bank.bankname,ba_bank.logo,ba_good.putaway,ba_good.popularity,ba_good.limit,ba_good.accrual')
			->where('user_id',$id)
			->where($map)
			->select();
		   }

		foreach ($data as $key => $val) {
			
		
			
		$data[$key]['attention']=1;
		$data[$key]['url'] ="$http".'/index.php/index/Homepage/detailed?id='.$data[$key]['good_id'];
			}
			
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);			

 	}
 	
 	
 	
 	



//相关问题
	  public function issue()
    {

			$http = $this->http();
			$type=$_POST['type'];
			if($type==5){
				$data = db('issue')->order('click desc')->select();
			}else{
				$data = db('issue')->where('type',$type)->order('click desc')->select();
			}
   		
   		foreach ($data as $key => $val) {
				$data[$key]['url'] ="$http".'/index.php/index/Homepage/database?id='.$data[$key]['issue_id'];
				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
    
    
    //学堂
	  public function school()
    {
$info= Request::instance()->header();
			$http = $this->http();
		if($_POST['page']>0){
		   	$f=$_POST['page']-1;
			$s=$f*8;
			$data = db('i_school')->order('click desc')->limit($s,8)->select();
		}else{
		   	$data = db('i_school')->order('click desc')->select();
		}
   		foreach ($data as $key => $val) {	
   			
   			if(array_key_exists('tokenid', $info)!==false){
			$rest = substr($info['tokenid'] , 20 , 5);
			$id=$rest;
			if($id==0 || $id==null ){	
			$data[$key]['attention']=0;
			}else{
				$ss= db('s_collects')
				->where('user_id',$id)
				->where('school_id',$data[$key]['school_id'])
				->find();
				if($ss){
					$data[$key]['attention']=1;
				}else{
					$data[$key]['attention']=0;
				}
		}

		}else{
		$data[$key]['attention']=0;
		}
		
   				
   				$data[$key]['addtime']=date('Y-m-d', $data[$key]['addtime']);
				$data[$key]['url'] ="$http".'/index.php/index/Homepage/schooldetailed?id='.$data[$key]['school_id'];
				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
    
      //学堂详情
	  public function schooldetailed()
    {
		

		return $this->fetch();

	}
	
	      //资料仓库详情
	  public function database()
    {
		 $id = $_GET['id'];
      	$list = db('issue')->where('issue_id',$id)->find();
 		$this->assign('list', $list);
		return $this->fetch();

	}
	
	
	
	
	    public function schoolcollects()
 	{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
    	$deviceid=$info['deviceid'];							
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
   		 }
    	$user = db('user')->where('user_id',$id)->find();
		$device=$user['device'];		
		if($deviceid!=$device){
			return json(['state'=>3388,'data'=>[''],'mesg'=>'该账号已在其他设备登陆,请重新登陆!']);
		}
		
		$school_id=$_POST['school_id'];
		
		$ss= db('s_collects')
		->where('user_id',$id)
		->where('school_id',$school_id)
		->find();
		if($ss){
			$delete=db('s_collects')
			->where('user_id',$id)
			->where('school_id',$school_id)
			->delete();
			
			return json(['state'=>2558,'data'=>['reminder'=>'取消收藏','collect'=>0],'mesg'=>'取消收藏']);
		}else{
			$adddata=['user_id'=>$id,'school_id'=>$school_id,'addtime'=>time()];
			
			$add=db('s_collects')->insert($adddata);
			
			return json(['state'=>2558,'data'=>['reminder'=>'收藏','collect'=>1],'mesg'=>'收藏']);
			
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);	

 	}
 	
 	//学堂收藏页
     public function schoolenshrine()
 	{
		$info= Request::instance()->header(); 
	$http = $this->http();	
    	if(array_key_exists('tokenid', $info)===false){
    		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}
    	
    	$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
//  	$deviceid=$info['deviceid'];							
		if($id==0 || $id==null ){			
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请先登录']);		
    	}


		 if($_POST['page']>0){
		   	$f=$_POST['page']-1;
			$s=$f*8;
			
			$data= db('s_collects')
			->join('i_school','ba_s_collects.school_id = ba_i_school.school_id','left')
			->field('ba_i_school.school_id,ba_i_school.headline,ba_i_school.synopsis,ba_i_school.addtime,ba_i_school.webtext,ba_i_school.click,ba_i_school.picture')
			->where('ba_s_collects.user_id',$id)
			->limit($s,8)
			->select();
			
		   }else{
		   	

		   	$data= db('s_collects')
			->join('i_school','ba_s_collects.school_id = ba_i_school.school_id','left')
			->field('ba_i_school.school_id,ba_i_school.headline,ba_i_school.synopsis,ba_i_school.addtime,ba_i_school.webtext,ba_i_school.click,ba_i_school.picture')
			->where('ba_s_collects.user_id',$id)
			->select();

			
		   }


		foreach ($data as $key => $val) {
		$data[$key]['attention']=1;
		
				$data[$key]['addtime']=date('Y-m-d', $data[$key]['addtime']);
				$data[$key]['url'] ="$http".'/index.php/index/Homepage/schooldetailed?id='.$data[$key]['school_id'];

			}
			
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);			

 	}
 	
 	
 	
 	
 	//消息接口
	  public function advices()
    {
    	$info= Request::instance()->header(); 
		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
//  	$deviceid=$info['deviceid'];							
		if($id==0 || $id==null ){			
			$data = db('advices')->where('userid',0)->order('addtime desc')->select();		
  		}else{
  			$data = db('advices')->where('userid',0)->whereOr('userid',$id)->order('addtime desc')->select();
  		}
		
			
		
   		
   		foreach ($data as $key => $val) {
   			
				$data[$key]['addtime'] =date('Y-m-d H:i:s',$data[$key]['addtime']);
				
				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }
 	
}
