<?php

namespace app\index\controller;
use app\common\model\Weather;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

class Weathers extends Index
{

	   //咨询产品
	  public function good()
    {
    	
	$info= Request::instance()->header(); 
	if(array_key_exists('tokenid', $info)){	
		$rest = substr($info['tokenid'],20,5);
		$id=$rest;
	}else{
		$id=0;	
	}
   
    

    $cityName=$_POST['cityName'];
    $map['city']  = ['like',"%" . $cityName . "%"];
    $map['putaway']  = 1;

		$goodtype=$_POST['goodtype'];
		if($goodtype=='房信用'){
			$map['goodtype']=1;
		}
		elseif($goodtype=='保单信用'){
			$map['goodtype']= 3;	
		}
		elseif($goodtype=='其它'){
			$map['goodtype']=4 ;	
		}
		elseif($goodtype=='公积金信用'){
			$map['goodtype']=5;	
		}
		elseif($goodtype=='车信用'){
			$map['goodtype']=2;	
		}

	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
	->order('ratio asc')
	->where($map)
	->select();
	foreach ($data as $key => $val) {
		if($id==0 || $id==null ){	
			$data[$key]['collect']=0;
		}else{
					$ss= db('collects')
					->where('user_id',$id)
					->where('good_id',$data[$key]['good_id'])
					->find();
					if($ss){
						$data[$key]['collect']=1;
					}else{
						$data[$key]['collect']=0;
					}
		}
	$data[$key]['url'] ="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];

			}
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }
    
    
     public function goodCollects()
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
		

		
		$data= db('collects')
		->field('good_id')
		->where('user_id',$id)
		->select();
		foreach ($data as $key => $val) {
		$data[$key]['collect']=1;
		
		$good = db('good')
	   	->join('bank','bankid = ba_bank.b_id','left')
		->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')
		->where('good_id',$data[$key]['good_id'])
		->find();
	$data[$key]['goodName'] =$good['goodName'];
	$data[$key]['goodtype'] =$good['goodtype'];
	$data[$key]['label'] =$good['label'];
	$data[$key]['agelimit'] =$good['agelimit'];
	$data[$key]['accrual'] =$good['accrual'];
	$data[$key]['limit'] =$good['limit'];
	$data[$key]['bankname'] =$good['bankname'];
	$data[$key]['logo'] =$good['logo'];
	$data[$key]['url'] ="https://www.8haoqianzhuang.com/index.php/index/Finance/detailed?id=".$data[$key]['good_id'];

			}
			
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);			

 	}
 	
 	
 	
 	
    
    
    public function collects()
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
		
		$good_id=$_POST['good_id'];
		
		$ss= db('collects')
		->where('user_id',$id)
		->where('good_id',$good_id)
		->find();
		if($ss){
			$delete=db('collects')
			->where('user_id',$id)
			->where('good_id',$good_id)
			->delete();
			
			return json(['state'=>2558,'data'=>['reminder'=>'取消收藏','collect'=>0],'mesg'=>'取消收藏']);
		}else{
			$adddata=['user_id'=>$id,'good_id'=>$good_id,'addtime'=>time()];
			
			$add=db('collects')->insert($adddata);
			
			return json(['state'=>2558,'data'=>['reminder'=>'收藏','collect'=>1],'mesg'=>'收藏']);
			
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);	

 	}
 	
 	
 	
    
    
	
	
	
