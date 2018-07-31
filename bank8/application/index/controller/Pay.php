<?php
namespace app\index\controller;
use app\index\model\Goods;
use app\index\model\OrderGoods;
use think\Controller;
use app\index\Controller\Alipay;
use think\Loader;
use think\cache\driver\Redis;
use think\cache\Driver;
use think\Cache;
use think\Request;
use think\Db;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use app\index\controller\alipay\aop\AopClient;
use app\index\controller\alipay\aop\request\AlipayTradeAppPayRequest;

class Pay extends Index
{

    public function appPay ()
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
    $aop = new AopClient;
    $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
    $aop->appId = "2017112900246195";
    $aop->rsaPrivateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCrnWXsxXq2FyuhJvt3waKiHtribVko7KTUXXC9f1ZZ8f1shiG0Rngh3Tl6uSlm7DqouKyWw23NSiu/nKrKPy9iAzVl9D44Tn7t73kCSFXfo5t+V0S+7cU528W45XsI9nwvGFZSDLEV9GPJGFiQ6Sl19FHGk2HKW61w9AAfRaR6/djTgsbm27TdGCIz/ir1VlxV4pXJU44EJUOvb4RegxxOouHAbh/1VYz4uS4pPMvAwj/d0rdmBoApFmdO+WcHldozigJS5r3MzvZSG3S1WaKhRPS+gVlgXViOaVZVP4pMJ4obrN7k7DgtA2yLMZOoIp8glLstKP5xHttd4kENYXczAgMBAAECggEAIKwVpI8wPoyIvOSMCY+u48iWCXeh+t2av+eOODWO/g7JHaknr4efBWt1rvyjejnNLSQDj6xjMitFyvQLu/dtkO5lcySd1+Bx3+CwnBOjbbFbQCFjMCpaWxqRORNPajRrDhhHDtXlvPVLLhTZf7U0NIWwL+sNOhZcHd4GS+3ZU6TCj621mEbQWPVtsuLi7+VjmUbOQcuM5idOlijXEWk/ReGHhj1LiBDRI/4VJMeiK2Sj3ndvtxp8SeBAhX1gLxvIeYadYhRI270zGryfm4pvCV+osbaw1NDvNZsbqxKEAfZ+TS9596GT/USjANuda0soTbnv2vWh/iXBId9PnbqfSQKBgQDZMRIYVu1PCfehpgBbI7czoiI92sEv+/KPMNCwxaICsB7+ERggGFfvOAwH4f9hv83zHL4jdwzyzDOz/zhmEIvn0GDy8JMbQfwjTFgazxCj0tp9M0DN+/GjBbKtIequ+fkBDsmDE8I8eCYqWR91y/fn8vVv6+xlR6yWBMbwYoxdDQKBgQDKR4U8LRF9poalhWxtNwjGNAphkBypyiXthj6INbXla15VZicfAHVvh7GpH3Cl371uEqcXZnIQwEhwl9W7v6mAXSWYLqY4XMfPOmBODrRKlRM0HW7nR+fnDYS3ERqlbnxqUkNg7HuCD1WxNP37qKfMzmo5Hof7QwRE/IWBReaVPwKBgFVowqDnrjKizMq4qPMuPGEFpUmFuOrRvTUqEScy0N8Vu1pWBpK4f/wGolSHPxKFhsvPxcXUjzb7rmleOCOK5jmm7Dkc+fyCGlEXOJ5yRyzlQh5yBU37ga6GExmaeNuOWalc00nEf2GgLgIBQinkp/yCwpncwP2jDe+AuWrWljQRAoGAXzJXnuFq+OJ1PdLUG3YqF/WH6TCEfNfZD7b9GOeGKmlkZPaFdM6ndgy7bOeSAU6R/QqkPpwFFKMZtHuQqCJkaDfuKHfT3HS1yG4lwrai3PLZrc4oUoqBtjije/B9xNuBjBwY/7VrzuLepl5VJanTBs0iKq2Wu4ZnrPvW7ObzxMsCgYAhgeX/nJ5ZBOtupUPbF8D6ppWuu/lAwVf8mPqGpwgtaRm0sZqXKotFWRpkAUG4UoF4HDiJGcVVUrH8UJIyYRw8AQOG0Sq+vBhUohTMwnqruaxH3r93iwqXRlKqX9OnRWy0QQFDmaf6ExvWfVfrJesjQ22M849CpOhnVJjQbW6peQ==';//请填写开发者私钥去头去尾去回车，一行字符串
    $aop->format = "json";
    $aop->charset = "UTF-8";
    $aop->signType = "RSA2";
    $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhS+uoMrJJsOMToK0U3SAly5viQUFJEhnPq62mtKO9QH57Rk0qO2ms3UF1+6EZ0W1Talw0Bl8lYVimgSiPYXuUO6zY9VuS0Czrv+jImM5KSqnKkxfsXUSI+hrsc47rbng4xbQaBTFQEV24hU6qxH31ufoRwDCFqqTShS60oWYH2GXWv2tl4+W26ZxC2Ti9cnombhbBR3woBzQ1myOV27wx0KhYbBnmag2QcEKWF+gFyFdNp+7TM63EBm3E8AHoW0w7QXibxMqidnwEfOiydk7MVSEkakgWqi3O0jYrLmUPAcOARIE1oKcvVEmSNtswz46wSsYoxRwTkcQpmPrrjuu1QIDAQAB';//请填写支付宝公钥，一行字符串
    //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
    $request = new AlipayTradeAppPayRequest();
    //SDK已经封装掉了公共参数，这里只需要传入业务参数
    //随机单号
    $ti=time();
    $arr=rand(100000,999999);
    $tf=$ti.$arr;
    $gid = $_POST['gid'];
    // $gid = 1;
    //对应的八币
    $data = db('goldcoin')->field('id,money,gold,desc,commodity')->where('id',$gid)->find();
    $money = $data['money'];
    $gold = $data['gold'];
    $desc = $data['desc'];
    $commodity = $data['commodity'];

