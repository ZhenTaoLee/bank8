<?php
namespace app\index\controller;
use app\common\model\UserModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;

class Index extends Controller
{
    // public function index()
    // {
    //    	return $this->fetch();
    // }


	//iOSpeizhi
	  public function ios()
    {

    	$version=$_POST['version'];
    	
    	$ios = db('i_configuration')->where('id',1)->find();
    	$iosversion=$ios['iosversion'];
    	$iosurl=$ios['iosurl'];
    	$iosdescribe=$ios['iosdescribe'];
    	$iosrapeversion=$ios['iosrapeversion'];

    	$aaa = explode(".", $version);
    	$bbb = explode(".", $iosversion);
		$ccc = explode(".", $iosrapeversion);
    	if($aaa[0]==$bbb[0]){
    		if($aaa[1]==$bbb[1]){
    			if($aaa[2]==$bbb[2]){
    				$fff=0;
		    	}elseif($aaa[2]>$bbb[2]){
		    		$fff=1;
		    	}elseif($aaa[2]<$bbb[2]){
		    		$fff=2;
		    	}
	    	}elseif($aaa[1]>$bbb[1]){
	    		$fff=1;
	    	}elseif($aaa[1]<$bbb[1]){
	    		$fff=2;
	    	}
    	}elseif($aaa[0]>$bbb[0]){
    		$fff=1;
    	}elseif($aaa[0]<$bbb[0]){
    		$fff=2;
    	}
    	
    	
if($aaa[0]==$ccc[0]){
    		if($aaa[1]==$ccc[1]){
    			if($aaa[2]==$ccc[2]){
    				$ansrape=0;
		    	}elseif($aaa[2]>$ccc[2]){
		    		$ansrape=0;
		    	}elseif($aaa[2]<$ccc[2]){
		    		$ansrape=1;
		    	}
	    	}elseif($aaa[1]>$ccc[1]){
	    		$ansrape=0;
	    	}elseif($aaa[1]<$ccc[1]){
	    		$ansrape=1;
	    	}
    	}elseif($aaa[0]>$ccc[0]){
    		$ansrape=0;
    	}elseif($aaa[0]<$ccc[0]){
    		$ansrape=1;
    	}
    	
    	
    	if($fff==0){
    		
    			$data=['iosversion'=>$iosversion,'displayBug'=>1,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		

    	}elseif($fff==1){
    		
    		$data=['iosversion'=>$iosversion,'displayBug'=>0,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		

    	}elseif($fff==2){
    		
    		$data=['iosversion'=>$iosversion,'displayBug'=>1,'isUpdate'=>$ansrape,'isForceUpdate'=>1,'downloadUrl'=>$iosurl,'notes'=>$iosdescribe];
    		
    	}

		 return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);


    }


	//安卓配置
	  public function android()
    {

    	$version=$_POST['version'];

    	$android = db('a_configuration')->where('id',1)->find();
    	$anversion=$android['anversion'];
    	$ansrapeersion=$android['ansrapeersion'];
    	$anurl=$android['anurl'];
    	$andescribe=$android['andescribe'];

    	$aaa = explode(".", $version);
    	$bbb = explode(".", $anversion);
		$ccc = explode(".", $ansrapeersion);
		
    	if($aaa[0]==$bbb[0]){
    		if($aaa[1]==$bbb[1]){
    			if($aaa[2]==$bbb[2]){
    				$fff=0;
		    	}elseif($aaa[2]>$bbb[2]){
		    		$fff=1;
		    	}elseif($aaa[2]<$bbb[2]){
		    		$fff=2;
		    	}
	    	}elseif($aaa[1]>$bbb[1]){
	    		$fff=1;
	    	}elseif($aaa[1]<$bbb[1]){
	    		$fff=2;
	    	}
    	}elseif($aaa[0]>$bbb[0]){
    		$fff=1;
    	}elseif($aaa[0]<$bbb[0]){
    		$fff=2;
    	}
    	
    	
    	if($aaa[0]==$ccc[0]){
    		if($aaa[1]==$ccc[1]){
    			if($aaa[2]==$ccc[2]){
    				$ansrape=0;
		    	}elseif($aaa[2]>$ccc[2]){
		    		$ansrape=0;
		    	}elseif($aaa[2]<$ccc[2]){
		    		$ansrape=1;
		    	}
	    	}elseif($aaa[1]>$ccc[1]){
	    		$ansrape=0;
	    	}elseif($aaa[1]<$ccc[1]){
	    		$ansrape=1;
	    	}
    	}elseif($aaa[0]>$ccc[0]){
    		$ansrape=0;
    	}elseif($aaa[0]<$ccc[0]){
    		$ansrape=1;
    	}
    	if($fff==0){  
    				
    			$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    			
    	}elseif($fff==1){  	
    			
    		$data=['anversion'=>$anversion,'displayBug'=>1,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    		
    	}elseif($fff==2){
    		
    		$data=['anversion'=>$anversion,'displayBug'=>0,'isUpdate'=>0,'isForceUpdate'=>$ansrape,'downloadUrl'=>$anurl,'notes'=>$andescribe];
    
    	}

 		return json(['state'=>2558,'data'=>$data,'mesg'=>'操作完成']);
    }



  //首页
  public function index()
  {

    $res=db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(5);
    $list=db('journalism')->field('journalism_id,picture,headline,webtext,addtime')->where('state',1)->order('addtime desc')->find();
    // var_dump($list["webtest"]);
    $this->assign('list', $list);

    $this->assign('res', $res);


      return $this->fetch();
  }

  //关于我们
  public function aboutus()
  {



    return $this->fetch();

  }

  //问题详情
  public function commonproblem()
  {

    $id = $_GET['id'];
    $list = db('issue')->where('issue_id',$id)->find();
    // $list=db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(5);
    $lis = db('issue')->field('issue_id,headline,addtime')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lis', $lis);
    $this->assign('list', $list);

    return $this->fetch();

  }

  //下载
  public function download()
  {

		//下载地址
		$list = db('configuration')->where('id',1)->find();

		$this->assign('list', $list);

		return $this->fetch();

    return $this->fetch();

  }

  //下载
  public function downloadprocess()
  {

    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    return $this->fetch();

  }


  //资讯页
  public function journalism()
  {

    $list = db('journalism')->field('journalism_id,picture,headline,webtext,addtime,showtime,BigAndLittle')->where('status',1)->where('BigAndLittle',1)->order('addtime desc')->paginate(6);



    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('list', $list);
    $this->assign('lit', $lit);

    return $this->fetch();

  }

  //工具也
  public function mortgagecalculator()
  {

    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    return $this->fetch();

  }

  //新闻详情页
  public function newsdetail()
  {

    $id = $_GET['id'];
    $ida = $id -1;

    $list = db('journalism')->field('journalism_id,picture,headline,webtext,addtime,showtime')->where('journalism_id',$id)->find();
    $data = db('journalism')->field('journalism_id,picture,headline,webtext,addtime,showtime')->where('journalism_id',$ida)->find();

    //相关阅读
    $lists = db('journalism')->field('journalism_id,picture,headline,webtext,addtime,showtime')->where('state',1)->order('addtime desc')->paginate(6);


    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('list', $list);
    $this->assign('data', $data);
    $this->assign('lit', $lit);
    $this->assign('lists', $lists);


    return $this->fetch();

  }


  //隐私协议
  public function privacy()
  {





    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    return $this->fetch();

  }

  //更多问题页
  public function problemlist()
  {


    //常见问题
    $lis = db('issue')->field('issue_id,headline,webtest,addtime')->where('state',1)->order('addtime desc')->paginate(6);


    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    $this->assign('lis', $lis);


    return $this->fetch();

  }

  //产品页
  public function product()
  {

$map='';
if(input('get.goodtype')!=''){
			$goodtype= input('get.goodtype');
			$map['goodtype']=['like',"%".$_GET['goodtype']."%"];
		}
			$query=[
			'goodtype' =>  input('get.goodtype')

	];

  	$list = db('good')
   	->join('bank','bankid = ba_bank.b_id','left')
	->field('goodName,good_id,goodtype,label,agelimit,accrual,limit,condition,datum,notice,ba_bank.bankname,ba_bank.logo')
	->order('ratio asc')
	->where($map)
	->paginate(8,false,array(
	        'query' => $query
		));

$this->assign('list', $list);


    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    return $this->fetch();

  }

  //
  public function serviceagreement()
  {









    //常见问题
    $lit = db('issue')->field('issue_id,headline')->where('state',1)->order('addtime desc')->paginate(6);

    $this->assign('lit', $lit);

    return $this->fetch();

  }



  public function share()
  {



    return $this->fetch();

  }















}
