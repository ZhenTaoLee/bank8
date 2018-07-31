<?php
namespace app\index\controller;
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
class Carex extends Index
{



    //加载shuju页面
    public function carshow()
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

      $list=db('carweb')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


      	//查询数据
		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');
		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

    $fh = Db::table('ba_carweb')->where('source','凤凰网')->count('carweb_id');
    $sina = Db::table('ba_carweb')->where('source','新浪')->count('carweb_id');
    $uc = Db::table('ba_carweb')->where('source','UC')->count('carweb_id');
    $toutiao = Db::table('ba_carweb')->where('source','头条')->count('carweb_id');


    //日统计
    $fhret = Db::table('ba_carweb')->where('source','凤凰网')->whereTime('addtime', 'd')->count('carweb_id');
    $sinaret = Db::table('ba_carweb')->where('source','新浪')->whereTime('addtime', 'd')->count('carweb_id');
    $ucret = Db::table('ba_carweb')->where('source','UC')->whereTime('addtime', 'd')->count('carweb_id');
    $toutiaoret = Db::table('ba_carweb')->where('source','头条')->whereTime('addtime', 'd')->count('carweb_id');
    // var_dump($fhret);//0:uc,1:fh,2:sina
    // var_dump($sinaret);//0:uc,1:fh,2:sina
    //   var_dump($ucret);//0:uc,1:fh,2:sina


      // var_dump($result);//0:uc,1:fh,2:sina
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
    public function carshowclick()
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

      $list=db('carwebclick')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


      	//查询数据
  		// $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

      $fh = Db::table('ba_carwebclick')->where('source','凤凰网')->count('id');
      $sina = Db::table('ba_carwebclick')->where('source','新浪')->count('id');
      $uc = Db::table('ba_carwebclick')->where('source','UC')->count('id');
      $toutiao = Db::table('ba_carwebclick')->where('source','头条')->count('id');
  		 // print_r($result['0']['counts']);
          // $fh=db('webclick')->where('source','凤凰网')->find();
        // $uc=db('webclick')->where('source','UC')->find();
      //日统计
      $fhret = Db::table('ba_carwebclick')->where('source','凤凰网')->whereTime('addtime', 'd')->count('id');
      $sinaret = Db::table('ba_carwebclick')->where('source','新浪')->whereTime('addtime', 'd')->count('id');
      $ucret = Db::table('ba_carwebclick')->where('source','UC')->whereTime('addtime', 'd')->count('id');
      $toutiaoret = Db::table('ba_carwebclick')->where('source','头条')->whereTime('addtime', 'd')->count('id');

	   // $uc = $result['0']['counts'];
     // $fh = $result['1']['counts'];
     // $sina = $result['3']['counts'];
     // $toutiao = $result['2']['counts'];

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


    public function workshow()
    {
      // echo 123;
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
    // var_dump($fhret);//0:uc,1:fh,2:sina


      // var_dump($result);//0:uc,1:fh,2:sina
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
    public function workshowclick()
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

      $list=db('workwebclick')
      ->order('addtime desc')
      ->where($map)
      ->paginate(20,false,array(
            'query' => $query
        ));


        //查询数据
      // $result = Db::query('SELECT source, count(1) AS counts FROM ba_webapply GROUP BY source');

      $fh = Db::table('ba_workwebclick')->where('source','凤凰网')->count('id');
      $sina = Db::table('ba_workwebclick')->where('source','新浪')->count('id');
      $uc = Db::table('ba_workwebclick')->where('source','UC')->count('id');
      $toutiao = Db::table('ba_workwebclick')->where('source','头条')->count('id');
       // print_r($result['0']['counts']);
          // $fh=db('webclick')->where('source','凤凰网')->find();
        // $uc=db('webclick')->where('source','UC')->find();
      //日统计
      $fhret = Db::table('ba_workwebclick')->where('source','凤凰网')->whereTime('addtime', 'd')->count('id');
      $sinaret = Db::table('ba_workwebclick')->where('source','新浪')->whereTime('addtime', 'd')->count('id');
      $ucret = Db::table('ba_workwebclick')->where('source','UC')->whereTime('addtime', 'd')->count('id');
      $toutiaoret = Db::table('ba_workwebclick')->where('source','头条')->whereTime('addtime', 'd')->count('id');

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


      return $this->fetch();
    }



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


      return $this->fetch();
    }




}
