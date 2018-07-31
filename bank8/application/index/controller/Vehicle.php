<?php

namespace app\index\controller;
use app\common\model\Car;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;

class Vehicle extends Index
{

    protected  $appkeys = '335fb6977dfecb0df2a6f2a7b360f9d6';



 		//************省份列表************
   		public function province()
	    {

        // $info= Request::instance()->header();
        // $rest = substr($info['tokenid'] , 20 , 5);
        // $id=$rest;

  			//配置您申请的appkey
  			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";

  			//************1.城市列表************
  			$url = "http://v.juhe.cn/usedcar/province";
  			$params = array(
  			      "key" => $appkey,//应用APPKEY(应用详细页查询)
  			      "dtype" => "json",//返回数据的格式,xml或json，默认json

  			);
  			$paramstring = http_build_query($params);

  			$car=model('CarModel');
  			$content=$car->juhecurl($url,$paramstring);

  			$result = json_decode($content,true);
  			if($result){
  			    if($result['error_code']=='0'){
  			    	return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
  			//      print_r($result);
  			    }else{

  			        echo $result['error_code'].":".$result['reason'];
  			    }
  			}else{
  			    echo "请求失败";
  			}

	    }
 		//************城市列表************

 		public function city ()
 		{

 			$provinceId = $_POST["provinceId"];//省份id
 			// $provinceId="1";

      if ($provinceId == "" && $provinceId == 0 && $provinceId == false && $provinceId == null) {

        $data = ['cityID'=>0,'cityName'=>'无','proID'=>0,'pinyin'=>'无','enter'=>'无'];

        return json(['state'=>4040,'data'=>$data,'mesg'=>'请完善信息']);

      }

 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
			$url = "http://v.juhe.cn/usedcar/city";
			$params = array(
			      	"key" => $appkey,//应用APPKEY(应用详细页查询)
			      	"dtype" => "json",//返回数据的格式,xml或json，默认json
			     	"province" => "$provinceId",
			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);
			if($result){
			    if($result['error_code']=='0'){
			    	return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			        // print_r($result);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
				    }
				}else{
				    echo "请求失败";
				}

	 	}


 		//************车品牌列表************
 		public function brand()
 		{



 			// $vehicle =$_POST["vehicle"];//vehicle 车辆类型：1:passenger(乘用车)/2:commercial(商用车)
 			$vehicle ='passenger';

      if ($vehicle == "" && $vehicle == 0 && $vehicle == false && $vehicle == null) {

        $data = ['id'=>0,'big_ppname'=>'无','pin'=>0];

        return json(['state'=>4040,'data'=>$data,'mesg'=>'请完善信息']);

      }
 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
 			$url = "http://v.juhe.cn/usedcar/brand";
			$params = array(
			      "key" => $appkey,//应用APPKEY(应用详细页查询)
			      "dtype" => "json",//返回数据的格式,xml或json，默认json
			      "vehicle" => "$vehicle",
			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);
			if($result){
			    if($result['error_code']=='0'){
			        // print_r($result);
			        return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
			    }
					}else{
					    echo "请求失败";
					}
		 }


 		//************车系列表************
 		public function series()
 		{



 			$brandId =$_POST["brandId"];//车辆品牌id(从“二手车价值评估/品牌列表”接口获取)
 			// $brandId ='2000410';

      if ($brandId == "" && $brandId == 0 && $brandId == false && $brandId == null) {

        $data = ['xlid'=>0,'xlname'=>'无'];

        return json(['state'=>4040,'data'=>$data,'mesg'=>'请完善信息']);

      }

 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
 			$url = "http://v.juhe.cn/usedcar/series";
			$params = array(
			      "key" => $appkey,//应用APPKEY(应用详细页查询)
			      "dtype" => "json",//返回数据的格式,xml或json，默认json
			      "brand" => "$brandId",//品牌标识，可以通过车三百品牌数据接口拿回所有的品牌信息，从而提取品牌标识。
			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);
			if($result){
			    if($result['error_code']=='0'){
			        // print_r($result);
			        return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
			    }
			}else{
			    echo "请求失败";
			}

 		}

		//************车型列表************

 		public function carModels()
 		{

 			$seriesId =$_POST["seriesId"];//车系id(从“二手车价值评估/车系列表”接口获取)
 			// $seriesId = "30000652";

      if ($seriesId == "" && $seriesId == 0 && $seriesId == false && $seriesId == null) {

        $data = ['id'=>0,'cxname'=>'无','pyear'=>0,'price'=>0];

        return json(['state'=>4040,'data'=>$data,'mesg'=>'请完善信息']);

      }

 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
 			$url = "http://v.juhe.cn/usedcar/car";
			$params = array(
			      "key" => $appkey,//应用APPKEY(应用详细页查询)
			      "dtype" => "json",//返回数据的格式,xml或json，默认json
			      "series" => $seriesId,//车系标识，可以通过车三百车系数据接口拿回车系信息，从而提前车系标识。
			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);
			if($result){
			    if($result['error_code']=='0'){
			        return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			        // print_r($result);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
			    }
			}else{
			    echo "请求失败";
			}


 		}

