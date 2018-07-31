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
class Policy extends Index
{



    //加载shuju页面
    public function policyshow()
    {

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

      $list=db('policyweb')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


      	//查询数据
		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

    $fh = Db::table('ba_policyweb')->where('source','凤凰网')->count('policyweb_id');
    $sina = Db::table('ba_policyweb')->where('source','新浪')->count('policyweb_id');
    $uc = Db::table('ba_policyweb')->where('source','UC')->count('policyweb_id');
    $toutiao = Db::table('ba_policyweb')->where('source','头条')->count('policyweb_id');


    //日统计
    $fhret = Db::table('ba_policyweb')->where('source','凤凰网')->whereTime('addtime', 'd')->count('policyweb_id');
    $sinaret = Db::table('ba_policyweb')->where('source','新浪')->whereTime('addtime', 'd')->count('policyweb_id');
    $ucret = Db::table('ba_policyweb')->where('source','UC')->whereTime('addtime', 'd')->count('policyweb_id');
    $toutiaoret = Db::table('ba_policyweb')->where('source','头条')->whereTime('addtime', 'd')->count('policyweb_id');

      $this->assign('list', $list);

      $this->assign('fhret', $fhret);
      $this->assign('ucret', $ucret);
      $this->assign('sinaret', $sinaret);
      $this->assign('toutiaoret', $toutiaoret);

      $this->assign('fh', $fh);
      $this->assign('uc', $uc);
      $this->assign('sina', $sina);
      $this->assign('toutiao', $toutiao);


      return $this->fetch();
    }


    //加载点击数据页面
    public function policyshowclick()
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

      $list=db('policywebclick')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


      	//查询数据
  		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

      $fh = Db::table('ba_policywebclick')->where('source','凤凰网')->count('id');
      $sina = Db::table('ba_policywebclick')->where('source','新浪')->count('id');
      $uc = Db::table('ba_policywebclick')->where('source','UC')->count('id');
      $toutiao = Db::table('ba_policywebclick')->where('source','头条')->count('id');
  		 // print_r($result['0']['counts']);
          // $fh=db('webclick')->where('source','凤凰网')->find();
        // $uc=db('webclick')->where('source','UC')->find();
      //日统计
      $fhret = Db::table('ba_policywebclick')->where('source','凤凰网')->whereTime('addtime', 'd')->count('id');
      $sinaret = Db::table('ba_policywebclick')->where('source','新浪')->whereTime('addtime', 'd')->count('id');
      $ucret = Db::table('ba_policywebclick')->where('source','UC')->whereTime('addtime', 'd')->count('id');
      $toutiaoret = Db::table('ba_policywebclick')->where('source','头条')->whereTime('addtime', 'd')->count('id');



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




      	public function delete()
      	{
      	if(Session::has('name')==null){
           	$this->success('请登陆', 'index/login');
          }
      	$qianxian=Session::get('qianxian','think');
      	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
      		$this->success('没有权限', 'index/inde');
      	}

      		if(Session::has('name')==null){
      				 $this->success('请登陆', 'index/login');
      			}


