<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\ValidateCode;
use think\cache\driver\Redis;
use think\cache\Driver;
use think\Cache;
use think\Db;
use session;
use Carbon\Carbon;
use think\Request;

  /**
   * 产品缓存测试
   */
  class Goodstestredis extends Index
  {

      //查询数据缓存

    public function goodCache($value='')
    {
        $Redis=new Redis();
        $Redis->set("test","test");
        echo  $Redis->get("test");
    }

    //测试
    public function cacheIndex()
    {
    	
    	$info= Request::instance()->header();
    	return json(['state'=>4040,'data'=>$info,'mesg'=>'1111']);
    	
    	
        //先查询缓存中有没有数据
        $value = Cache::get('home-data-hot');
        //进入if中，缓存中没有数据。
        if (!$value) {
        // echo '正在查询数据库<br/>';
        //查询数据库
        	$id=217;
           	$data = db('good')
           	->join('bank','bankid = ba_bank.b_id','left')
        	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
        	->where('good_id',$id)
        	->select();

        var_dump($data);

        // 查询热销商品数据，缓存起来，每10分钟刷新一下
        // Redis::expire('homeHotSale', 60*60*2);
        $expire = Carbon::now()->addMinutes(10);
        // Cache::put('key', 'value', $expiresAt);
        $value = Cache::put('home-data-hot', json_decode($data),  $expire);
        if($value == null) {
             $value = Cache::get('home-data-hot');

            }
        }



    }

  public function res()
    {
    	
    	$url=$_POST['urls'];
			$keyname=$_POST['keyname'];
			$keyvalue=$_POST['keyvalue'];
			
			
$deviceid=$_POST['deviceid'];
$tokenid=$_POST['tokenid'];
$agent=$_POST['agent'];

			$post=array_combine($keyname,$keyvalue);
	
		
//	show_bug($headers);die();
//$headers = array(
//			$headerss
//);

//return json(['state'=>4040,'data'=>$headers,'mesg'=>'1111']);
//  	var_dump($headerkey);die();
    	
//  	$url='http://test2.8haoqianzhuang.com/index.php/index/Handle/good';
//  	
//  	$post=['bank_id'=>'11'];
//  	

//  	$headers= [
//  	'tokenid'=>'QxCTPYmb3y2Ve3nyOkkB62',
//  	'user-agent'=>'Dalvik\/2.1.0 (Linux; U; Android 6.0.1; OPPO R9s Build\/MMB29M)',
//  	'deviceid'=>'20304347b7d5f50344bbe0a5', 	
//  	];


$headers = array(
		'deviceid: '.$deviceid,
    'tokenid: '.$tokenid,
    'user-agent: '.$agent,
);


//  	count($arr);
    	
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
			  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HEADER, true);
				curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				
        $res = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $res; // 返回数据，json格式
        
        
    }




 public function cesji()
    {

          return $this->fetch();
    }



  }














 ?>
