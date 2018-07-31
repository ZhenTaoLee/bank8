<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

  /**
   * 发送所有通知给用户
   */
  class Allnotice extends Index
  {

    //加载通知模板
    public function show()
    {


      //查询数据加搜索
      $map='';
      $type='';
      $status='';
      if(input('get.type')!='')
      {
            $type = input('get.type');
            $map['type']=['like',"%".$_GET['type']."%"];
      }

      if(input('get.status')!='')
      {
            $status = input('get.status');
            $map['status']=['like',"%".$_GET['status']."%"];
      }

      if(input('get.time1')!='' && input('get.time2')!='')
      {
        $time1 = strtotime(input('get.time1'));
        $time2 = strtotime(input('get.time2'));
        $map['addtime'] = ['between',"$time1,$time2"];
      }

      $query=[
          'type' =>$type,
          'status' =>$status,
          'time1' => input('get.time1'),
          'time2'=>input('get.time2')
        ];

      $list=db('appnotice')
      ->order('addtime desc')
      ->where($map)
      ->paginate(15,false,array(
            'query' => $query
        ));
      // var_dump($list);
      $this->assign('list', $list);

      return $this->fetch();
    }

    //加载推送审核模板
    public function noticeshow()
    {


      //查询数据加搜索
      $map='';
      $type='';
      $status='';
      if(input('get.type')!='')
      {
            $type = input('get.type');
            $map['type']=['like',"%".$_GET['type']."%"];
      }

      if(input('get.status')!='')
      {
            $status = input('get.status');
            $map['status']=['like',"%".$_GET['status']."%"];
      }

      if(input('get.time1')!='' && input('get.time2')!='')
      {
        $time1 = strtotime(input('get.time1'));
        $time2 = strtotime(input('get.time2'));
        $map['addtime'] = ['between',"$time1,$time2"];
      }

      $query=[
          'type' =>$type,
          'status' =>$status,
          'time1' => input('get.time1'),
          'time2'=>input('get.time2')
        ];

      $list=db('appnotice')
      ->order('addtime desc')
      ->where('status',0)
      ->where($map)
      ->paginate(15,false,array(
            'query' => $query
        ));
      // var_dump($list);
      $this->assign('list', $list);

      return $this->fetch();
    }



    //展示添加
    public function add()
    {

      if(request()->isPost()){
      $status=0;//是否热门,1是 0否
      $type=$_POST['type'];//状态
      $notice=$_POST['notice'];//标题
      $addtime = time();//添加时间


      $data = [
      'status' => $status,
      'type' => $type,
      'noticetext' => $notice,
      'addtime' => $addtime
    ];

    $notice = db('appnotice')->insert($data);



    if($notice){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('提交审核成功', 'Allnotice/show');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('提交审核失败');
        }
    }
      return $this->fetch();

    }

    //修改
    public function  update()
    {

      if(request()->isPost()){

      $notice_id=$_POST['notice_id'];
      $status=0;//是否热门,1是 0否
      $type=$_POST['type'];//状态
      $notice=$_POST['notice'];//标题
      $addtime = time();//添加时间


      $data = [
      'type' => $type,
      'noticetext' => $notice
    ];

    $notice = db('appnotice')->where('notice_id',$notice_id)->update($data);



    if($notice){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('修改成功', 'Allnotice/show');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('修改失败');
        }
    }


    //根据id查询数据
    $id = $_GET['id'];
    $lists = db('appnotice')
    ->where('notice_id',$id)
    ->find();

    // var_dump($lists['noticetext']);
    // $list = db('bank')->where('b_id','>',0)->order('rank desc')->select();
    // $this->assign('list', $list);
    $this->assign('lists', $lists);
      return $this->fetch();

    }

    //修改状态
    public function upd()
    {


          // $notice_id=$_POST['notice_id'];
          $id = $_GET['id'];

          $status=3;//'状态,1通过,0审核中,2待发送,3已发送',

          $addtime = time();//添加时间


          $data = [
          'status' => $status
        ];

        $noticed = db('appnotice')->where('notice_id',$id)->update($data);


            if($noticed){
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    // $loge = db('user')->field('user_id,phone,device,type')->select();
                    // $deviceid = $loge['device'];
                    //
                    // var_dump($loge);
                    //推送内容
                      $content = $_POST['content'] ;
                      $push = new Movement;
                      $data['content'] =$content.'【八号钱庄】';
                    //
                      try {
                        //想所有用户进行推送—广播
                        $push->sendNotifyAll($data['content']);
                        // $push->sendNotifySpecial($deviceid, $data['content']);
                      } catch (\JPush\Exceptions\JPushException $e) {
                      // try something else here
                      // print $e;
                    }


                    $this->success('审核成功，发送推送通知', 'Allnotice/show');

                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('审核失败');
              }


      }


    //接收通知的消息
    public function addnotice()
    {
      //接收通知内容
      $content = $_POST['content'];
      $addtime = time();
      $status = 0;//状态
      $city = '全部城市';
      $data = [
      'city' => $city,
      'content' => $content,
      'status' => $status,
      'addtime' => $addtime
      ];

      $conf = db('appnotice')->insert($data);

      if ($conf) {

        return json(['state'=>2558,'data'=>'','mesg'=>'提交审核成功']);
        $this->success('提交审核成功', 'tool/roomToolshow');
      }

    }


    //发送通知
    public function sendNotice()
    {

      $loge = db('user')->select();
      $deviceid = $loge['device'];

      //推送内容
      $content = $_POST['content'] ;
      if(strlen($deviceid) > 8){
        $push = new Movement;
        $data['content'] =$content.'【八号钱庄】';

        try {
          //想所有用户进行推送—广播
          $push->sendNotifyAll($data['content']);
          // $push->sendNotifySpecial($deviceid, $data['content']);
        } catch (\JPush\Exceptions\JPushException $e) {
        // try something else here
        // print $e;
        }


    }

    }



  }


 ?>