public function weathers ()
 	{
header('Content-type:text/html;charset=utf-8');
 	$info= Request::instance()->header(); 
 	$sss=$info['user-agent'];

// 		Scale/3.00  Scale/2.00 	
 			
	$city = '广州';   
   //获取json格式的数据  
if(Cache::get('arr')!=false){
	
$arr=Cache::get('arr');


}else{
	$str =file_get_contents("https://www.sojson.com/open/api/weather/json.shtml?city=".$city); 
  	//对json格式的字符串进行编码  
  	$arr =json_decode($str,TRUE); 
	Cache::set('arr',$arr,3600);
}
 if(isset($arr['data'])){
      
if(strpos($arr['data']['forecast'][0]['type'],'雨') !== false ){
  	$picturex2='https://zykj.8haoqianzhuang.cn/28971201804171028253703.png';
  	$picturex3='https://zykj.8haoqianzhuang.cn/192e8201804171029144588.png';
  }elseif($arr['data']['forecast'][0]['type']=='多云'){
  	$picturex2='https://zykj.8haoqianzhuang.cn/b7f4e20180417104336231.png';
  	$picturex3='https://zykj.8haoqianzhuang.cn/5479b201804171044207829.png';
  }else{
  	$picturex2='https://zykj.8haoqianzhuang.cn/0f80620180417103218865.png';
  	$picturex3='https://zykj.8haoqianzhuang.cn/f0c3d201804171033003813.png';
  }
    

    if(strpos($sss,'Scale/3.00') !== false ){
    	$picture=$picturex3;
    }else{
    	$picture=$picturex2;
    }

$weekarray=array("日","一","二","三","四","五","六");
$week= "星期".$weekarray[date("w",time())];
    
  $data=[
  'shidu'=>$arr['data']['shidu'],
  'pm25'=>$arr['data']['pm25'],
  'pm10'=>$arr['data']['pm10'],
  'quality'=>$arr['data']['quality'],
  'wendu'=>$arr['data']['wendu'],
  'ganmao'=>$arr['data']['ganmao'],
  
  'date'=>$week,
  'sunrise'=>$arr['data']['forecast'][0]['sunrise'],
  'high'=>$arr['data']['forecast'][0]['high'],
  'low'=>$arr['data']['forecast'][0]['low'],
  'sunset'=>$arr['data']['forecast'][0]['sunset'],
  'aqi'=>$arr['data']['forecast'][0]['aqi'],
  'fx'=>$arr['data']['forecast'][0]['fx'],
  'fl'=>$arr['data']['forecast'][0]['fl'],
  'type'=>$arr['data']['forecast'][0]['type'],
  'notice'=>$arr['data']['forecast'][0]['notice'],
  'picture'=>$picture,
	'stime'=>date('Y-m-d', time())
  ];


	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		

 }else{
 		$data=[
  'shidu'=>"87%",
  'pm25'=>23,
  'pm10'=>42,
  'quality'=>"优",
  'wendu'=>"32",
  'ganmao'=>"各类人群可自由活动", 
  'date'=>"星期五",
  'sunrise'=>"05:45",
  'high'=>"高温 34.0℃",
  'low'=>"低温 26.0℃",
  'sunset'=>"19:02",
  'aqi'=>50,
  'fx'=>"无持续风向",
  'fl'=>"<3级",
  'type'=>"雷阵雨",
  'notice'=>"带好雨具，别在树下躲雨",
  'picture'=>"https://zykj.8haoqianzhuang.cn/28971201804171028253703.png",
	'stime'=>"2018-05-18"
  ];


	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
 }
 
   
      
 

 	}



