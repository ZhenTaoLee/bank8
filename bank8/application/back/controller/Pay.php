<?php
namespace app\back\controller;
use think\Controller;
use think\Session;


/**
* Qa问题
*/
class Pay extends Index
{




	public function withdraw()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='财务经理' ){
		$this->success('没有权限', 'index/inde');
	}

$map='';
		if(input('get.baname')!=''){
			$baname= input('get.baname');
			$map['baname']=['like',"%".$_GET['baname']."%"];
		}
		if(input('get.type')!=''){
			$type= input('get.type');
			$map['type']=['like',"%".$_GET['type']."%"];
		}
		
	
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_withdraw.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'type' => input('get.type'),
			'baname' => input('get.baname'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
	
	
		$list=db('withdraw')
		->join('handle','handleid = ba_handle.han_id','left')
		->join('bank','ba_handle.han_id = ba_bank.b_id','left')
		->field('ba_handle.baname,ba_bank.bankname,withdraw_id,deposit,type,ba_withdraw.addtime,ba_withdraw.type')
		->order('withdraw_id desc')
		->where($map)
		->paginate(20,false,array(
	        'query' => $query
		));
		// var_dump($list);
		$this->assign('list', $list);
				// 渲染模板输出
		return $this->fetch();
	}

	public function pay()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='财务经理' ){
		$this->success('没有权限', 'index/inde');
	}
		$map='';
		if(input('get.baname')!=''){
			$baname= input('get.baname');
			$map['baname']=['like',"%".$_GET['baname']."%"];
		}
		if(input('get.payodd')!=''){
			$payodd= input('get.payodd');
			$map['payodd']=['like',"%".$_GET['payodd']."%"];
		}
		
		if(input('get.patternodd')!=''){
			$patternodd = input('get.patternodd');
			$map['patternodd']=['like',"%".$_GET['patternodd']."%"];
		}
		if(input('get.consume')!=''){
			$consume = input('get.consume');
			$map['consume']=['like',"%".$_GET['consume']."%"];
		}
		if(input('get.patte')!=''){
			$patte = input('get.patte');
			$map['patte']=['like',"%".$_GET['patte']."%"];
		}
		if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
		
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['paytime'] = ['between',"$time1,$time2"];	
		}
		
	$query=[
			'city' => input('get.city'),
			'patte' => input('get.patte'),
			'baname' => input('get.baname'),
			'payodd' => input('get.payodd'),
			'patternodd' => input('get.patternodd'),
			'consume' => input('get.consume'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
			

		$list=db('pay')
		->join('user','userid = ba_user.user_id','left')
		->join('handle','ba_handle.u_id = userid','left')
		->field('pay_id,userid,payodd,patte,patternodd,ba_pay.money,consume,explain,paytime,ba_user.nickname,ba_handle.baname,ba_pay.city')
		->order('pay_id desc')
		->where($map)
		->paginate(20,false,array(
	        'query' => $query
		));
		// var_dump($list);
		$this->assign('list', $list);
				// 渲染模板输出
		return $this->fetch();
	}


	public function expense()
	{
if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='财务经理' ){
		$this->success('没有权限', 'index/inde');
	}
		$list=db('expense')
		->join('user','userid = ba_user.user_id','left')
		->join('handle','ba_user.user_id = ba_handle.u_id','left')	
		->field('ba_handle.baname')
		->order('withdraw_id desc')
		->paginate(20);
		// var_dump($list);
		$this->assign('list', $list);
				// 渲染模板输出
		return $this->fetch();
	}


	
	 public function approve()
	 {
	
	
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='财务经理' ){
		$this->success('没有权限', 'index/inde');
	}
	 	//根据id查询数据
	 	$id = $_GET['id'];
	 	$as = $_GET['as'];
	 	
	 	$list=db('withdraw')
			->where('withdraw_id',$id)
			->find();
		
		
	 	$handle = db('handle')	
			->where('han_id',$list['handleid'])
			->find();
			
		$hid=$handle['han_id'];
		if($as==1){
			$upd = db('handle')->where('han_id',$hid)->update(['freeze_money'=>$handle['freeze_money']-$list['deposit']*10]);
	 $upds = db('withdraw')->where('withdraw_id',$id)->update(['type'=>1]);
	 	if($upd){
	            $this->success('已通过', 'pay/withdraw');
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('通过失败');
	        }
	        
		}elseif($as==2){
			$upd = db('handle')->where('han_id',$hid)->update(['freeze_money'=>$handle['freeze_money']-$list['deposit']*10,'money'=>$handle['money']+$list['deposit']*10]);
			 $upds = db('withdraw')->where('withdraw_id',$id)->update(['type'=>2]);
			 if($upd){
	            $this->success('已驳回', 'pay/withdraw');
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('驳回失败');
	        }
		}
	 	
	 
	
	 
	 }



 public function paydaochu(){
 	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='财务经理' ){
		$this->success('没有权限', 'index/inde');
	}
 		$map='';
		if(input('get.baname')!=''){
			$baname= input('get.baname');
			$map['baname']=['like',"%".$_GET['baname']."%"];
		}
		if(input('get.payodd')!=''){
			$payodd= input('get.payodd');
			$map['payodd']=['like',"%".$_GET['payodd']."%"];
		}
		
		if(input('get.patternodd')!=''){
			$patternodd = input('get.patternodd');
			$map['patternodd']=['like',"%".$_GET['patternodd']."%"];
		}
		if(input('get.consume')!=''){
			$consume = input('get.consume');
			$map['consume']=['like',"%".$_GET['consume']."%"];
		}
		if(input('get.patte')!=''){
			$patte = input('get.patte');
			$map['patte']=['like',"%".$_GET['patte']."%"];
		}
		if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
		
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['paytime'] = ['between',"$time1,$time2"];	
		}
		


		$data=db('pay')
		->join('user','userid = ba_user.user_id','left')
		->join('handle','ba_handle.u_id = userid','left')
		->field('pay_id,userid,payodd,patte,patternodd,ba_pay.money,consume,explain,paytime,ba_user.nickname,ba_handle.baname,ba_pay.city')
		->order('pay_id desc')
		->where($map)
		->select(); 				
       
