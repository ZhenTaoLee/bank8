<?php
namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Cache;
use \think\Db;
//推广处理类控制器
class Extension extends Index
{

    //加载页面
    public function extensionshow()
    {
      // echo "";
      return $this->fetch();
    }

    //UC
      public function ucextension()
    {

      return $this->fetch();

    }
    //toutiao
      public function toutiaoextension()
    {

      return $this->fetch();

    }
    //新浪
    public function sinaextension()
  {

    return $this->fetch();

  }
    //推广页发送验证码
    public function code()
    {
      // var_dump($_POST);

        //接收电话号码
        $name=$_POST['uname'];
        // // $profession =$_POST['profession'];
        $city =$_POST['city'];
        $phone=$_POST['uphone'];
        // $tidentity =$_POST['tidentity'];

          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已提交申请']);
        }

        if ( empty($name) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请完善您的信息']);
        }

        if ( empty($city) ) {
          return json(['state'=>30,'data'=>'','mesg'=>'请完善您的信息']);
        }

        $arr=rand(100000,999999);

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
          //$res  = curl_error( $ch );
           // Session::set('code',$arr);//存session
           Cache::set('codes'.$phone,$arr,300);
        if($art['error']==0){
          return json(['state'=>2558,'data'=>$art['error'],'mesg'=>'发送成功']);
        }
        if($art['error']==-40){

          return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'手机号码错误']);
        }
          return json(['state'=>4040,'data'=>$art['error'],'mesg'=>'发送失败']);

    }


    //接收录入数据
    public function addextend()
    {


        $name=$_POST['uname'];//姓名
        $profession ='个人';//类型
        $city =$_POST['city'];//城市
        $phone=$_POST['uphone'];//手机
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['verfifcation'];//验证码
        $identity='';//服务类型
        $source = 'UC';
        $addtime = time();//时间


        //判断姓名不能为空
        if ( empty($name) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断城市不能为空
        if ( empty($city) ) {
          return json(['state'=>41,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断手机不能为空
        if ( empty($phone) ) {
          return json(['state'=>42,'data'=>'','mesg'=>'手机不能为空']);
        }

          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已申请']);
        }

          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>'',
            'name'=>$name,
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

          } else {

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }


    }

    public function downclick()
    {

      $down = $_POST['num'];
      $source = 'UC';
      $addtime = time();//时间

      if($down){

      $num = intval($_POST['num']);

      $anum = $num ++;

      // $dat = db('webclick')->where('id', 2)->find();
      // $adown = $anum+$dat['down'];



      // var_dump($dat);die()
      $data = [
      'source' => $source,
      'down' => $down,
      'addtime'=> $addtime
      ];

      $user = db('webclick')->insert($data);

      // db('webclick')->where('id', 2)->update($data);


      return json(['state'=>0,'data'=>$anum,'mesg'=>'点击次数']);

      }
    }

    //uc
    //接收录入数据
    public function addextends()
    {


        $name=$_POST['uname'];//姓名
        $profession ='个人';//类型
        $city =$_POST['city'];//城市
        $phone=$_POST['uphone'];//手机
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['verfifcation'];//验证码
        $identity='';//服务类型
        $source = 'UC';
        $addtime = time();//时间


        //判断姓名不能为空
        if ( empty($name) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断城市不能为空
        if ( empty($city) ) {
          return json(['state'=>41,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断手机不能为空
        if ( empty($phone) ) {
          return json(['state'=>42,'data'=>'','mesg'=>'手机不能为空']);
        }

          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已申请']);
        }

          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>'',
            'name'=>$name,
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

          } else {

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }


    }
    //uc
    public function downclicks()
    {

      $down = $_POST['num'];
      $source = 'UC';
      $addtime = time();//时间

      if($down){

      $num = intval($_POST['num']);

      $anum = $num ++;

      // $dat = db('webclick')->where('id', 2)->find();
      // $adown = $anum+$dat['down'];



      // var_dump($dat);die()
      $data = [
      'source' => $source,
      'down' => $down,
      'addtime'=> $addtime
      ];

      $user = db('webclick')->insert($data);

      // db('webclick')->where('id', 2)->update($data);


      return json(['state'=>0,'data'=>$anum,'mesg'=>'点击次数']);

      }
    }

    //新浪
    //接收录入数据
    public function sinaaddextend()
    {


        $name=$_POST['uname'];//姓名
        $profession ='个人';//类型
        $city =$_POST['city'];//城市
        $phone=$_POST['uphone'];//手机
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['verfifcation'];//验证码
        $identity='';//服务类型
        $source = '新浪';
        $addtime = time();//时间


        //判断姓名不能为空
        if ( empty($name) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断城市不能为空
        if ( empty($city) ) {
          return json(['state'=>41,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断手机不能为空
        if ( empty($phone) ) {
          return json(['state'=>42,'data'=>'','mesg'=>'手机不能为空']);
        }

          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已申请']);
        }

          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>'',
            'name'=>$name,
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

          } else {

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }


    }
    //新浪
    public function sinadownclick()
    {

      $down = $_POST['num'];
      $source = '新浪';
      $addtime = time();//时间

      if($down){

      $num = intval($_POST['num']);

      $anum = $num ++;

      // $dat = db('webclick')->where('id', 2)->find();
      // $adown = $anum+$dat['down'];



      // var_dump($dat);die()
      $data = [
      'source' => $source,
      'down' => $down,
      'addtime'=> $addtime
      ];

      $user = db('webclick')->insert($data);

      // db('webclick')->where('id', 2)->update($data);


      return json(['state'=>0,'data'=>$anum,'mesg'=>'点击次数']);

      }
    }


    //toutiao
    //接收录入数据
    public function toutiaoaddextends()
    {


        $name=$_POST['uname'];//姓名
        $profession ='个人';//类型
        $city =$_POST['city'];//城市
        $phone=$_POST['uphone'];//手机
        $cod=Cache::get('codes'.$phone);
        $code =$_POST['verfifcation'];//验证码
        $identity='';//服务类型
        $source = '头条';
        $addtime = time();//时间


        //判断姓名不能为空
        if ( empty($name) ) {
          return json(['state'=>40,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断城市不能为空
        if ( empty($city) ) {
          return json(['state'=>41,'data'=>'','mesg'=>'请完善您的信息']);
        }
        //判断手机不能为空
        if ( empty($phone) ) {
          return json(['state'=>42,'data'=>'','mesg'=>'手机不能为空']);
        }

          $loge = db('webapply')->where('phone',$phone)->find();
        if($loge){
          return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已申请']);
        }

          // 判断验证码是否正确
          if ($cod == $code) {
            $data = [
            'identity'=>'',
            'name'=>$name,
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

          } else {

            return json(['state'=>0,'data'=>'','mesg'=>'请输入正确验证码']);

          }


    }
    //toutiao
    public function toutiaodownclicks()
    {

      $down = $_POST['num'];
      $source = '头条';
      $addtime = time();//时间

      if($down){

      $num = intval($_POST['num']);

      $anum = $num ++;

      // $dat = db('webclick')->where('id', 2)->find();
      // $adown = $anum+$dat['down'];



      // var_dump($dat);die()
      $data = [
      'source' => $source,
      'down' => $down,
      'addtime'=> $addtime
      ];

      $click = db('webclick')->insert($data);

      // db('webclick')->where('id', 2)->update($data);


      return json(['state'=>0,'data'=>$anum,'mesg'=>'点击次数']);

      }
    }




}