    // var_dump($data);exit;
    $moneys = 0.01;//金额
    $patte = 1;//微信支付 或者支付宝支付
    $payodd = $tf; //获取订单号(自动生成)

    $bizcontent = "{\"body\":\"$commodity\","
                    . "\"subject\": \"$desc\","
                    . "\"out_trade_no\": \"$payodd\","
                    . "\"timeout_express\": \"30m\","
                    . "\"total_amount\": \"$money\","
                    . "\"product_code\":\"QUICK_MSECURITY_PAY\""
                    . "}";

    $request->setNotifyUrl("http://www.8haoqianzhuang.com");// 商户外网可以访问的异步地址
    $request->setBizContent($bizcontent);
    //这里和普通的接口调用不同，使用的是sdkExecute
    $response = $aop->sdkExecute($request);
    //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
    // echo htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。

    $data = htmlspecialchars($response);

    $datalist = ['key'=>$data];

    return json(['state'=>2558,'data'=>$datalist,'mesg'=>'操作完成']);

    }



    //PHP服务端验证异步通知信息参数示例
    public function notice ()
    {

      $aop = new AopClient;
      //请填写支付宝公钥，一行字符串
      $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhS+uoMrJJsOMToK0U3SAly5viQUFJEhnPq62mtKO9QH57Rk0qO2ms3UF1+6EZ0W1Talw0Bl8lYVimgSiPYXuUO6zY9VuS0Czrv+jImM5KSqnKkxfsXUSI+hrsc47rbng4xbQaBTFQEV24hU6qxH31ufoRwDCFqqTShS60oWYH2GXWv2tl4+W26ZxC2Ti9cnombhbBR3woBzQ1myOV27wx0KhYbBnmag2QcEKWF+gFyFdNp+7TM63EBm3E8AHoW0w7QXibxMqidnwEfOiydk7MVSEkakgWqi3O0jYrLmUPAcOARIE1oKcvVEmSNtswz46wSsYoxRwTkcQpmPrrjuu1QIDAQAB';
      $flag = $aop->rsaCheckV1($_POST, NULL, "RSA2");



    }





    public function pay_order()
    {

        // $info= Request::instance()->header();
        // $rest = substr($info['tokenid'] , 20 , 5);
        // $id=$rest;
        //随机单号
        $ti=time();
        $arr=rand(100000,999999);
        $tf=$ti.$arr;

        // $gid = $_POST['gid'];
       //$data = db('goldcoin')->field('money,gold')->where('user_id',$id)->select();

        $moneys = 0.01;//金额
        $patte = 1;//微信支付 或者支付宝支付
        $payodd = $tf; //获取订单号(自动生成)

//        $res = new OrderGoods();
        //获取订单号
//        $where['id'] = input('post.order_sn');
//        $reoderSn = input('post.order_sn');
        $where['id'] =$payodd;
        $reoderSn = $payodd;
        //查询订单信息
//        $order_info = $res->where($where)->find();
        //获取支付方式
//        $pay_type = input('post.pay_type');//微信支付 或者支付宝支付
        $pay_type = $patte;
        //获取支付金额
        $money = $moneys;
        //判断支付方式
        switch ($pay_type) {
            case '1';//如果支付方式为支付宝支付 case 'ali'

                //更新支付方式为支付宝
                $type['patte'] = '1';
//                $res->where($where)->update($type);
                db('pay')->where('userid',18)->update($type);
                //实例化alipay类
                $ali = new Alipay();

                //异步回调地址
                $url = 'http://www.8haoqianzhuang.com/Callback/aliPayBack';

                $array = $ali->alipay('商品名称', $money,$reoderSn,  $url);

                if ($array) {
                    return $array;
                } else {
                    echo json_encode(array('status' => 0, 'msg' => '对不起请检查相关参数!@'));
                }
                break;
            case 'wx';

                break;
        }
    }









    //尾款支付宝调用
     public function endPay()
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
    $aop = new AopClient;

    $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
    $aop->appId = "2017112900246195";
    $aop->rsaPrivateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCrnWXsxXq2FyuhJvt3waKiHtribVko7KTUXXC9f1ZZ8f1shiG0Rngh3Tl6uSlm7DqouKyWw23NSiu/nKrKPy9iAzVl9D44Tn7t73kCSFXfo5t+V0S+7cU528W45XsI9nwvGFZSDLEV9GPJGFiQ6Sl19FHGk2HKW61w9AAfRaR6/djTgsbm27TdGCIz/ir1VlxV4pXJU44EJUOvb4RegxxOouHAbh/1VYz4uS4pPMvAwj/d0rdmBoApFmdO+WcHldozigJS5r3MzvZSG3S1WaKhRPS+gVlgXViOaVZVP4pMJ4obrN7k7DgtA2yLMZOoIp8glLstKP5xHttd4kENYXczAgMBAAECggEAIKwVpI8wPoyIvOSMCY+u48iWCXeh+t2av+eOODWO/g7JHaknr4efBWt1rvyjejnNLSQDj6xjMitFyvQLu/dtkO5lcySd1+Bx3+CwnBOjbbFbQCFjMCpaWxqRORNPajRrDhhHDtXlvPVLLhTZf7U0NIWwL+sNOhZcHd4GS+3ZU6TCj621mEbQWPVtsuLi7+VjmUbOQcuM5idOlijXEWk/ReGHhj1LiBDRI/4VJMeiK2Sj3ndvtxp8SeBAhX1gLxvIeYadYhRI270zGryfm4pvCV+osbaw1NDvNZsbqxKEAfZ+TS9596GT/USjANuda0soTbnv2vWh/iXBId9PnbqfSQKBgQDZMRIYVu1PCfehpgBbI7czoiI92sEv+/KPMNCwxaICsB7+ERggGFfvOAwH4f9hv83zHL4jdwzyzDOz/zhmEIvn0GDy8JMbQfwjTFgazxCj0tp9M0DN+/GjBbKtIequ+fkBDsmDE8I8eCYqWR91y/fn8vVv6+xlR6yWBMbwYoxdDQKBgQDKR4U8LRF9poalhWxtNwjGNAphkBypyiXthj6INbXla15VZicfAHVvh7GpH3Cl371uEqcXZnIQwEhwl9W7v6mAXSWYLqY4XMfPOmBODrRKlRM0HW7nR+fnDYS3ERqlbnxqUkNg7HuCD1WxNP37qKfMzmo5Hof7QwRE/IWBReaVPwKBgFVowqDnrjKizMq4qPMuPGEFpUmFuOrRvTUqEScy0N8Vu1pWBpK4f/wGolSHPxKFhsvPxcXUjzb7rmleOCOK5jmm7Dkc+fyCGlEXOJ5yRyzlQh5yBU37ga6GExmaeNuOWalc00nEf2GgLgIBQinkp/yCwpncwP2jDe+AuWrWljQRAoGAXzJXnuFq+OJ1PdLUG3YqF/WH6TCEfNfZD7b9GOeGKmlkZPaFdM6ndgy7bOeSAU6R/QqkPpwFFKMZtHuQqCJkaDfuKHfT3HS1yG4lwrai3PLZrc4oUoqBtjije/B9xNuBjBwY/7VrzuLepl5VJanTBs0iKq2Wu4ZnrPvW7ObzxMsCgYAhgeX/nJ5ZBOtupUPbF8D6ppWuu/lAwVf8mPqGpwgtaRm0sZqXKotFWRpkAUG4UoF4HDiJGcVVUrH8UJIyYRw8AQOG0Sq+vBhUohTMwnqruaxH3r93iwqXRlKqX9OnRWy0QQFDmaf6ExvWfVfrJesjQ22M849CpOhnVJjQbW6peQ==';//请填写开发者私钥去头去尾去回车，一行字符串
    $aop->format = "json";
    $aop->charset = "UTF-8";
    $aop->signType = "RSA2";
    $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhS+uoMrJJsOMToK0U3SAly5viQUFJEhnPq62mtKO9QH57Rk0qO2ms3UF1+6EZ0W1Talw0Bl8lYVimgSiPYXuUO6zY9VuS0Czrv+jImM5KSqnKkxfsXUSI+hrsc47rbng4xbQaBTFQEV24hU6qxH31ufoRwDCFqqTShS60oWYH2GXWv2tl4+W26ZxC2Ti9cnombhbBR3woBzQ1myOV27wx0KhYbBnmag2QcEKWF+gFyFdNp+7TM63EBm3E8AHoW0w7QXibxMqidnwEfOiydk7MVSEkakgWqi3O0jYrLmUPAcOARIE1oKcvVEmSNtswz46wSsYoxRwTkcQpmPrrjuu1QIDAQAB';//请填写支付宝公钥，一行字符串
    //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
    $request = new AlipayTradeAppPayRequest();
    //SDK已经封装掉了公共参数，这里只需要传入业务参数
    //随机单号
    $ti=time();
    $arr=rand(100000,999999);
    $tf=$ti.$arr;

