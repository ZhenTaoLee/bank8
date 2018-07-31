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
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;


class Upload {

    //生成token
    public function token()
    {

            $bucket = 'bank8';
            $accessKey = 'ZzQu0_1dTgSOZT5unMqrAxNC8NyvfQFosJowZ8zG';
            $secretKey = 'PsMaLHUhufgFvGTnU_X_s0dcCcZQyny4WI0bz-Ad';
            $auth = new Auth($accessKey, $secretKey);
            // 生成上传 Token
            $upToken = $auth->uploadToken($bucket);
            $ret = array('uptoken' => $upToken);
            //   echo json_encode($ret);
            return json(['state'=>2558,'data'=>$ret,'mesg'=>'操作完成']);

//        }else{
//            return json(['state'=>4040,'data'=>[''],'mesg'=>'获取失败']);
//        }

    }









    /**
     * 图片上传
     * @return String 图片的完整URL
     */
    public function uploads()
    {
        if(request()->isPost()){

            $file = request()->file('pic');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();

            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
//            //获取当前控制器名称
//
//            $controllerName=$this->getContro();

            // 上传到七牛后保存的文件名
            $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
//            require_once APP_APP_VIR . '/../vendor/qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'ZzQu0_1dTgSOZT5unMqrAxNC8NyvfQFosJowZ8zG';
            $secretKey = 'PsMaLHUhufgFvGTnU_X_s0dcCcZQyny4WI0bz-Ad';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = 'bank8';
            $domain = 'https://zykj.8haoqianzhuang.cn/';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if ($err !== null) {
                return ["err"=>1,"msg"=>$err,"data"=>""];
            } else {
                //返回图片的完整URL
                return json(["err"=>0,"msg"=>"上传完成","data"=>($domain . $ret['key'])]);
            }
        }

    }



}
