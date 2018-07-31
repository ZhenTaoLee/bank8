<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
//2.5版本的首页
class Pair extends Index
	{


		//网页地址
		static public function http()
		{
				$http = "http://test2.8haoqianzhuang.com";
				return $http;
		}


 //推荐产品
	  public function good()
    {
    	

    	
	$info= Request::instance()->header();
	$rest = substr($info['tokenid'] , 20 , 5);
	$id=$rest;
	$http = $this->http();
	
    $cityName=$_POST['cityName'];
   $pattern=$_POST['pattern'];//模式1为房产模式，2为车产模式，3为保单模式，4为工薪模式
    $map['city']  = ['like',"%" . $cityName . "%"];
    $map['putaway']  = 1;

//职业 1为上班族，2为生意人
	if(array_key_exists('occupation', $_POST)!== false){
		$occupation=$_POST['occupation'];
	}else{	
		$occupation=0;
	}
		

//socialSecurity	否	string	社保，0为没填，1为有，2无

	if(array_key_exists('socialSecurity', $_POST)!== false){
		$socialSecurity=$_POST['socialSecurity'];
	}else{	
		$socialSecurity=0;
	}
	
//accumulationFund	否	string	公积金，0为没填，1为有，2为无

	if(array_key_exists('accumulationFund', $_POST)!== false){
		$accumulationFund=$_POST['accumulationFund'];
	}else{	
		$accumulationFund=0;
	}
	
//salary	否	string	工资，0没填，1为5000以下，2为5000以上

	if(array_key_exists('salary', $_POST)!== false){
		$salary=$_POST['salary'];
	}else{	
		$salary=0;
	}
//license	否	string	执照，0为没填，1为有，2为无
	if(array_key_exists('license', $_POST)!== false){
		$license=$_POST['license'];
	}else{	
		$license=0;
	}
	
//runningWater	否	string	流水，0没填，1为50万以下，2为50万以上

	if(array_key_exists('runningWater', $_POST)!== false){
		$runningWater=$_POST['runningWater'];
	}else{	
		$runningWater=0;
	}
//ownHouse	否	string	是否拥有房产1是0否

	if(array_key_exists('ownHouse', $_POST)!== false){
		$ownHouse=$_POST['ownHouse'];
	}else{	
		$ownHouse=0;
	}
//ownAutomobile	否	string	拥有汽车1是0否

	if(array_key_exists('ownAutomobile', $_POST)!== false){
		$ownAutomobile=$_POST['ownAutomobile'];
	}else{	
		$ownAutomobile=0;
	}
//ownGuaranteeSlip	否	string	拥有保单1是0否

	if(array_key_exists('ownGuaranteeSlip', $_POST)!== false){
		$ownGuaranteeSlip=$_POST['ownGuaranteeSlip'];
	}else{	
		$ownGuaranteeSlip=0;
	}
//houseType	否	string	房产类型，0为没填，1为商品房，2为其它

	if(array_key_exists('houseType', $_POST)!== false){
		$houseType=$_POST['houseType'];
	}else{	
		$houseType=0;
	}
	
//houseBuy	否	string	房产购置方式，0没填，1全款，2月供
	if(array_key_exists('houseBuy', $_POST)!== false){
		$houseBuy=$_POST['houseBuy'];
	}else{	
		$houseBuy=0;
	}
//propertyValues	否	string	房产价值，0没填，1为80万以下，80万以上

	if(array_key_exists('propertyValues', $_POST)!== false){
		$propertyValues=$_POST['propertyValues'];
	}else{	
		$propertyValues=0;
	}
	
//monthlyPayment	否	string	房产月供额，0为没填，1为5000以下，2为5000以上

	if(array_key_exists('monthlyPayment', $_POST)!== false){
		$monthlyPayment=$_POST['monthlyPayment'];
	}else{	
		$monthlyPayment=0;
	}
//insuranceType	否	string	保单类型,0为没填，1为传统型，2为分红型

	if(array_key_exists('insuranceType', $_POST)!== false){
		$insuranceType=$_POST['insuranceType'];
	}else{	
		$insuranceType=0;
	}
//insurancePaymentMethod	否	string	保单缴费方式，0为没填，1为年缴，2为月缴

	if(array_key_exists('insurancePaymentMethod', $_POST)!== false){
		$insurancePaymentMethod=$_POST['insurancePaymentMethod'];
	}else{	
		$insurancePaymentMethod=0;
	}
//insuranceAgeLimit	否	string	保单缴费年限，0为没填，1为3年以下，2为3年以上

	if(array_key_exists('insuranceAgeLimit', $_POST)!== false){
		$insuranceAgeLimit=$_POST['insuranceAgeLimit'];
		}else{	
			$insuranceAgeLimit=0;
	}
//vehicleBuyType	否	string	汽车购置方式，0为没填，1为全款，2为月供

	if(array_key_exists('vehicleBuyType', $_POST)!== false){
		$vehicleBuyType=$_POST['vehicleBuyType'];
	}else{	
		$vehicleBuyType=0;
	}
//vehiclePrice	否	string	汽车价格

	if(array_key_exists('vehiclePrice', $_POST)!== false){
		$vehiclePrice=$_POST['vehiclePrice'];
	}else{	
		$vehiclePrice=0;
	}
//vehicleAge	否	string	车龄，0为没填，1为8年以下，2为8年以上	

	if(array_key_exists('vehicleAge', $_POST)!== false){
		$vehicleAge=$_POST['vehicleAge'];
	}else{	
		$vehicleAge=0;
	}
		

$user=db('user')->where('user_id',$id)->find();
$name=$user['name'];
$sex=$user['sex'];
$ageBracket=$user['ageBracket'];
$education=$user['education'];
$weilidai=$user['weilidai'];

			
			
		
		if($pattern==1){
			
	if($houseType==0 || $houseBuy==0 ){
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
	}
		$map['ba_goods_pair.houseTypeGood']  = ['like',"%" . $houseType . "%"];//房产类型，0为没填，1为商品房，2为其它
	    $map['ba_goods_pair.houseBuyGood']  = ['like',"%" . $houseBuy . "%"];//房产购置方式，0没填，1全款，2月供
	   if($houseBuy==1){
	   	
	   	
	   	if($propertyValues==0 ){
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
	}
	   		$map['ba_goods_pair.propertyValuesGood']  = ['like',"%" . $propertyValues . "%"];//房产价值，0没填，1为80万以下，80万以上（全款特有）
	   }else{
	   	
	   	if($monthlyPayment==0 ){
		return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
	}
	   	 	$map['ba_goods_pair.monthlyPaymentGood']  = ['like',"%" . $monthlyPayment . "%"];//房产月供额，0为没填，1为5000以下，2为5000以上
	   }
	   
	  
	   
			$data = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where('goodtype',1)
			->where($map)
			->select();
			
			
			$datas = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('rand()')
			->limit(10)
			->where('goodtype',1)
			->where($map)
			->select();
			
			
	
	
		}
		elseif($pattern==2){
			
			if($vehicleBuyType==0 || $vehiclePrice==0 ||$vehicleAge==0){
				return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
			}
	
   	$map['ba_goods_pair.vehicleBuyTypeGood']  = ['like',"%" . $vehicleBuyType . "%"];//汽车购置方式，0为没填，1为全款，2为月供
    $map['ba_goods_pair.minVehiclePriceGood']  = ['<=', $vehiclePrice ];//最低汽车价格
   	$map['ba_goods_pair.vehicleAgeGood']  = ['like',"%" . $vehicleAge . "%"];//车龄，0为没填，1为8年以下，2为8年以上
   
			$data = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where('goodtype',2)
			->where($map)
			->select();
			
			$datas = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('rand()')
			->limit(10)
			->where('goodtype',2)
			->where($map)
			->select();

		}
		elseif($pattern==3){
			
			if($insuranceType==0 || $insurancePaymentMethod==0 ||$insuranceAgeLimit==0){
				return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
			}
	$map['ba_goods_pair.insuranceTypeGood']  = ['like',"%" . $insuranceType . "%"];//保单类型,0为没填，1为传统型，2为分红型
	$map['ba_goods_pair.insurancePaymentMethodGood']  = ['like',"%" . $insurancePaymentMethod . "%"];//保单缴费方式，0为没填，1为年缴，2为月缴
	$map['ba_goods_pair.insuranceAgeLimitGood']  = ['like',"%" . $insuranceAgeLimit . "%"];	//保单缴费年限，0为没填，1为3年以下，2为3年以上

			$data = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where('goodtype',3)
			->where($map)
			->select();
			
			$datas = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('rand()')
			->limit(10)
			->where('goodtype',3)
			->where($map)
			->select();
	
		}
	elseif($pattern==4){
		
	$map['ba_goods_pair.educationGood']  = ['like',"%" . $education . "%"];//学历0为本科以下2为本科以上
	$map['ba_goods_pair.weilidaiGood']  = ['like',"%" . $weilidai . "%"];//微粒贷1有0无
	$map['ba_goods_pair.occupationGood']  = ['like',"%" . $occupation . "%"];//职业1为上班族2为生意人	
	if($occupation==1){//上班族	
		if($socialSecurity==0 || $accumulationFund==0 ||$salary==0){
				return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
			}	
	$map['ba_goods_pair.socialSecurityGood']  = ['like',"%" . $socialSecurity . "%"];//社保，0为没填，1为有，2无
	$map['ba_goods_pair.accumulationFundGood']  = ['like',"%" . $accumulationFund . "%"];//公积金，0为没填，1为有，2为无
	$map['ba_goods_pair.salaryGood']  = ['like',"%" . $salary . "%"];//工资，0没填，1为5000以下，2为5000以上		

			}else{//生意人
				if($license==0 || $runningWater==0 ){
				return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善资料']);
			}		
		$map['ba_goods_pair.licenseGood']  = ['like',"%" . $license . "%"];//执照，0为没填，1为有，2为无
		$map['ba_goods_pair.runningWaterGood']  = ['like',"%" . $runningWater . "%"];//流水，0没填，1为50万以下，2为50万以上
			}
			$data = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('ratio asc')
			->where(function ($query) {
				    $query->where('goodtype',4)
				    ->whereOr('goodtype',5);
			})
			->where($map)
			->select();
			
			$datas = db('good')
			->join('goods_pair','ba_good.good_id = ba_goods_pair.good_id','left')
		   	->join('bank','bankid = ba_bank.b_id','left')
			->field('goodName,ba_good.good_id,goodtype,label,picture,ba_bank.bankname,ba_bank.logo,putaway,popularity,limit,accrual,hot')
			->order('rand()')
			->limit(10)
			->where(function ($query) {
				    $query->where('goodtype',4)
				    ->whereOr('goodtype',5);
			})
			->where($map)
			->select();
			
			
			
		}

	foreach ($data as $key => $val){
		
	$data[$key]['url'] ="$http".'/index.php/index/Homepage/detailed?id='.$data[$key]['good_id'];
	
			}	
	
	foreach ($datas as $key => $val){
		
	$datas[$key]['url'] ="$http".'/index.php/index/Homepage/detailed?id='.$datas[$key]['good_id'];
	
			}	
			
							
	if($cityName=='广州'){
		$phone='02038472070';
   	}elseif($cityName=='杭州'){
   		$phone='057185228020';
   	}elseif($cityName=='珠海'){
   		$phone='07563255250';
   	}elseif($cityName=='深圳'){
   		$phone='13538298700';
   	}else{
   		$phone='057185228020';
   	}
   	
		if($data){		
			$add=[
			'good_id'=>$data[0]['good_id'],
			'city'=>$cityName,
			'name'=>$name,
			'sex'=>$sex,
			'pattern'=>$pattern,
			'ageBracket'=>$ageBracket,
			'ownHouse'=>$ownHouse,
			'ownAutomobile'=>$ownAutomobile,
			'ownGuaranteeSlip'=>$ownGuaranteeSlip,
			'user_id'=>$id,
			'addtime'=>time()
			];
			$addd=db('matching')->insert($add);
			$matching_id = db('matching')->getLastInsID();
			
		$adds=[
			'matching_id'=>$matching_id,
			'ageSection'=>$ageBracket,
			'education'=>$education,
			'weilidai'=>$weilidai,
			'occupation'=>$occupation,
			'socialSecurity'=>$socialSecurity,
			'accumulationFund'=>$accumulationFund,
			'salary'=>$salary,
			'license'=>$license,
			'runningWater'=>$runningWater,
			'houseType'=>$houseType,
			'houseBuy'=>$houseBuy,
			'propertyValues'=>$propertyValues,
			'monthlyPayment'=>$monthlyPayment,
			'insuranceType'=>$insuranceType,
			'insurancePaymentMethod'=>$insurancePaymentMethod,
			'insuranceAgeLimit'=>$insuranceAgeLimit,
			'vehicleBuyType'=>$vehicleBuyType,
			'vehiclePrice'=>$vehiclePrice,
			'vehicleAge'=>$vehicleAge
			];

			$addss=db('matching_pair')->insert($adds);
		
			$datassa=[
			'goodName'=>$data[0]['goodName'],
			'good_id'=>$data[0]['good_id'],
			'goodtype'=>$data[0]['goodtype'],
			'label'=>$data[0]['label'],
			'picture'=>$data[0]['picture'],
			'bankname'=>$data[0]['bankname'],
			'logo'=>$data[0]['logo'],
			'putaway'=>$data[0]['putaway'],
			'popularity'=>$data[0]['popularity'],
			'limit'=>$data[0]['limit'],
			'accrual'=>$data[0]['accrual'],
			'hot'=>$data[0]['hot'],
			'url'=>$data[0]['url']
			];

			return json(['state'=>2558,'data'=>['have'=>1,'phone'=>$phone,'matching_id'=>$matching_id,'datas'=>$datassa,'datast'=>$datas],'mesg'=>'操作完成']);
		}else{
			return json(['state'=>2558,'data'=>['have'=>0,'phone'=>$phone,'matching_id'=>0,'datas'=>$data,'datast'=>$datas],'mesg'=>'操作完成']);
		}

  

    }






}