//     var_dump($data);die();    
			
           			
        Vendor('phpoffice.phpexcel.Classes.PHPExcel');//调用类库,路径是基于vendor文件夹的
        Vendor('phpoffice.phpexcel.PHPExcel.Worksheet.Drawing');
        Vendor('phpoffice.phpexcel.PHPExcel.Writer.Excel2007');
        $objExcel = new \PHPExcel();
        //set document Property
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

        $objActSheet = $objExcel->getActiveSheet();
        $key = ord("A");
        $letter =explode(',',"A,B,C,D,E,F,G,H,I,J,K");
        $arrHeader =  array('编号','用户昵称','用户(经办)','城市','单号','支付方式','支付单号','金额（¥）','状态','说明','支付时间');;

        //填充表头信息
        $lenth =  count($arrHeader);
        for($i = 0;$i < $lenth;$i++) {
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };
        //填充表格信息
        foreach($data as $k=>$v){

   
        	if($v['patte']==1){ $ss='支付宝';}elseif($v['patte']==2){ $ss='微信支付';}else{ $ss='余额';}
        	 if($v['consume']==1){ $ff='消费';}elseif($v['consume']==2){ $ff='提现';}elseif($v['consume']==3){ $ff='完成订单奖励';}else{ $ff='充值';}
 			$k +=2;
            $objActSheet->setCellValue('A'.$k,$v['pay_id']);
            $objActSheet->setCellValue('B'.$k, $v['nickname']);
            $objActSheet->setCellValue('C'.$k, $v['baname']);
            $objActSheet->setCellValue('D'.$k, $v['city']);
            $objActSheet->setCellValue('E'.$k, $v['payodd']);
            $objActSheet->setCellValue('F'.$k, $ss);
            $objActSheet->setCellValue('G'.$k, $v['patternodd']);
            $objActSheet->setCellValue('H'.$k, $v['money']);
            $objActSheet->setCellValue('I'.$k, $ff);
            $objActSheet->setCellValue('J'.$k, $v['explain']);
            $objActSheet->setCellValue('K'.$k, date('Y-m-d H:i:s',$v['paytime']));

            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(20);
        }

        $width = array(20,20,15,10,10,30,10,15,15,15,15);
        //设置表格的宽度
        $objActSheet->getColumnDimension('A')->setWidth($width[3]);
        $objActSheet->getColumnDimension('B')->setWidth($width[0]);
        $objActSheet->getColumnDimension('C')->setWidth($width[0]);
        $objActSheet->getColumnDimension('D')->setWidth($width[3]);
        $objActSheet->getColumnDimension('E')->setWidth($width[0]);
        $objActSheet->getColumnDimension('F')->setWidth($width[3]);
        $objActSheet->getColumnDimension('G')->setWidth($width[5]);
        $objActSheet->getColumnDimension('H')->setWidth($width[2]);
		$objActSheet->getColumnDimension('I')->setWidth($width[2]);		
		$objActSheet->getColumnDimension('J')->setWidth($width[2]);		
		$objActSheet->getColumnDimension('K')->setWidth($width[0]);

        $outfile = "匹配".date("Y-m-d").".xls";
        ob_end_clean();
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$outfile.'"');
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $objWriter->save('php://output');
    }
    
    
    
    




	}










?>
