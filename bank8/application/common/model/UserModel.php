<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10 0010
 * Time: 11:00
 */
namespace app\common\model;
use app\common\helper\OrdernumHelper;
use think\Model;
use think\Db;
use iapppay\Config;
use iapppay\Base;

class UserModel extends Model{

    // 设置当前模型对应的完整数据表名称
    protected $table = 'user';

//
//  /*
//   *电话号码注册
//   */
//  public function reg($data=array()){
//      //file_put_contents('reg1.txt',$data['openid'].'==='.$data['nickname'].'==='.$data['headimg'].'==='.$data['type']);
//      /*$data['password'] = '1111111111';
//      $data['phone'] = '18620808617';
//      $data['type'] = 'phone';*/
//      $code=session('code');
//      if(!empty($code)){
//          if($data['type']=='phone'){
//              if($data['type1']==1){
//                  //说明是电话注册,先查询电话有没有注册过
//                  $user = UserModel::getByPhone($data['phone']);
//                  if(!empty($user)){
//                      $result['flag']=0;
//                      $result['message']='您的手机号已经注册了！';
//                  }else{
//                      //$user = model('UserModel');
//                      $introducenum=LuckynumHelper::unique_rand();
//                      $user=UserModel::getByIntroducenum($introducenum);
//                      while(!empty($user)){
//                          $introducenum=LuckynumHelper::unique_rand();
//                          $user=UserModel::getByIntroducenum($introducenum);
//                      }
//                      /*$this->phone = $data['phone'];
//                      $this->type = 'phone';
//                      $this->password  = md5($data['password']);
//                      $this->introducenum  = $introducenum;
//                      $this->isUpdate(false)->save();*/
//                      UserModel::create([
//                          'nickname' => $data['phone'],//修复手机注册昵称就为手机
//                          'phone' => $data['phone'],
//                          'type' => 'phone',
//                          'password' => md5($data['password']),
//                          'introducenum' => $introducenum
//                      ]);
//                      $result['flag']=1;
//                      $result['message']='恭喜您注册成功！';
//                  }
//              }elseif($data['type1']==2){
//                  //重置密码
//                  $res=UserModel::where('phone',$data['phone'])->setField('password',md5($data['password']));
//                  /*if($res){
//                      $result['flag']=1;
//                      $result['message']='密码重置成功,请登陆';
//                  }else{
//                      $result['flag']=0;
//                      $result['message']='密码重置失败';
//                  }*/
//                  $result['flag']=1;
//                  $result['message']='密码重置成功,请登陆';
//              }
//          }
//      }else{
//          $result['flag']=0;
//          $result['message']='非法访问';
//      }
//
//      return $result;
//  }
//
//  public function login($data=array()){
//      /*$data['phone']='13512345678';
//      $data['password']='123456';*/
//      if($data['type']=='phone'){
//          $phone=$data['phone'];
//          $password=$data['password'];
//          $user = UserModel::getByPhone($phone);
//          if(empty($user)){
//              $result['flag']=0;
//              $result['message']='该用户手机号尚未注册！';
//          }else{
//              if(md5($password)==$user['password']){
//                  session('uid',$user['uid']);
//                  //更新下最后登陆时间
//                  UserModel::where('uid', $user['uid'])->update(['lasttime' => time()]);
//                  $result['flag']=1;
//                  $result['loginuid']=$user['uid'];
//                  $result['message']='登陆成功!';
//              }else{
//                  $result['flag']=0;
//                  $result['message']='登陆信息有误!';
//              }
//          }
//      }else{
//          $user = UserModel::getByOpenid($data['openid']);
//          if(empty($user)){
//              $introducenum=LuckynumHelper::unique_rand();
//              $introduce=UserModel::getByIntroducenum($introducenum);
//              while(!empty($introduce)){
//                  $introducenum=LuckynumHelper::unique_rand();
//                  $introduce=UserModel::getByIntroducenum($introducenum);
//              }
//              $uid=Db::name('user')->insertGetId([
//                  'openid'  =>  $data['openid'],
//                  'nickname' =>  $data['nickname'],
//                  'headimg' =>  $data['headimg'],
//                  'sex' =>  $data['sex'],
//                  'type' =>  $data['type'],
//                  'introducenum' =>  $introducenum,
//                  'regtime' =>  time()
//              ]);
//
//              // 过滤post数组中的非数据表字段数据
//              //$res=$muser->allowField(true)->save();
//              if($uid){
//                  session('uid',$uid);
//                  $result['flag']=1;
//                  $result['loginuid']=$uid;
//                  $result['message']='登陆成功!';
//              }
//          }else{
//              session('uid',$user['uid']);
//              $result['flag']=1;
//              $result['loginuid']=$user['uid'];
//              $result['message']='登陆成功!';
//          }
//      }
//      return $result;
//  }





//  /*
//   * 查询我的盟友
//   */
//  public function ally($data=array()){
//      $page=isset($data['page'])?$data['page']:0;
//      $uid=session('uid');
//      $arr1=UserModel::where('introduceid',$uid)->field('uid,headimg,nickname,regtime')->limit($page*6,6)->select();
//      if(!empty($arr1)){
//          $result['list']=$arr1;
//          $result['message']='';
//          $result['flag']=1;
//      }else{
//          $result['message']='没有更多数据了!';
//          $result['flag']=0;
//      }
//      return $result;
//  }
//


}