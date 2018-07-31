<?php
namespace app\back\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Cache;
use \think\Db;
use app\index\controller\Movement;
//推广处理类控制器
class Extend extends Index
{

    //加载页面
    public function extend()
    {
      // echo "";
      return $this->fetch();
    }

    //加载shuju页面
    public function show()
    {


        if(Session::has('name')==null){
           $this->success('请登陆', 'index/login');
        }
      $qianxian=Session::get('qianxian','think');
      if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
        $this->success('没有权限', 'index/inde');
      }

      //搜索
      $map ='';
      $city = '';
      if(input('get.city')!='')
      {
            $city = input('get.city');
            $map['city']=['like',"%".$_GET['city']."%"];
      }
      if(input('get.source')!='')
      {
            $city = input('get.source');
            $map['source']=['like',"%".$_GET['source']."%"];
      }

      if(input('get.time1')!='' && input('get.time2')!='')
      {
        $time1 = strtotime(input('get.time1'));
        $time2 = strtotime(input('get.time2'));
        $map['addtime'] = ['between',"$time1,$time2"];
      }

      $query=[
          'city' =>$city,
          'time1' => input('get.time1'),
          'time2'=>input('get.time2')
        ];

      $list=db('webapply')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


        //查询数据
    // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
    // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

    $fh = Db::table('ba_webapply')->where('source','凤凰网')->count('webapply_id');
    $sina = Db::table('ba_webapply')->where('source','新浪')->count('webapply_id');
    $uc = Db::table('ba_webapply')->where('source','UC')->count('webapply_id');
    $toutiao = Db::table('ba_webapply')->where('source','头条')->count('webapply_id');
    // print_r($result['0']['counts']);
    // $fh=db('webclick')->where('source','凤凰网')->find();
    // $uc=db('webclick')->where('source','UC')->find();
    // var_dump($fh);//0:uc,1:fh,2:sina

    //日统计
    $fhret = Db::table('ba_webapply')->where('source','凤凰网')->whereTime('addtime', 'd')->count('webapply_id');
    $sinaret = Db::table('ba_webapply')->where('source','新浪')->whereTime('addtime', 'd')->count('webapply_id');
    $ucret = Db::table('ba_webapply')->where('source','UC')->whereTime('addtime', 'd')->count('webapply_id');
    $toutiaoret = Db::table('ba_webapply')->where('source','头条')->whereTime('addtime', 'd')->count('webapply_id');
    // var_dump($fhret);//0:uc,1:fh,2:sina
    // var_dump($sinaret);//0:uc,1:fh,2:sina
    //   var_dump($ucret);//0:uc,1:fh,2:sina


     // $uc = $result['1']['counts'];
     // // $fh = $result['2']['counts'];
     // $sina = $result['5']['counts'];
     // $toutiao = $result['3']['counts'];

      // var_dump($result);//0:uc,1:fh,2:sina
      $this->assign('list', $list);

      $this->assign('fhret', $fhret);
      $this->assign('ucret', $ucret);
      $this->assign('sinaret', $sinaret);
      $this->assign('toutiaoret', $toutiaoret);

      $this->assign('fh', $fh);
      $this->assign('uc', $uc);
      $this->assign('sina', $sina);
      $this->assign('toutiao', $toutiao);

      // echo "";
      return $this->fetch();
    }


    //加载点击数据页面
    public function showclick()
    {

      //搜索
      $map ='';
      $source = '';
      if(input('get.source')!='')
      {
            $source = input('get.source');
            $map['source']=['like',"%".$_GET['source']."%"];
      }


      if(input('get.time1')!='' && input('get.time2')!='')
      {
        $time1 = strtotime(input('get.time1'));
        $time2 = strtotime(input('get.time2'));
        $map['addtime'] = ['between',"$time1,$time2"];
      }

      $query=[
          'source' =>$source,
          'time1' => input('get.time1'),
          'time2'=>input('get.time2')
        ];

      $list=db('webclick')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


        //查询数据
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webclick GROUP BY source');
      $fh = Db::table('ba_webclick')->where('source','凤凰网')->count('id');
      $sina = Db::table('ba_webclick')->where('source','新浪')->count('id');
      $uc = Db::table('ba_webclick')->where('source','UC')->count('id');
      $toutiao = Db::table('ba_webclick')->where('source','头条')->count('id');
       // print_r($result['0']['counts']);
          // $fh=db('webclick')->where('source','凤凰网')->find();
        // $uc=db('webclick')->where('source','UC')->find();
      //日统计
      $fhret = Db::table('ba_webclick')->where('source','凤凰网')->whereTime('addtime', 'd')->count('id');
      $sinaret = Db::table('ba_webclick')->where('source','新浪')->whereTime('addtime', 'd')->count('id');
      $ucret = Db::table('ba_webclick')->where('source','UC')->whereTime('addtime', 'd')->count('id');
      $toutiaoret = Db::table('ba_webclick')->where('source','头条')->whereTime('addtime', 'd')->count('id');

  

      // var_dump($result);//0:uc,1:fh,2:sina
      $this->assign('list', $list);

      $this->assign('fhret', $fhret);
      $this->assign('ucret', $ucret);
      $this->assign('sinaret', $sinaret);
      $this->assign('toutiaoret', $toutiaoret);

      $this->assign('lit', $fh);
      $this->assign('lis', $uc);
      $this->assign('sina', $sina);
      $this->assign('toutiao', $toutiao);

      // echo "";
      return $this->fetch();
    }



     //官网点击数据页面
    public function downshow()
    {

      //搜索
      $map ='';
      $source = '';
      if(input('get.source')!='')
      {
            $source = input('get.source');
            $map['source']=['like',"%".$_GET['source']."%"];
      }


      if(input('get.time1')!='' && input('get.time2')!='')
      {
        $time1 = strtotime(input('get.time1'));
        $time2 = strtotime(input('get.time2'));
        $map['addtime'] = ['between',"$time1,$time2"];
      }

      $query=[
          'source' =>$source,
          'time1' => input('get.time1'),
          'time2'=>input('get.time2')
        ];

      $list=db('official')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


        //查询数据
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webclick GROUP BY source');
      $fh = Db::table('ba_official')->where('source','iOS')->count('id');
  
   
          // $fh=db('webclick')->where('source','凤凰网')->find();
        // $uc=db('webclick')->where('source','UC')->find();
      //日统计
      $fhret = Db::table('ba_official')->where('source','安卓')->whereTime('addtime', 'd')->count('id');

  

      // var_dump($result);//0:uc,1:fh,2:sina
      $this->assign('list', $list);

      $this->assign('fhret', $fhret);
      $this->assign('lit', $fh);
    

      // echo "";
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
        $source = '凤凰网';
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

        //   $loge = db('webtest')->where('phone',$phone)->find();
        // if($loge){
        //   return json(['state'=>440,'data'=>[''],'mesg'=>'该手机号已快速申请']);
        // }

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
      $source = '凤凰网';
      $addtime = time();//时间

      if($down){

      $num = intval($down);

      $anum = $num ++;

      // $dat = db('webclick')->where('id', 1)->find();
      // $adown = $anum+$dat['down'];
      // var_dump($dat);die()
        $data = [
      'source' => $source,
      'down' => $down,
      'addtime'=> $addtime
      ];

      $user = db('webclick')->insert($data);

      // $user = db('webclick')->where('id', 1)->update($data);

      return json(['state'=>0,'data'=>$anum,'mesg'=>'点击次数']);

      }
    }





}