public function dictum()
 	{
 		
		$data=[
		['content'=>'        尘世间的事物，真相与表象总是有很大的区别。只有一小部分人能透过现象看到本质，绝大多数人还停留在表象上。如果你面露狰狞，即使手握真理也会处境艰难。','name'=>'——格拉西安《智慧书》'],
		['content'=>'        在我漫长的一生中，有多少小小的子弹和霰弹落到了我的身上，不知从哪儿飞来，击中我的心灵，于是给我留下许多弹伤。而当我的生命已近暮年，这些数不尽的伤口开始愈合了。在那曾经受伤的地方，就生长出思想来。','name'=>'——米·普里什文'],
		['content'=>'        我想要踏上归程，却无法起身， 难以成行。也未能 在落叶中挖掘墓穴，不知所措，只有哭泣。 我的上苍，让我落得这等 孤零。','name'=>'——米斯特拉尔《死的十四行诗》'],
		['content'=>'        每一个人都应该有这样的信心：人所能负的责任，我必能负；人所不能负的责任，我亦能负。如此，你才能磨炼自己，求得更高的知识而进入更高。','name'=>'——林肯'],
		['content'=>'        书读的越多而不加思考，你就会觉得你知道得很多；而当你读书而思考得越多的时候，你就会越清楚地看到，你知道得很少。','name'=>'——伏尔泰'],
		['content'=>'        残疾人的成功通常不易招致嫉妒。因为他们有缺陷，使人乐于宽忍他们的成功。也常使潜在的对手忽视了他们的竞争和挑战。','name'=>'——培根'],
		['content'=>'        土地是以它的肥沃和收获而被估价的；才能也是土地，不过它生产的不是粮食，而是真理。如果只能滋生瞑想和幻想的话，即使再大的才能也只是砂地或盐池，那上面连小草也长不出来的。','name'=>'——别林斯基'],
		['content'=>'        作为一个科学家来说，我的成功……最主要的是：爱科学在长期思索任何问题上的无限耐心，在观察和搜集事实上的勤勉，相当的发明能力和常识。','name'=>'——达尔文'],
		['content'=>'        社会只拿小丑取乐，没有其他的要求，一转眼就把他们忘了；不比看到一个器局伟大的人，一定要他超凡入圣才肯向他下跪。各有各的规律：历久不磨的钻石不能有一点儿瑕疵，一时流行的出品不妨单薄，古怪，华而不实。','name'=>'——易卜生'],
		['content'=>'        最难抑制的情感是骄傲，尽管你设法掩饰，竭力与之斗争，它仍然存在。即使我敢相信已将它完全克服，我很可能又因自己的谦逊而感到骄傲。','name'=>'——富兰克林']		
		];

    
	$ff=rand(0,9);

	return json(['state'=>2558,'data'=>$data[$ff],'mesg'=>'操作成功']);
		


 	}


public function carousel()
 	{
 	 	$info= Request::instance()->header(); 
 	$sss=$info['user-agent'];
 	
 	if(strpos($sss,'Scale/3.00') !== false ){
    	$data=[
['picture'=>'https://zykj.8haoqianzhuang.cn/90ed1201804201545221589.png'],
['picture'=>'https://zykj.8haoqianzhuang.cn/b7555201804201545501172.png']

];
    }else{
$data=[
['picture'=>'https://zykj.8haoqianzhuang.cn/2f256201804201544058304.png'],
['picture'=>'https://zykj.8haoqianzhuang.cn/07a7c20180420154441525.png']
];
    }
    
   return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);	
}

//收藏和取消收藏    
public function collect()
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
		$journalism_id=$_POST['journalism_id'];
		
		$ss= db('collect')
		->where('user_id',$id)
		->where('journalism_id',$journalism_id)
		->find();
		if($ss){
			$delete=db('collect')
			->where('user_id',$id)
			->where('journalism_id',$journalism_id)
			->delete();
			return json(['state'=>2558,'data'=>['reminder'=>'取消收藏','collect'=>0],'mesg'=>'取消收藏']);
		}else{
			$adddata=['user_id'=>$id,'journalism_id'=>$journalism_id,'addtime'=>time()];
			$add=db('collect')->insert($adddata);
			return json(['state'=>2558,'data'=>['reminder'=>'收藏','collect'=>1],'mesg'=>'收藏']);
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);	

 	}
 	
 	