 		//************车年份列表************
 		public function carYear()
 		{


 			$carId =$_POST["carId"];//	车型id(从“二手车价值评估/车型列表”接口获取)
 			// $carId = "30002496";

      if ($carId == "" && $carId == 0 && $carId == false && $carId == null) {

        $data = ['carid'=>0,'cyear'=>0];

        return json(['state'=>4040,'data'=>$data,'mesg'=>'请完善信息']);

      }


 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
 			$url = "http://v.juhe.cn/usedcar/year";
			$params = array(
			      "key" => $appkey,//应用APPKEY(应用详细页查询)
			      "dtype" => "json",//返回数据的格式,xml或json，默认json
			      "car" => $carId,//车年份标识。
			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);
			if($result){
			    if($result['error_code']=='0'){
			        return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			        // print_r($result);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
			    }
			}else{
			    echo "请求失败";
			}


 		}

    //************精确估值************
    // $carstatus = 1;//	车况，较差3，一般2，优秀1
    // $purpose = 1;//	车辆用途: 1自用 2公务商用 3营运
    // $mileage = 20;//车辆的公里数，单位万公里
    // $price = 20;//车辆购买价格(单位万元)
    // $useddate = 2012;//启用年份
    // $city = 1;//城市标识（从“二手车价值评估/城市列表”接口获取)
    // $province = 1;//	省份标识（从“二手车价值评估/省份列表”接口获取)
    // $car = 1086704;//	车型标识（从“二手车价值评估/车型列表”接口获取)
    // $useddateMonth = "1";//默认车辆启用车月份
    public function carAssess ()
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

      //接收数据
 	    $carstatus = $_POST["carstatus"];//	车况，较差3，一般2，优秀1
      $purpose = $_POST["purpose"];//	车辆用途: 1自用 2公务商用 3营运
      $mileage = $_POST["mileage"];//车辆的公里数，单位万公里
      $price = $_POST["price"];//车辆购买价格(单位万元)
      $useddate = $_POST["useddate"];//启用年份
      $city = $_POST["city"];//城市标识（从“二手车价值评估/城市列表”接口获取)
      $province = $_POST["province"];//	省份标识（从“二手车价值评估/省份列表”接口获取)
      $car = $_POST["car"];//	车型标识（从“二手车价值评估/车型列表”接口获取)
      $useddateMonth = "1";//默认车辆启用车月份

      $brand = $_POST["brand"];//汽车品牌
      $series = $_POST["series"];//车系
      $model = $_POST['model'];//车型
      $site = $_POST['site'];//上牌地址



      if ($carstatus == "" && $carstatus == 0 && $carstatus == false && $carstatus == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($purpose == "" && $purpose == 0 && $purpose == false && $purpose == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($mileage == "" && $mileage == 0 && $mileage == false && $mileage == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($price == "" && $price == 0 && $price == false && $price == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($useddate == "" && $useddate == 0 && $useddate == false && $useddate == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($city == "" && $city == 0 && $city == false && $city == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($province == "" && $province == 0 && $province == false && $province == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($car == "" && $car == 0 && $car == false && $car == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($brand == "" && $brand == 0 && $brand == false && $brand == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($series == "" && $series == 0 && $series == false && $series == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($model == "" && $model == 0 && $model == false && $model == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      if ($site == "" && $site == 0 && $site == false && $site == null) {
        return json(['state'=>4040,'data'=>[''],'mesg'=>'请完善信息']);

      }
      //聚合的KEY
 			$appkey = "335fb6977dfecb0df2a6f2a7b360f9d6";
 			$url = "http://v.juhe.cn/usedcar/assess";


			$params = array(
			"key" => $appkey,//应用APPKEY(应用详细页查询)
			"dtype" => "json",//返回数据的格式,xml或json，默认json
			"carstatus" => $carstatus,//车况
            "purpose" => $purpose,//车辆用途
            "mileage" => $mileage,//车辆的公里数
            "price" => $price,//车辆购买价格
            "useddate" => $useddate,//启用年份
            "city" => $city,//城市标识
            "province" => $province,//省份标识
            "car" => $car,//车型
            "useddateMonth" => $useddateMonth,//启用车月份

			);
			$paramstring = http_build_query($params);
			$car=model('CarModel');
			$content = $car->juhecurl($url,$paramstring);
			$result = json_decode($content,true);


			$purchase = $result["result"]["est_price_result"]["0"];
			$bargainprice = $result["result"]["est_price_result"]["1"];
			$sellingprice = $result["result"]["est_price_result"]["2"];

      $res=[
            'condition'=>$carstatus,
            'purpose'=>$purpose,
            'mileage'=>$mileage,
            'price'=>$price,
            'starttime'=>$useddate,//启用年份
            'site'=>$site,//上牌地址
            "series"=>$series,//车系
            "brand" => $brand, //汽车品牌
            "model" => $model,//车型
            'purchase'=>$purchase,
            'bargainprice'=>$bargainprice,
            'sellingprice'=>$sellingprice,
            'addtime'=>time(),
            'user_id'=>$id
          ];

      		$add=db('vehicle')->insert($res);
      // var_dump($result["result"]["est_price_result"]["0"]);
      // var_dump($result["result"]["est_price_result"]["1"]);
      // var_dump($result["result"]["est_price_result"]["2"]);
			if($result){
			    if($result['error_code']=='0'){
			        return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
			        // print_r($result);
			    }else{
			        echo $result['error_code'].":".$result['reason'];
			    }
			}else{
			    echo "请求失败";
			}

    }

 	//汽车评估历史
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

		$data=db('vehicle')->where('user_id',$id)->select();


	  	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作成功']);


    }


}
