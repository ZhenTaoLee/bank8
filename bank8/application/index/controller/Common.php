<?php
namespace app\index\controller;
use app\index\controller\Movement;
use JPush\Client as JPush;
use think\Controller;
use think\Request;


  class Common extends Index
  {

     //极光推送appkey
      static public function app_key(){
          //极光账号的app_key
          $app_key = "459f7e3bbb516249e9b0e454";
          return $app_key;
      }

      //极光推送master_secret
      static public function master_secret(){
          //极光账号的master_secret
          $master_secret = "1615bc6e51f39474c8cd179a";
          return $master_secret;
      }

      //获取alias和tags
      public function getDevices($registrationID)
      {

          require_once APP_VIR. '/../vendor/jpush/autoload.php';
  //      var_dump(APP_VIR. 'jpush/jpush/autoload.php');exit;
          $app_key = $this->app_key();
          $master_secret = $this->master_secret();

          $client = new JPush($app_key, $master_secret);

          $result = $client->device()->getDevices($registrationID);

          return $result;

      }

      //添加tags
      public function addTags($registrationID,$tags){

          require_once APP_VIR. '/../vendor/jpush/autoload.php';

          $app_key = $this->app_key();
          $master_secret = $this->master_secret();

          $client = new JPush($app_key, $master_secret);

          $result = $client->device()->addTags($registrationID,$tags);

          return $result;

      }

      //移除tags
      public function removeTags($registrationID,$tags){

          require_once APP_VIR. '/../vendor/jpush/autoload.php';

          $app_key = $this->app_key();
          $master_secret = $this->master_secret();

          $client = new JPush($app_key, $master_secret);

          $result = $client->device()->removeTags($registrationID,$tags);

          return $result;

      }

      //标签推送
      public function push($tag,$alert){

          require_once APP_VIR. '/../vendor/jpush/autoload.php';

          $app_key = $this->app_key();
          $master_secret = $this->master_secret();

          $client = new JPush($app_key, $master_secret);

          $tags = implode(",",$tag);

          $client->push()
                  ->setPlatform(array('ios', 'android'))
                  ->addTag($tags)                          //标签
                  ->setNotificationAlert($alert)           //内容
                  ->send();

      }

      //别名推送
      public function push_a($alias,$alert)
      {

          require_once APP_VIR. '/../vendor/jpush/autoload.php';

          $app_key = $this->app_key();
          $master_secret = $this->master_secret();

          $client = new JPush($app_key, $master_secret);

          $alias = implode(",",$alias);

          $client->push()
                  ->setPlatform(array('ios', 'android'))
                  ->addAlias($alias)                      //别名
                  ->setNotificationAlert($alert)          //内容
                  ->send();

      }

            /**
             * 向特定设备推送消息  (别名推送)--向特定用户进行推送—单播
             * @param array $deviceid 特定设备的设备标识
             * @param string $message 需要推送的消息
             */
            public function sendNotifySpecial()
            {
              $message = 'This Is A Test';
              $deviceid = array('80AB206AA65D4A858ECF4F29ADAA95E3', '44c405bd7e9b6992741AEDQN2AS9V');
               require_once APP_VIR. '/../vendor/jpush/autoload.php';
               $app_key = $this->app_key();                //填入你的app_key
               $master_secret = $this->master_secret();    //填入你的master_secret
               $client = new JPush($app_key,$master_secret);
               $result = $client->push()->setPlatform('all')->addAlias($deviceid)->setNotificationAlert($message);
               try {
                   $response = $result->send();
                   print_r($response);
               } catch (\JPush\Exceptions\APIConnectionException $e) {
                   // try something here
                   print $e;
                   echo 8888888888888888888888888;
               } catch (\JPush\Exceptions\APIRequestException $e) {
                   // try something here
                   print $e;
                   echo 77777777777777777777777777777777777;
               }

               // $apppubsh =$this->json_array($result);
               // return $apppubsh;
            }

           /**
            * 向所有设备推送消息(广播)
            * @param string $message 需要推送的消息
            */
            public function sendNotifyAll()
            {

              $message = 'This Is A Test';
              require_once APP_VIR. '/../vendor/jpush/autoload.php';
              $app_key = $this->app_key();                //填入你的app_key
              $master_secret = $this->master_secret();    //填入你的master_secret

              $client = new JPush($app_key,$master_secret);
              $result = $client->push()->setPlatform('all')->addAllAudience()->setNotificationAlert($message);
              try {
                  $response = $result->send();
                  print_r($response);
              } catch (\JPush\Exceptions\APIConnectionException $e) {
                  // try something here
                  print $e;
              } catch (\JPush\Exceptions\APIRequestException $e) {
                  // try something here
                  print $e;
              }

              // $apppubsh =$this->json_array($response);
              // return $apppubsh;
            }


      public function  pushNow ( )
      {

          // $info = Request::instance()->header();
          //
          // if ($info) {
          //
          //     $rest = substr($info['tokenid'] , 20 , 5);
          //     $id=$rest;

              // $registrationID = $_POST['deviceid'];
              require_once APP_VIR. '/../vendor/jpush/autoload.php';

              // $client = new JPush($app_key, $master_secret);
              // $registrationID = '20304347b7d5f50344bbe0a5';
              //
              // $devicedata = db('user')->field('user_id ,device')->where('user_id', 19)->find();
              //
              // if ( $registrationID ==  $devicedata['device'] ){
              //     $alias = array(
              //         "20304347b7d5f50344bbe0a5"
              //     );
              //     $alert = "标签推送";
              //     $this->push_a($alias,$alert);
              // }


              //
              //
              // $app_key = $this->app_key();
              // $master_secret = $this->master_secret();
              // $client = new JPush($app_key, $master_secret);
              //
              // $push_payload = $client->push()
              //     ->setPlatform('all')
              //     ->addAllAudience()
              //     ->setNotificationAlert('Hi, 测试数据');
              // try {
              //     $response = $push_payload->send();
              //     print_r($response);
              // } catch (\JPush\Exceptions\APIConnectionException $e) {
              //     // try something here
              //     print $e;
              // } catch (\JPush\Exceptions\APIRequestException $e) {
              //     // try something here
              //     print $e;
              // }

              // $device->getAliasDevices('alias');


              $client = new Push();
              // //向特定用户进行推送—单播
              // //$deviceid可以是一个单个deviceid组成的字符串，也可以是多个deviceid组成的数组
              $deviceid = '20304347b7d5f50344bbe0a55';
              $data['content'] = '推送测试';//是你所需要推送的内容
              // $client->sendNotifySpecial($deviceid, $data['content']);
              //
              //
              try {
                    $client->sendNotifySpecial($deviceid, $data['content']);
              } catch (\JPush\Exceptions\JPushException $e) {
                  // try something else here
                  // print $e;
              }









              // $data['content'] = '推送测试';//是你所需要推送的内容

              //想所有用户进行推送—广播
              // $client->sendNotifyAll($data['content']);








             //  $tag = array(
             //   "manager"
             // );

              //获取统计用户是否获取推送消息的信息(或者有多少用户收到了推送消息)
              //$msgids是你推送消息的消息id
              //$client->reportNotify($msgIds);

              //向特定标签推送
              //$client->sendSpecialTag($tag,$data['content']);





          // } else {
          //
          //     return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
          // }

      }



  }