//获取此消息是否被收藏
public function enshrine()
 	{
		$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
						
		if($id==0 || $id==null ){			
			return json(['state'=>2558,'data'=>['collect'=>0],'mesg'=>'操作成功']);		
    	}
    	$user = db('user')->where('user_id',$id)->find();

		$journalism_id=$_POST['journalism_id'];
		$ss= db('collect')
		->where('user_id',$id)
		->where('journalism_id',$journalism_id)
		->find();
		
		if($ss){
			
			return json(['state'=>2558,'data'=>['collect'=>1],'mesg'=>'取消收藏']);
		}else{
			
			return json(['state'=>2558,'data'=>['collect'=>0],'mesg'=>'收藏']);
		}
		return json(['state'=>4040,'data'=>[''],'mesg'=>'网络错误']);	

 	}
 	
 	//收藏的新闻
      public function journalism()	  
    {	
    	
    	$info= Request::instance()->header(); 
   		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
						
		if($id==0 || $id==null ){			
			return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);		
    	}
    	
    	
		$datas= db('collect')
		->field('journalism_id')
		->where('user_id',$id)
		->select();
		

		

   			foreach ($datas as $key => $val) { 
   				 
				$data = db('journalism')->where('journalism_id',$datas[$key]['journalism_id'])->find();
				
				$datas[$key]['headline']=$data['headline'];
				$datas[$key]['picture']=$data['picture'];
				$datas[$key]['addtime']=$data['addtime'];
	
				$datas[$key]['BigAndLittle']=$data['BigAndLittle'];
				$datas[$key]['source']=$data['source'];
				$datas[$key]['webtest']='';

				$datas[$key]['formatTime']=date("Y-m-d H:i",$data['addtime']);
				$datas[$key]['url']='https://www.8haoqianzhuang.com/index.php/index/Finance/details?id='.$data['journalism_id'];
				  $y=time();
				  $s=$data['addtime'];
				  $t=$y-$s;
				  
				if($t<=300){
				   	$datas[$key]['betweenTime']='1分钟前';
				}
				elseif($t>300 && $t<=600){
				   	$datas[$key]['betweenTime']='5分钟前';
				}
				elseif($t>600 && $t<=900){
				   	$datas[$key]['betweenTime']='10分钟前';
				}
				elseif($t>900 && $t<=1800){
				   	$datas[$key]['betweenTime']='15分钟前';
				}
				elseif($t>1800 && $t<=3600){
				   	$datas[$key]['betweenTime']='30分钟前';
				}
				elseif($t>3600 && $t<=7200){
				   	$datas[$key]['betweenTime']='1小时前';
				}
				elseif($t>7200 && $t<=10800){
				   	$datas[$key]['betweenTime']='2小时前';
				}
				elseif($t>10800 && $t<=14400){
				   	$datas[$key]['betweenTime']='3小时前';
				}
				 elseif($t>14400 && $t<=18000){
				   	$datas[$key]['betweenTime']='4小时前';
				}
 				elseif($t>18000 && $t<=21600){
				   	$datas[$key]['betweenTime']='5小时前';
				}
 				elseif($t>21600 && $t<=43200){
				   	$datas[$key]['betweenTime']='6小时前';
				}
				elseif($t>43200 && $t<=86400){
				   	$datas[$key]['betweenTime']='12小时前';
				}
				elseif($t>86400 && $t<=172800){
				   	$datas[$key]['betweenTime']='1天前';
				}
				elseif($t>172800 && $t<=259200){
				   	$datas[$key]['betweenTime']='2天前';
				}
				elseif($t>259200 && $t<=345600){
				   	$datas[$key]['betweenTime']='3天前';
				}
				elseif($t>345600 && $t<=43200){
				   	$datas[$key]['betweenTime']='4天前';
				}
				elseif($t>43200 && $t<=518400){
				   	$datas[$key]['betweenTime']='5天前';
				}
				elseif($t>518400 && $t<=604800){
				   	$datas[$key]['betweenTime']='6天前';
				}
 				elseif($t>604800 && $t<=1296000){
				   	$datas[$key]['betweenTime']='1星期前';
				}
				elseif($t>1296000 && $t<=2592000){
				   	$datas[$key]['betweenTime']='半月前';
				}
				elseif($t>2592000 && $t<=5184000){
				   	$datas[$key]['betweenTime']='一月前';
				}
				elseif($t>5184000 && $t<=7776000){
				   	$datas[$key]['betweenTime']='二月前';
				}
				elseif($t>7776000 && $t<=15811200){
				   	$datas[$key]['betweenTime']='三月前';
				}
				elseif($t>15811200 && $t<=31536000){
				   	$datas[$key]['betweenTime']='半年前';
				}
				elseif($t>31536000){
				   	$datas[$key]['betweenTime']='一年前';
				}

				
				}
   	return json(['state'=>2558,'data'=>$datas,'mesg'=>'操作完成']);
      
    } 
 	
 	
