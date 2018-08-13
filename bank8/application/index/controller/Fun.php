<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;


  //展示资讯页，产品页，每日快报
  class Fun extends Index
  {




    //热门产品详情
    public function funDetails()
    {
      
      //产品详情

       $id = $_GET['id'];
      //查询产品表
      $list = db('z_fun')
      ->field('fun_id,headline,picture,reading,wedtext,addtime')
      ->where('fun_id',$id)
      ->find();
      

      $this->assign('list', $list);
    // $this->assign('lists', $lists);


    return $this->fetch();

    


    }






  }
