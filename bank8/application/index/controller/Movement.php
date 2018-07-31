<?php
namespace app\index\controller;
use JPush\Client as JPush;
use think\Controller;

//极光推送类
class Movement extends Index
{
      /**
      * 将数据先转换成json,然后转成array
      */
     public function json_array($result)
     {
        $result_json = json_encode($result);
        return json_decode($result_json,true);
     }

     //极光推送appkey(八号钱庄)
     static public function app_key(){
         //极光账号的app_key
         // $app_key = "be8f86856d94359b093c4ab5";
         $app_key = "459f7e3bbb516249e9b0e454";
         
         return $app_key;
     }

     //极光推送master_secret(八号钱庄)
     static public function master_secret(){
         //极光账号的master_secret
         // $master_secret = "5461f2bfa14fd6ce1468265d";
         $master_secret = "1615bc6e51f39474c8cd179a";
         return $master_secret;
     }
// *******************推送key*******************************
     //极光推送appkey(八号幸福)
     static public function app_keys(){
         //极光账号的app_key
         $app_key = "b873ecaff9bbe23e9ad4f502";
         return $app_key;
     }

     //极光推送master_secret(八号幸福)
     static public function master_secrets(){
         //极光账号的master_secret
         $master_secret = "da9b72400be58726404cdb77";
         return $master_secret;
     }
     

     /**
      * 向所有设备推送消息(广播)
      * @param string $message 需要推送的消息
      */
      public function sendNotifyAll($message)
      {

        require_once APP_VIR. '/../vendor/jpush/autoload.php';
        $app_key = $this->app_key();                //填入你的app_key
        $master_secret = $this->master_secret();    //填入你的master_secret

        $client = new JPush($app_key,$master_secret);
        $result = $client->push()->setPlatform('all')->addAllAudience()->setNotificationAlert($message)->send();
        $apppubsh =$this->json_array($result);
        return $apppubsh;
      }


     /**
      * 向特定设备推送消息  (别名推送)--向特定用户进行推送—单播
      * @param array $deviceid 特定设备的设备标识
      * @param string $message 需要推送的消息
      */
     public function sendNotifySpecial($deviceid,$message)
     {

        require_once APP_VIR. '/../vendor/jpush/autoload.php';
        $app_key = $this->app_key();                //填入你的app_key
        $master_secret = $this->master_secret();    //填入你的master_secret
        $client = new JPush($app_key,$master_secret);
        $result = $client->push()->setPlatform('all')->addAlias($deviceid)->setNotificationAlert($message)->send();
        $apppubsh =$this->json_array($result);
        return $apppubsh;
     }

     /**
      * 向特定标签推送消息  (标签推送)
      * @param array $deviceid 特定用户标识
      * @param string $message 需要推送的消息
      */
     public function sendSpecialTag($tag,$message)
     {

         require_once APP_VIR. '/../vendor/jpush/autoload.php';
         $app_key = $this->app_key();
         $master_secret = $this->master_secret();

         $client = new JPush($app_key, $master_secret);

         $tags = implode(",",$tag);
         $result = $client->push()->setPlatform('all')->addTag($tags)->setNotificationAlert($message)->send();
        $apppubsh =$this->json_array($result);
         return $apppubsh;
     }



     /**
      * 向指定设备推送自定义消息
      * @param string $message 发送消息内容
      * @param array $regid 特定设备的id
      * @param int $did 状态值1
      * @param int $mid 状态值2
      */
     public function sendSpecialMsg($regid,$message,$did,$mid)
     {
       require_once APP_VIR. '/../vendor/jpush/autoload.php';
       $app_key = $this->app_key();                //填入你的app_key
        $master_secret = $this->master_secret();    //填入你的master_secret
        $client = new JPush($app_key,$master_secret);
        $result = $client->push()->setPlatform('all')->addRegistrationId($regid)
           ->addAndroidNotification($message,'',1,array('did'=>$did,'mid'=>$mid))
           ->addIosNotification($message,'','+1',true,'',array('did'=>$did,'mid'=>$mid))->send();
        $apppubsh =$this->json_array($result);
        return $apppubsh;
     }

     /**
      * 得到各类统计数据
      * @param array $msgIds 推送消息返回的msg_id列表
      */
     public function reportNotify($msgIds)
     {
        require_once APP_VIR. '/../vendor/jpush/autoload.php';
        $app_key = $this->app_key();                //填入你的app_key
        $master_secret = $this->master_secret();    //填入你的master_secret
        $client = new JPush($app_key,$master_secret);
        $response = $client->report()->getReceived($msgIds);

        $apppubsh =$this->json_array($result);
        return $apppubsh;
     }




}