$oid=$_POST['order_id'];
$order = db('order')->where('order_id',$oid)->find();
if($order['orderType']=='已完成'){
	return json(['state'=>4040,'data'=>[''],'mesg'=>'此订单已付']);
}
$matching = db('matching')->where('matching_id',$order['matching_id'])->find();
if($matching['city']=='广州' ){
	$money = 899;
}
elseif($matching['city']=='深圳'  ){
	$money = 1499;
}else{
	   return json(['state'=>4040,'data'=>[''],'mesg'=>'操作失败']);
}
    //商品名
    $desc ="服务费";
    //商品描述
    $commodity = "只猪";

    // var_dump($data);exit;
    $moneys = $money;//金额
    $patte = 1;//微信支付 或者支付宝支付
    $payodd = $tf; //获取订单号(自动生成)

    $bizcontent = "{\"body\":\"$commodity\","
                    . "\"subject\": \"$desc\","
                    . "\"out_trade_no\": \"$payodd\","
                    . "\"timeout_express\": \"30m\","
                    . "\"total_amount\": \"$moneys\","
                    . "\"product_code\":\"QUICK_MSECURITY_PAY\""
                    . "}";

    $request->setNotifyUrl("http://www.8haoqianzhuang.com");// 商户外网可以访问的异步地址
    $request->setBizContent($bizcontent);
    //这里和普通的接口调用不同，使用的是sdkExecute
    $response = $aop->sdkExecute($request);
    //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
    // echo htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。

    $data = htmlspecialchars($response);

    $datalist = ['key'=>$data];

    return json(['state'=>2558,'data'=>$datalist,'mesg'=>'操作完成']);

    }























}