public function loan()
 	{

$unitPrice=$_POST['unitPrice'];//单价
$area=$_POST['area'];//面积
$plies=$_POST['plies'];//成数
$year=$_POST['year'];//年数
$interestRate=$_POST['interestRate'];//利率


//$unitPrice=10000;//单价
//$area=100;//面积
//$plies=7;//成数
//$year=20;//年数
//$interestRate=4;//利率

$a=0.1*$plies;//成数
$s=1-$a;
$i=$interestRate*0.01;
$dddbbb=$i/12;

$houseRental=$unitPrice*$area;//房款总额
$loansRental=$unitPrice*$area*$a;//贷款总额
$month=$year*12;//贷款月数


$xx=1+$dddbbb;

$sdf= pow($xx,$month);

$tiu=$loansRental*$dddbbb*$sdf;

$dddd=$sdf-1;

$average=$tiu/$dddd;//月均还款

$refundRental=$month*$average;//还款总额

$interest=$refundRental-$loansRental;//支付利息

$downPayment=$houseRental*$s;//首期




$data=
[
'houseRental'=>$houseRental,
'loansRental'=>$loansRental,
'refundRental'=>$refundRental,
'interest'=>$interest,
'downPayment'=>$downPayment,
'month'=>$month,
'average'=>$average
];

    
   return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);	
}





 	
 	
 	public function assetadd()
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
		
//		$id=12;
//		$site=11212;//地址
//		$area=123;//面积
//		$houseType=54455;//户型
//		$direction=55455;//朝向
//		$tier=543654;//楼层
//		$atime=54554;//时间
//		$purchase=500;//购入价格
	
	
		$site=$_POST['site'];//地址
		$area=$_POST['area'];//面积
		$houseType=$_POST['houseType'];//户型
		$direction=$_POST['direction'];//朝向
		$tier=$_POST['tier'];//楼层
		$atime=$_POST['atime'];//时间
		$purchase=$_POST['purchase'];//购入价格
		
		if(strpos($site,'广州') !== false){
			$ttf=1;
		}elseif(strpos($site,'深圳') !== false){
			$ttf=2;
		}else{
			$ttf=0.5;
		}
	
		$frt=$area*0.1;
		
		if($atime=='更早'){
		$tyt=20;		
		$ffaa=$tyt*1;	
		}else{
		$tyt=2018-$atime;		
		$ffaa=$tyt*1;
		}
		

		$price=1.2*$purchase+$ttf+$frt+$ffaa;//价格
		
		$difference=$price-$purchase;
		
		
	$adddata=[
	'user_id'=>$id,
	'site'=>$site,
	'area'=>$area,
	'houseType'=>$houseType,
	'direction'=>$direction,
	'tier'=>$tier,
	'purchase'=>$purchase,
	'price'=>$price,
	'atime'=>$atime	
	];
	$add=db('assetshow')->insert($adddata);
	$assetshowid =db('assetshow')->getLastInsID();
	return json(['state'=>2558,'data'=>['price'=>$price,'difference'=>$difference,'houseId'=>$assetshowid],'mesg'=>'操作成功']);
		
 	}
 	
 	
 	
  	public function assetshow()
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
		
		
	$data= db('assetshow')
		->where('user_id',$id)
		->where('yesno',1)
		->select();
foreach ($data as $key => $val) { 
	$data[$key]['difference']=$data[$key]['price']-$data[$key]['purchase'];

}
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		
 	}
	
	
	  	public function addhouseassetadd()
 	{
 		$id=$_POST['houseId'];
	$upd= db('assetshow')->where('assetshow_id', $id)->update(['yesno' =>1]);
	return json(['state'=>2558,'data'=>[''],'mesg'=>'操作成功']);
		
 	}
 	
 	
 	
	
	 	public function assetsum()
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
		
	$dff= db('assetshow')
		->where('user_id',$id)
		->where('yesno',1)
		->sum('price');
		
	$dss= db('assetshow')
		->where('user_id',$id)
		->where('yesno',1)
		->sum('purchase');
	$dcc=$dff-$dss;
	$data=['pricesum'=>$dff,
	'purchasesum'=>$dss,
	'differencesum'=>$dcc,
	];
	
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);
		
 	}


}
