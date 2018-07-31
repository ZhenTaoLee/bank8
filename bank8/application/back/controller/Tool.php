<?php

namespace app\back\controller;
use think\Controller;
use think\Loader;
use think\cache\driver\Redis;
use think\cache\Driver;
use think\Cache;
use think\Request;
use think\Db;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use app\common\model\AdvertisingModel;
use think\Session;

/**
 *评估工具展示
 */
class Tool extends Index
{



  //房评估工具
  public function roomToolshow()
  {

  	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }


      //原生查询数据
      // $list = Db::query('SELECT phone,userid,number,ba_house.name,city,building,site,seat,floor,area,ba_house.addtime,price,total
      // FROM ba_house
      // LEFT JOIN ba_user
      // ON ba_house.userid = ba_user.user_id');
	$map='';
		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}

		if(input('get.building')!=''){
			$building = input('get.building');
			$map['building']=['like',"%".$_GET['building']."%"];
		}
		if(input('get.status')!=''){
			$status = input('get.status');
			$map['status']=['like',"%".$_GET['status']."%"];
		}

	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_house.addtime'] = ['between',"$time1,$time2"];
		}

$query=[
			'phone' => input('get.phone'),
			'city' => input('get.city'),
			'building' => input('get.building'),
			'status' => input('get.status'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
			];

    $list = db('house')
    ->join('user','ba_house.user_id = ba_user.user_id','left')
    ->field('phone,ba_house.user_id as uid ,house_id,ba_house.name,city,building,site,seat,floor,area,ba_house.addtime,price,total,status')
     ->where($map)
     ->order('house_id desc')
    ->paginate(20,false,array(
	        'query' => $query
		));

    // $list = db('house')
    // ->join('user','user_id = ba_user.user_id','left')
    // ->field('phone,user_id,number,name,city,building,site,seat,floor,area,addtime,price,total')
    // ->select();
    // var_dump($list);
    $this->assign('list', $list);
    return $this->fetch();
  }


  /**
   *发送短信给用户
   *发送通知给用户
   *房产评估结果
   */
  public function sendmsg()
  {
    //

    // $phone=18316541137;
    // $price=8000000;
    if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('您没有权限', 'index/inde');
	}
    $phone=$_POST["phone"];
    $price=$_POST["price"];

    $pricered = $price*10000;

    $loge = db('user')->where('phone',$phone)->find();
    $deviceid = $loge['device'];
    $userid = $loge['user_id'];

    $dat = db('house')->where('user_id',$userid)->find();
    $priceres =$price*$dat['area'];
    $datstatus = 1;

    // var_dump($userid);
    if($loge){
      // $arr=rand(1000,9999);

     //短信发送
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");//螺丝猫
      curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-1d3905ba2c31fe033fdfddbc94e63757');//秘钥
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的客户您好，根据你输入的房产信息，您的房产初步估值为：'.$pricered.'元，想要查看更多产品信息，请在APP进行产品匹配。【八号钱庄】'));//内容

      $res = curl_exec( $ch );
      curl_close( $ch );
      $art = json_decode($res, true);
      //				$res  = curl_error( $ch );
    // Cache::set('codes',$arr,300);

      $users=db('user')->where('phone',$phone)->find();
      $deviceidss=$users['device'];
      $content="尊敬的客户您好，根据你输入的房产信息，您的房产初步估值为：".$pricered."元，想要查看更多产品信息，请在APP进行产品匹配。【八号钱庄】。";
      if(strlen($deviceidss) > 8){
      $push = new Movement;
      $data['content'] ='【八号钱庄】'. $content;
      try {
            $push->sendNotifySpecial($deviceidss, $data['content']);
       } catch (\JPush\Exceptions\JPushException $e) {
           // try something else here
           // print $e;
       }

      }

      $res = [
      'total' =>$price,
      'price' =>$priceres,
      'status' => $datstatus
    ];

    $data = db('house')->where('user_id',$userid)->update($res);



    if($art['error'] == 0){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('回复成功', 'tool/roomToolshow');
        } else {

            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('回复失败');
        }
        if($art['error']==-40){

          $this->error('手机号码错误，发送失败');
        }


    }

  }


    //车评估
    public function cartool()
    {
    				if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }

	$map='';
		if(input('get.phone')!=''){
			$phone = input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.brand')!=''){
			$brand = input('get.brand');
			$map['brand']=['like',"%".$_GET['brand']."%"];
		}

	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_vehicle.addtime'] = ['between',"$time1,$time2"];
		}

$query=[
			'phone' => input('get.phone'),
			'brand' => input('get.brand'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
			];


      //查询数据
      $list = db('vehicle')
      ->join('user','ba_vehicle.user_id = ba_user.user_id','left')
      ->field('phone,ba_vehicle.user_id as uid ,vehicle_id,brand,series,model,site,starttime,condition,purpose,mileage,price,purchase,bargainprice,sellingprice,ba_vehicle.addtime')
       ->order('vehicle_id desc')
      ->where($map)
       ->paginate(20,false,array(
	        'query' => $query
		));

      // var_dump($list);

      $this->assign('list', $list);
      return $this->fetch();
    }

}





 ?>
