<?php
namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Cache;
//网站处理类控制器
class Webcontroller extends Index
{

  //发送验证码
  public function code()
  {
    // var_dump($_POST);

      //接收电话号码
      if(request()->isPost()){


      $name=$_POST['name'];
      $profession =$_POST['profession'];
      $city =$_POST['city'];
      $phone=$_POST['phone'];



	$loge = db('webapply')->where('phone',$phone)->find();
	if($loge){
		return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已快速申请']);
	}

      if ( empty($city) ) {
        return json(['state'=>40,'data'=>'','mesg'=>'请输入城市']);
      }


      $arr=rand(1000,9999);

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
      curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的用户，您的验证码是：'.$arr.'，请在60秒内输入【八号钱庄】'));//内容

      $res = curl_exec( $ch );
      curl_close( $ch );
      $art = json_decode($res, true);
//				$res  = curl_error( $ch );
	       Session::set('code',$arr);//存session
         Cache::set('codes'.$phone,$arr,300);
      if($art['error']==0){
        return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
      }
      if($art['error']==-40){

        return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
      }
        return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);

      }


  }

    //录入数据
    public function add()
    {


        $name=$_POST['name'];
        $profession =$_POST['profession'];
        $city =$_POST['city'];
        $phone=$_POST['phone'];
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['verfifcation'];
        $identity=$_POST['identity'];
        $addtime = time();
        $source = '官网申请';//来源



        	$loge = db('webapply')->where('phone',$phone)->find();
    		if($loge){


    			return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已快速申请']);
    		}

        if ($name == '姓名不能为空！') {

            $names = '游客';
            $citys = '未知城市';

            // 判断验证码是否正确
            if ($cod == $code) {
              $data = [
              'identity'=>$identity,
              'name'=>$names,
              'phone' => $phone,
              'city' => $citys,
              'source' => $source,
              'profession' => $profession,
              'addtime' => $addtime
              ];

              $user = db('webapply')->insert($data);

              if ($user) {



                    		$content='官网有申请';
                    	  	if($city=='其它城市'){
                    	  	$users=db('user')->where('phone','13710595176')->find();
                				$deviceidss=$users['device'];
                		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
                		}

                    	  	}elseif($city=='杭州'){
                    	  	$users=db('user')->where('phone','18928869987')->find();
                				$deviceidss=$users['device'];
                		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
                		}

                		$userst=db('user')->where('phone','13710595176')->find();
                				$deviceidsst=$userst['device'];
                		if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	$push->sendNotifySpecial($deviceidsst, $data['content']);
                		}

                    	  	}elseif($city=='深圳'){
                    	  	$users=db('user')->where('phone','15019295360')->find();
                				$deviceidss=$users['device'];
                		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
                		}

                    	  	}elseif($city=='广州'){
                    	  	$users=db('user')->where('phone','13829742636')->find();
                				$deviceidss=$users['device'];
                		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
                		}

                			$userst=db('user')->where('phone','15920965523')->find();
                				$deviceidsst=$userst['device'];
                		if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	$push->sendNotifySpecial($deviceidsst, $data['content']);
                		}


                    	  	}elseif($city=='珠海'){
                    	  	$users=db('user')->where('phone','18702027845')->find();
                				$deviceidss=$users['device'];
                		if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                					$push = new Movement;
                					$data['content'] ='【八号钱庄】'. $content;
                		         	try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
                		}

                    	  	}







                return json(['state'=>1,'data'=>'','mesg'=>'快速申请完成']);

              }
            }else{

              return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

            }

        } else {
          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>$identity,
            'name'=>$name,
            'phone' => $phone,
            'city' => $city,
            'source' => $source,
            'profession' => $profession,
            'addtime' => $addtime
            ];

            $user = db('webapply')->insert($data);

            if ($user) {

              return json(['state'=>1,'data'=>'','mesg'=>'快速申请完成']);

            }
          }else{

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }
        }


    }



    //房产工具
    public function housecount()
    {

      $unitPrice=$_POST['unitPrice'];//单价
      $area=$_POST['area'];//面积
      $plies=$_POST['plies'];//成数
      $year=$_POST['year'];//年数
      $interestRate=$_POST['interestRate'];//利率




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


       return json(['state'=>58,'data'=>$data,'mesg'=>'计算成功']);
    }


    //车辆计算
    public function carcount()
    {

      $kilometre=$_POST["kilometre"];//公里数
      $price=$_POST["price"];//价格
      $carage=$_POST["carage"];//车龄


      if (empty($kilometre)) {
        return json(['state'=>40,'data'=>[''],'mesg'=>'公里数不能为空，二手车估值失败 ']);
      }

      if (empty($price)) {
        return json(['state'=>40,'data'=>[''],'mesg'=>'价格不能为空，二手车估值失败']);
      }

      if ($kilometre <= 0) {
        return json(['state'=>404,'data'=>[''],'mesg'=>'二手车估值失败']);
      }

      //判断公里数
      switch ( $kilometre ) {

            case $kilometre>=0 && $kilometre<=60000:
            $int = 5;
            break;

            case $kilometre>=60000 && $kilometre<=120000:
            $int = 9;
            break;

            case $kilometre>=120000 && $kilometre<=180000:
            $int = 12;
            break;

            case $kilometre>=180000 && $kilometre<=240000:
            $int = 14;
            break;

            case $kilometre>=240000:
            $int = 15;
            break;

            default:
             $int = 1;

       }

       $ints = $int/15;
       $dat = 1 - $ints;
       $cartotal = ceil($price * $dat);//二手车估价



      if($cartotal >0){
          return json(['state'=>8,'data'=>['cartotal'=>$cartotal,'dat'=>$dat,'ints'=>$ints],'mesg'=>'二手车估值成功']);
        }
      if($cartotal <= 0){
          return json(['state'=>80,'data'=>['cartotal'=>$cartotal,'dat'=>$dat,'ints'=>$ints],'mesg'=>'亲，您的爱车在你心里是无价的']);
        }

     return json(['state'=>404,'data'=>['cartotal'=>$cartotal,'dat'=>$dat,'ints'=>$ints],'mesg'=>'计算失败']);



    }


    //个税计算器
    public function count()
    {

      $types="工资税前"; //收入类型
      $salary=$_POST["salary"];//税前工资
      $insurance=$_POST["insurance"];//社保
      $threshold=$_POST["threshold"];//起征点


      if ($insurance>=$salary) {
        return json(['state'=>2558,'data'=>['taxableIncome'=>0,'taxRate'=>"0",'deduction'=>0,'taxation'=>0,'wage'=>0],'mesg'=>'您无需缴纳个人所得税']);
      }

      $gsdata =$salary -$insurance;
      if ($gsdata <= 300 && $gsdata < 0) {
        return json(['state'=>2558,'data'=>['taxableIncome'=>0,'taxRate'=>"0",'deduction'=>0,'taxation'=>0,'wage'=>0],'mesg'=>'您无需缴纳个人所得税']);
      }


      $res = $salary - $insurance;//应发工资－四金
      $taxableIncome = $res - $threshold;//应纳税所得额

      switch ( $taxableIncome ) {

          case $taxableIncome>=0 && $taxableIncome<=1500:
             $taxRate = "3";//适用税率
             $taxint = 0.03;
             $deduction = 0;//速算扣除数
             break;

          case $taxableIncome>=1500 && $taxableIncome<=4500:
            $taxRate = "10";//适用税率
             $taxint = 0.1;
            $deduction = 105;//速算扣除数
            break;

          case $taxableIncome>=4500 && $taxableIncome<=9000:
            $taxRate = "20";//适用税率
             $taxint = 0.2;
            $deduction = 555;//速算扣除数
            break;

          case $taxableIncome>=9000 && $taxableIncome<=35000:
            $taxRate = "25";//适用税率
             $taxint = 0.25;
            $deduction = 1005;//速算扣除数
            break;

          case $taxableIncome>=35000 && $taxableIncome<=55000:
            $taxRate = "30";//适用税率
             $taxint = 0.3;
            $deduction = 2755;//速算扣除数
            break;

          case $taxableIncome>=55000 && $taxableIncome<=80000:
            $taxRate = "35";//适用税率
             $taxint = 0.35;
            $deduction = 5505;//速算扣除数
            break;

          case $taxableIncome>=80000:
            $taxRate = "45";//适用税率
             $taxint = 0.45;
            $deduction = 13505;//速算扣除数
            break;

          default:
          $taxRate = 0;//适用税率
           $taxint = 0;
          $deduction = 0;//速算扣除数
       }

       $data = $taxableIncome * $taxint;
       $taxation = $data - $deduction;//应纳税款
       $wage = $salary - $insurance - $taxation;//实发工资

      // $taxRate=1;//适用税率
      // $deduction=1;//速算扣除数


      if($salary){
          return json(['state'=>2558,'data'=>['taxableIncome'=>$taxableIncome,'taxRate'=>$taxRate,'deduction'=>$deduction,'taxation'=>$taxation,'wage'=>$wage],'mesg'=>'计算成功']);
        }else {
         return json(['state'=>4040,'data'=>[''],'mesg'=>'计算失败']);
        }


    }





    //弹窗页发送验证码
    public function coded()
    {
      // var_dump($_POST);

        //接收电话号码
        $tname=$_POST['tname'];
        // // $profession =$_POST['profession'];
        // $city =$_POST['tcity'];
        $phone=$_POST['yphone'];
        // $tidentity =$_POST['tidentity'];




      // $loge = db('webapply')->where('phone',$phone)->find();
      // if($loge){
      //   return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已快速申请']);
      // }

        if ( empty($tname) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请输入您的称呼']);
        }


        $arr=rand(1000,9999);

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => '尊敬的用户，您的验证码是：'.$arr.'，请在60秒内输入【八号钱庄】'));//内容

        $res = curl_exec( $ch );
        curl_close( $ch );
        $art = json_decode($res, true);
  //				$res  = curl_error( $ch );
           Session::set('code',$arr);//存session
           Cache::set('codes'.$phone,$arr,300);
        if($art['error']==0){
          return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
        }
        if($art['error']==-40){

          return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
        }
          return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);

    }


    //录入数据
    public function tadd()
    {


        $name=$_POST['tname'];
        $profession ='个人';
        $city =$_POST['tcity'];
        $phone =$_POST['yphone'];
        $source = '官网申请';
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['tverfifcation'];
        $identity=$_POST['tidentity'];
        $addtime = time();
        $addname = $name.$identity;



          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已快速申请']);
        }

          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>'',
            'name'=>$addname,
            'phone' => $phone,
            'city' => $city,
            'source' => $source,
            'profession' => $profession,
            'addtime' => $addtime
            ];

            $user = db('webapply')->insert($data);

            if ($user) {


              $content='官网有申请';
                if($city=='其它城市'){
                $users=db('user')->where('phone','13710595176')->find();
              $deviceidss=$users['device'];
          if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
          }

                }elseif($city=='杭州'){
                $users=db('user')->where('phone','18928869987')->find();
              $deviceidss=$users['device'];
          if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
          }

          $userst=db('user')->where('phone','13710595176')->find();
              $deviceidsst=$userst['device'];
          if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    $push->sendNotifySpecial($deviceidsst, $data['content']);
          }

                }elseif($city=='深圳'){
                $users=db('user')->where('phone','15019295360')->find();
              $deviceidss=$users['device'];
          if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
          }

                }elseif($city=='广州'){
                $users=db('user')->where('phone','13829742636')->find();
              $deviceidss=$users['device'];
          if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
          }

            $userst=db('user')->where('phone','15920965523')->find();
              $deviceidsst=$userst['device'];
          if(strlen($deviceidsst) > 8 && strlen($deviceidsst) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    $push->sendNotifySpecial($deviceidsst, $data['content']);
          }


                }elseif($city=='珠海'){
                $users=db('user')->where('phone','18702027845')->find();
              $deviceidss=$users['device'];
          if(strlen($deviceidss) > 8 && strlen($deviceidss) < 32){
                $push = new Movement;
                $data['content'] ='【八号钱庄】'. $content;
                    try {
        $push->sendNotifySpecial($deviceidss, $data['content']);
   } catch (\JPush\Exceptions\JPushException $e) {
       // try something else here
       // print $e;
   }
          }

                }


              return json(['state'=>1,'data'=>'','mesg'=>'提交完成']);

            }
          }else{

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }



    }

















}
