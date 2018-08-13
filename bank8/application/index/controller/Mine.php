<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
//2.5版本的资产管理
class mine extends Index
	{

//
	  public function invitation()
    {
	
		$info= Request::instance()->header();

		if(array_key_exists('tokenid', $info)===false){
    			$invitation='';
  	}else{
  		$rest = substr($info['tokenid'] , 20 , 5);
    	$id=$rest;
//  	$deviceid=$info['deviceid'];							
		if($id==0 || $id==null ){			
		$invitation='';		
	  }else{
	  	$user = db('user')
					->where('user_id',$id)
					->find();	
					$InvitationCode=$user['InvitationCode'];
					if($InvitationCode==''){
						
						$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";		
						mt_srand(10000000*(double)microtime());
					
						for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 4; $i++){
						        $str .= $chars[mt_rand(0, $lc)];  
						}
						$users = db('user')
						->where('InvitationCode',$str)
						->select();
						while($users) {
							$users = db('user')
							->where('InvitationCode',$str)
							->select();
							for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 4; $i++){
								        $str .= $chars[mt_rand(0, $lc)];  
							}
						}
						$invitation=$str;
						$news = db('user')->where('user_id',$id)->update(['InvitationCode'=>$invitation]);
						
					}else{
						$invitation=$InvitationCode;
					}	
	  }
  	
  }
    	

$data=['invitation'=>$invitation,'describe'=>'描述描述描述描述描述描述描述描述描述','picture'=>'https://zykj.8haoqianzhuang.cn/dcc05201807061731598324.jpg','headline'=>'标题标题标题标题','people'=>5,'url'=>'https://www.8haoqianzhuang.com/index.php/index/index/share'];
	return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
	
	
    }
 


}
