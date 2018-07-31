<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\cache\driver\Redis;
use think\cache\Driver;
use think\Cache;
use think\Request;
use think\Db;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;


//个人中心类
class Usercenter extends Index
{


          //用户实名认证

          public function realName()
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
          		 
//          	 if(request()->isPost()) {



          			$name = $_POST['name'];//姓名
                $dtype = $_POST['dtype'];//实名认证类型
          			$credentials = $_POST['credentials'];//身份证号
          			$ntype = 1;//是否实名认证  0否   1是


      				$appkey = "40db51b4ddef826713b92562fc6f1e8f";

      				//************真实姓名和身份证号码判断是否一致************
      				$url = "http://op.juhe.cn/idcard/query";
      				$params = array(
      				      "idcard" => "$credentials",//身份证号码
      				      "realname" => "$name",//真实姓名
      				      "key" => $appkey,//APPKEY
      				);
      				$paramstring = http_build_query($params);
      				$content = juhecurl($url,$paramstring);
      				$result = json_decode($content,true);
      				if($result){
      				    if($result['error_code']=='0'){
      				        if($result['result']['res'] == '1'){
      				            // echo "身份证号码和真实姓名一致";

      				            $data = [
      				            'name' => $name,
      				            'credentials' => $credentials,
      				            'ntype' => $ntype,
                          'dtype' => $dtype
      				            ];

      							//更新性别信息
      							$bool = db('user')->where('user_id',$id)->update($data);

      							if ($bool) {

      								return json(['state'=>2558 ,'data'=>[''],'mesg'=>'身份证号码和真实姓名一致,认证成功']);
      							}
      						// }

      				        }else{
      				            // echo "身份证号码和真实姓名不一致";
      				            return json(['state'=>4040 ,'data'=>[''],'mesg'=>'身份证号码和真实姓名不一致']);
      				        }
      				        #print_r($result);
      				    }else{

      				        // echo $result['error_code'].":".$result['reason'];

      						return json(['state'=>4040 ,'data'=>[''],'mesg'=>'身份证号码和真实姓名不一致']);

      				    }
      				}else{
      				    // echo "请求失败";
      				    return json(['state'=>4040 ,'data'=>[''],'mesg'=>'请求失败']);
      				}



      		// } else {
      		// 	//无数据
      		// 	return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
      		// }


          }






        //我的钱包
        public function money ( )
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

            $handle = db('handle')->field('money,freeze_money')->where('u_id',$id)->find();

            $money=$handle['money'];
            $freeze_money=$handle['freeze_money'];
            if($money<=20000){
              $tmoney=0;
            }else{
              $money1=$money-20000;
              $tmoney=$money1/10;
            }


            $data=['money'=>$money,'freeze_money'=>$freeze_money,'tmoney'=>$tmoney];
                    return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


        }


}




	 /**
	 * 请求接口返回内容
	 * @param  string $url [请求的URL地址]
	 * @param  string $params [请求的参数]
	 * @param  int $ipost [是否采用POST形式]
	 * @return  string
	 */
	 function juhecurl($url,$params=false,$ispost=0){
	    $httpInfo = array();
	    $ch = curl_init();

	    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
	    curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
	    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    if( $ispost )
	    {
	        curl_setopt( $ch , CURLOPT_POST , true );
	        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
	        curl_setopt( $ch , CURLOPT_URL , $url );
	    }
	    else
	    {
	        if($params){
	            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
	        }else{
	            curl_setopt( $ch , CURLOPT_URL , $url);
	        }
	    }
	    $response = curl_exec( $ch );
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
	    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
	    curl_close( $ch );
	    return $response;
	}
