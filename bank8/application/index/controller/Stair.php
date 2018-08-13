<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
class Stair extends Index
	{


		//网页地址
		static public function http()
		{
				$http = "http://test2.8haoqianzhuang.com";
				return $http;
		}


	//选择城市
	  public function city()
    {


	 $data=[
	 ['city_id'=>1,'cityName'=>'广州','phone'=>'02038472070'],
	 ['city_id'=>2,'cityName'=>'深圳','phone'=>'13538298700'],
	 ['city_id'=>3,'cityName'=>'珠海','phone'=>'07563255250'],
	 ['city_id'=>4,'cityName'=>'杭州','phone'=>'057185228020']
	 ];
 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }


    //客服
	  public function service()
    {

   	$cityName=$_POST['cityName'];
   	if($cityName=='广州'){
   		$data=['phone'=>'02038472070'];
   	}
   	elseif($cityName=='杭州'){
   		$data=['phone'=>'057185228020'];
   	}elseif($cityName=='珠海'){
   		$data=['phone'=>'07563255250'];
   	}elseif($cityName=='深圳'){
   		$data=['phone'=>'13538298700'];
   	}

 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);



    }




	//经办
	  public function handle()
    {


   	$cityName=$_POST['cityName'];
   	$map['city']  = ['like',"%" . $cityName . "%"];
   	$info= Request::instance()->header();

   	



//  $number=$_POST['number'];
    $data = db('handle')
	->join('bank','bank.b_id = bank_id','left')
	->field('han_id,bank_id,experience,name,reputations,reputation,phone,portrait,sex,bank.bankname,orderReceivings,makeABargain,limit')
	->where($map)
	->order('grade desc')
	->limit(3)
	->select();


	foreach ($data as $key => $val) {

				$data[$key]['limit']=$data[$key]['limit']."万";

				}

 	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);



    }

	//咨询广告
	  public function advertising()
    {

   	$data = db('advertising')->select();
   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }

    //咨询助手热点问题
	  public function hotNews()
    {


			$http = $this->http();                //填入你的网址

   	$data = db('issue')->order('click desc')->limit(3)->select();

   		foreach ($data as $key => $val) {
				$data[$key]['url'] ="$http./index.php/index/Finance/problem?id=".$data[$key]['issue_id'];
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

    //咨询产品
	  public function good()
    {

			$info= Request::instance()->header();

			$http = $this->http();


    $cityName=$_POST['cityName'];
    $map['city']  = ['like',"%" . $cityName . "%"];
    $map['putaway']  = 1;

	$page=$_POST['page'];



if($page==0 || $page==null){
	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->order('ratio asc')
	->where($map)
	->select();
	}else{

	$f=$page-1;
	$s=$f*8;
	$data = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,ba_bank.bankname,ba_bank.logo')->order('ratio asc')
	->where($map)
	->limit($s,8)
	->select();

	}
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
		
	$data[$key]['url'] ="$http".'/index.php/index/Finance/detailed?id='.$data[$key]['good_id'];

				}

   	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }



	//咨询今日快报
	  public function bulletin()
    {

	$http = $this->http();
$fst=date("Y-m-d",time());//当天的日期
$fsts=strtotime($fst);
$fstd=$fsts+86400;
   	$fff = db('bulletin')->where('addtime','>',$fsts)->where('addtime','<',$fstd)->select();
if($fff){
	$data = db('bulletin')->where('addtime','>',$fsts)->where('addtime','<',$fstd)->order('addtime desc')->find();
}else{
	$data = db('bulletin')->where('addtime','<',$fsts)->order('addtime desc')->find();
}

$weekarray=array("日","一","二","三","四","五","六");
$week= "星期".$weekarray[date("w",$data['addtime'])];
	$s=date("Y-m-d",$data['addtime']);
	$Stime=strtotime($s);

	$day=date("d",$data['addtime']);
	$m=date("m",$data['addtime']);

   		if($m==1){
   			$month='Jan';
   		}
   		elseif($m==2){
   			$month='Feb';
   		}
   		elseif($m==3){
   			$month='Mar';
   		}
   		elseif($m==4){
   			$month='Apr';
   		}
   		elseif($m==5){
   			$month='May';
   		}
   		elseif($m==6){
   			$month='June';
   		}
   		elseif($m==7){
   			$month='July';
   		}
   		elseif($m==8){
   			$month='Aug';
   		}
   		elseif($m==9){
   			$month='Sept';
   		}
   		elseif($m==10){
   			$month='Oct';
   		}
   		elseif($m==11){
   			$month='Nov';
   		}
   		elseif($m==12){
   			$month='Dec';
   		}


   	return json(['state'=>2558,'data'=>['days'=>$day.'/'.$month,'url'=>"$http".'/index.php/index/Finance/dailyExpress?id='.$data['bulletin_id'],'week'=>$week,'newsTitle1'=>$data['title'],'newsTitle2'=>$data['caption']],'mesg'=>'操作完成']);

    }

//新闻
      public function journalism()
    {
			$info= Request::instance()->header();
			$sss=$info['user-agent'];


				$http = $this->http();


			if(strpos($sss,'iPad') !== false ){



				$data = db('journalism')->field('journalism_id,headline,addtime,source,BigAndLittle,webtext,pic as picture ')->where('status',1)->order('addtime desc')->select();

					foreach ($data as $key => $val) {

						// $logarr ["group1"] = $logarr ["group"];
						// unset ( $logarr ["group"] );
						//
						// var_dump($data[$key]['picture']);
						//
						// $data[$key]['picture'] ==  $data[$key]['pic'];

						// unset ( $data[$key]['pic'] );






					$data[$key]['formatTime']=date("Y-m-d H:i",$data[$key]['addtime']);
					$data[$key]['url']="$http".'/index.php/index/Finance/details?id='.$data[$key]['journalism_id'];
						$y=time();
						$s=$data[$key]['addtime'];
						$t=$y-$s;

					if($t<=300){
							$data[$key]['betweenTime']='1分钟前';
					}
					elseif($t>300 && $t<=600){
							$data[$key]['betweenTime']='5分钟前';
					}
					elseif($t>600 && $t<=900){
							$data[$key]['betweenTime']='10分钟前';
					}
					elseif($t>900 && $t<=1800){
							$data[$key]['betweenTime']='15分钟前';
					}
					elseif($t>1800 && $t<=3600){
							$data[$key]['betweenTime']='30分钟前';
					}
					elseif($t>3600 && $t<=7200){
							$data[$key]['betweenTime']='1小时前';
					}
					elseif($t>7200 && $t<=10800){
							$data[$key]['betweenTime']='2小时前';
					}
					elseif($t>10800 && $t<=14400){
							$data[$key]['betweenTime']='3小时前';
					}
					 elseif($t>14400 && $t<=18000){
							$data[$key]['betweenTime']='4小时前';
					}
					elseif($t>18000 && $t<=21600){
							$data[$key]['betweenTime']='5小时前';
					}
					elseif($t>21600 && $t<=43200){
							$data[$key]['betweenTime']='6小时前';
					}
					elseif($t>43200 && $t<=86400){
							$data[$key]['betweenTime']='12小时前';
					}
					elseif($t>86400 && $t<=172800){
							$data[$key]['betweenTime']='1天前';
					}
					elseif($t>172800 && $t<=259200){
							$data[$key]['betweenTime']='2天前';
					}
					elseif($t>259200 && $t<=345600){
							$data[$key]['betweenTime']='3天前';
					}
					elseif($t>345600 && $t<=43200){
							$data[$key]['betweenTime']='4天前';
					}
					elseif($t>43200 && $t<=518400){
							$data[$key]['betweenTime']='5天前';
					}
					elseif($t>518400 && $t<=604800){
							$data[$key]['betweenTime']='6天前';
					}
					elseif($t>604800 && $t<=1296000){
							$data[$key]['betweenTime']='1星期前';
					}
					elseif($t>1296000 && $t<=2592000){
							$data[$key]['betweenTime']='半月前';
					}
					elseif($t>2592000 && $t<=5184000){
							$data[$key]['betweenTime']='一月前';
					}
					elseif($t>5184000 && $t<=7776000){
							$data[$key]['betweenTime']='二月前';
					}
					elseif($t>7776000 && $t<=15811200){
							$data[$key]['betweenTime']='三月前';
					}
					elseif($t>15811200 && $t<=31536000){
							$data[$key]['betweenTime']='半年前';
					}
					elseif($t>31536000){
							$data[$key]['betweenTime']='一年前';
					}


					}


			} else {

				$data = db('journalism')->field('journalism_id,headline,picture,addtime,source,BigAndLittle,webtext')->where('status',1)->order('addtime desc')->select();

				foreach ($data as $key => $val) {


				$data[$key]['formatTime']=date("Y-m-d H:i",$data[$key]['addtime']);
				$data[$key]['url']="$http".'/index.php/index/Finance/details?id='.$data[$key]['journalism_id'];
					$y=time();
					$s=$data[$key]['addtime'];
					$t=$y-$s;

				if($t<=300){
						$data[$key]['betweenTime']='1分钟前';
				}
				elseif($t>300 && $t<=600){
						$data[$key]['betweenTime']='5分钟前';
				}
				elseif($t>600 && $t<=900){
						$data[$key]['betweenTime']='10分钟前';
				}
				elseif($t>900 && $t<=1800){
						$data[$key]['betweenTime']='15分钟前';
				}
				elseif($t>1800 && $t<=3600){
						$data[$key]['betweenTime']='30分钟前';
				}
				elseif($t>3600 && $t<=7200){
						$data[$key]['betweenTime']='1小时前';
				}
				elseif($t>7200 && $t<=10800){
						$data[$key]['betweenTime']='2小时前';
				}
				elseif($t>10800 && $t<=14400){
						$data[$key]['betweenTime']='3小时前';
				}
				 elseif($t>14400 && $t<=18000){
						$data[$key]['betweenTime']='4小时前';
				}
				elseif($t>18000 && $t<=21600){
						$data[$key]['betweenTime']='5小时前';
				}
				elseif($t>21600 && $t<=43200){
						$data[$key]['betweenTime']='6小时前';
				}
				elseif($t>43200 && $t<=86400){
						$data[$key]['betweenTime']='12小时前';
				}
				elseif($t>86400 && $t<=172800){
						$data[$key]['betweenTime']='1天前';
				}
				elseif($t>172800 && $t<=259200){
						$data[$key]['betweenTime']='2天前';
				}
				elseif($t>259200 && $t<=345600){
						$data[$key]['betweenTime']='3天前';
				}
				elseif($t>345600 && $t<=43200){
						$data[$key]['betweenTime']='4天前';
				}
				elseif($t>43200 && $t<=518400){
						$data[$key]['betweenTime']='5天前';
				}
				elseif($t>518400 && $t<=604800){
						$data[$key]['betweenTime']='6天前';
				}
				elseif($t>604800 && $t<=1296000){
						$data[$key]['betweenTime']='1星期前';
				}
				elseif($t>1296000 && $t<=2592000){
						$data[$key]['betweenTime']='半月前';
				}
				elseif($t>2592000 && $t<=5184000){
						$data[$key]['betweenTime']='一月前';
				}
				elseif($t>5184000 && $t<=7776000){
						$data[$key]['betweenTime']='二月前';
				}
				elseif($t>7776000 && $t<=15811200){
						$data[$key]['betweenTime']='三月前';
				}
				elseif($t>15811200 && $t<=31536000){
						$data[$key]['betweenTime']='半年前';
				}
				elseif($t>31536000){
						$data[$key]['betweenTime']='一年前';
				}


				}

			}



   		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);

    }





}