      		$id=$_GET['id'];
      		$delete=db('policyweb')->delete($id);
      		if($delete){

      						$this->success('删除成功', 'Policy/policyshow');
      			 } else {
      						$this->error('删除失败');
      				}

      	}



      public function updremark()
      {
      if(Session::has('name')==null){
          $this->success('请登陆', 'index/login');
        }

          $id=$_POST['id'];
          $remark=$_POST['remark'];



          $upd = db('policyweb')->where('policyweb_id',$id)->update(['remark'=>$remark,'updtime'=>time()]);
        if($upd){
                  //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
    //	            $this->success('修改成功', "good/show");
     echo '<script>alert("更新成功！"); window.location.href=document.referrer; </script>';
              } else {
                  //错误页面的默认跳转页面是返回前一页，通常不需要设置
                  $this->error('修改失败');
              }
      }


      //加载shuju页面
      public function workshow()
      {

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

        $list=db('workweb')
        ->order('addtime desc')
        ->where($map)
        ->paginate(20,false,array(
              'query' => $query
          ));


          //查询数据
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

      $fh = Db::table('ba_workweb')->where('source','凤凰网')->count('workweb_id');
      $sina = Db::table('ba_workweb')->where('source','新浪')->count('workweb_id');
      $uc = Db::table('ba_workweb')->where('source','UC')->count('workweb_id');
      $toutiao = Db::table('ba_workweb')->where('source','头条')->count('workweb_id');


      //日统计
      $fhret = Db::table('ba_workweb')->where('source','凤凰网')->whereTime('addtime', 'd')->count('workweb_id');
      $sinaret = Db::table('ba_workweb')->where('source','新浪')->whereTime('addtime', 'd')->count('workweb_id');
      $ucret = Db::table('ba_workweb')->where('source','UC')->whereTime('addtime', 'd')->count('workweb_id');
      $toutiaoret = Db::table('ba_workweb')->where('source','头条')->whereTime('addtime', 'd')->count('workweb_id');

        $this->assign('list', $list);

        $this->assign('fhret', $fhret);
        $this->assign('ucret', $ucret);
        $this->assign('sinaret', $sinaret);
        $this->assign('toutiaoret', $toutiaoret);

        $this->assign('fh', $fh);
        $this->assign('uc', $uc);
        $this->assign('sina', $sina);
        $this->assign('toutiao', $toutiao);


        return $this->fetch();
      }


      //加载点击数据页面
      // public function policyshowclick()
      // {
      //
      //   //搜索
      //   $map ='';
      //   $source = '';
      //   if(input('get.source')!='')
      //   {
      //         $source = input('get.source');
      //         $map['source']=['like',"%".$_GET['source']."%"];
      //   }
      //
      //
      //   if(input('get.time1')!='' && input('get.time2')!='')
      //   {
      //     $time1 = strtotime(input('get.time1'));
      //     $time2 = strtotime(input('get.time2'));
      //     $map['addtime'] = ['between',"$time1,$time2"];
      //   }
      //
      //   $query=[
      //       'source' =>$source,
      //       'time1' => input('get.time1'),
      //       'time2'=>input('get.time2')
      //     ];
      //
      //   $list=db('policywebclick')
      //   ->order('addtime desc')
      //   ->where($map)
      //   ->paginate(20,false,array(
      //         'query' => $query
      //     ));
      //
      //
      //     //查询数据
      //   // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
      //
      //   $fh = Db::table('ba_policywebclick')->where('source','凤凰网')->count('id');
      //   $sina = Db::table('ba_policywebclick')->where('source','新浪')->count('id');
      //   $uc = Db::table('ba_policywebclick')->where('source','UC')->count('id');
      //   $toutiao = Db::table('ba_policywebclick')->where('source','头条')->count('id');
      //    // print_r($result['0']['counts']);
      //       // $fh=db('webclick')->where('source','凤凰网')->find();
      //     // $uc=db('webclick')->where('source','UC')->find();
      //   //日统计
      //   $fhret = Db::table('ba_policywebclick')->where('source','凤凰网')->whereTime('addtime', 'd')->count('id');
      //   $sinaret = Db::table('ba_policywebclick')->where('source','新浪')->whereTime('addtime', 'd')->count('id');
      //   $ucret = Db::table('ba_policywebclick')->where('source','UC')->whereTime('addtime', 'd')->count('id');
      //   $toutiaoret = Db::table('ba_policywebclick')->where('source','头条')->whereTime('addtime', 'd')->count('id');
      //
      //
      //
      //   // var_dump($result);//0:uc,1:fh,2:sina
      //   $this->assign('list', $list);
      //
      //   $this->assign('fhret', $fhret);
      //   $this->assign('ucret', $ucret);
      //   $this->assign('sinaret', $sinaret);
      //   $this->assign('toutiaoret', $toutiaoret);
      //
      //   $this->assign('lit', $fh);
      //   $this->assign('lis', $uc);
      //   $this->assign('sina', $sina);
      //   $this->assign('toutiao', $toutiao);
      //
      //   // echo "";
      //   return $this->fetch();
      // }
      //



          public function deletes()
          {
          if(Session::has('name')==null){
              $this->success('请登陆', 'index/login');
            }
          $qianxian=Session::get('qianxian','think');
          if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
            $this->success('没有权限', 'index/inde');
          }

            if(Session::has('name')==null){
                 $this->success('请登陆', 'index/login');
              }


            $id=$_GET['id'];
            $delete=db('workweb')->delete($id);
            if($delete){

                    $this->success('删除成功', 'Policy/workshow');
               } else {
                    $this->error('删除失败');
                }

          }



        public function updremarks()
        {
        if(Session::has('name')==null){
            $this->success('请登陆', 'index/login');
          }

            $id=$_POST['id'];
            $remark=$_POST['remark'];



            $upd = db('workweb')->where('workweb_id',$id)->update(['remark'=>$remark,'updtime'=>time()]);
          if($upd){
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
      //	            $this->success('修改成功', "good/show");
       echo '<script>alert("更新成功！"); window.location.href=document.referrer; </script>';
                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('修改失败');
                }
        }


}
