<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
 * 匹配展示控制类
 */
class Matching extends Index
{

  //展示匹配数据
  public function matchShow()
  {
  	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
    
    //查询数据
    // $list=db('goods')->paginate(20);
    
$qianxian=Session::get('qianxian','think');
if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$city='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
				$city= '广州';
			$map['ba_matching.city']=['like',"%广州%"];
}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){	
	$city= '杭州';		
			$map['ba_matching.city']=['like',"%杭州%"];
	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
		$city= '深圳';	
			$map['ba_matching.city']=['like',"%深圳%"];		
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
		$city= '珠海';	
			$map['ba_matching.city']=['like',"%珠海%"];
	}	
	
		if(input('get.phone')!=''){
			$phone= input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name= input('get.name');
			$map['ba_matching.name']=['like',"%".$_GET['name']."%"];
		}
		
	
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_matching.addtime'] = ['between',"$time1,$time2"];	
		}
	$query=[
			'city'=>$city,
			'type' => input('get.type'),
			'baname' => input('get.baname'),
			'time1' => input('get.time1'),
			'time2'=>input('get.time2')
	];	
           $list = db('matching')
           			->join('user','ba_matching.user_id = ba_user.user_id','left')
           			->join('good','ba_matching.good_id = ba_good.good_id','left')
           			->field('phone,ba_matching.user_id as uid ,matching_id,ba_matching.name,ba_matching.addtime,ba_matching.good_id as gid,goodName,ba_matching.city,ownHouse,ownAutomobile,ownGuaranteeSlip,ownPersonage,ba_matching.remark,ba_matching.updtime')
           			->order('ba_matching.addtime desc')
           			->where('ba_matching.good_id','>',0)
           			->where($map)
           			->paginate(10,false,array(
	        'query' => $query
		));

//	    var_dump($list);
	    $this->assign('list', $list);

    	return $this->fetch();



  }


//详情
  public function details()
  {
  	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

			$id=$_GET['id'];
    //查询数据
    // $list=db('goods')->paginate(20);

           			$matching = db('matching')
           			->where('matching_id',$id)
           			->find();
           			
           			$user= db('user')
           			->where('user_id',$matching['user_id'])
           			->find();
           			
           			
           			 $matchinghouse = db('matchinghouse')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matchinginsurance = db('matchinginsurance')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matchingpersonage = db('matchingpersonage')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matchingvehicle = db('matchingvehicle')
           			->where('matching_id',$id)
           			->find();
           			
           			 $matching_pair = db('matching_pair')
           			->where('matching_id',$id)
           			->find();

//	    var_dump($list);
$this->assign('user', $user);
$this->assign('matching', $matching);
$this->assign('matchinghouse', $matchinghouse);
$this->assign('matchinginsurance', $matchinginsurance);
$this->assign('matchingpersonage', $matchingpersonage);
$this->assign('matchingvehicle', $matchingvehicle);
$this->assign('matching_pair', $matching_pair);
    	return $this->fetch();



  }
  




 public function matchdaochu(){
 		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
    
    //查询数据
    // $list=db('goods')->paginate(20);
    
$qianxian=Session::get('qianxian','think');
if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
		if(input('get.city')!=''){
			$city= input('get.city');
			$map['ba_matching.city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
				$city= '广州';
			$map['ba_matching.city']=['like',"%广州%"];
}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){	
	$city= '杭州';		
			$map['ba_matching.city']=['like',"%杭州%"];
	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
		$city= '深圳';	
			$map['ba_matching.city']=['like',"%深圳%"];		
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
		$city= '珠海';	
			$map['ba_matching.city']=['like',"%珠海%"];
	}	
	
		if(input('get.phone')!=''){
			$phone= input('get.phone');
			$map['phone']=['like',"%".$_GET['phone']."%"];
		}
		if(input('get.name')!=''){
			$name= input('get.name');
			$map['ba_matching.name']=['like',"%".$_GET['name']."%"];
		}
		
	
	if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['ba_matching.addtime'] = ['between',"$time1,$time2"];	
	}
      				$data = db('matching')
           			->join('user','ba_matching.user_id = ba_user.user_id','left')
           			->join('good','ba_matching.good_id = ba_good.good_id','left')
           			->field('phone,ba_matching.user_id as uid ,matching_id,ba_matching.name,ba_matching.addtime,ba_matching.good_id as gid,goodName,ba_matching.city,ownHouse,ownAutomobile,ownGuaranteeSlip,ownPersonage')
           			->where('ba_matching.good_id','>',0)
           			->where($map)
           			->select();
        Vendor('phpoffice.phpexcel.Classes.PHPExcel');//调用类库,路径是基于vendor文件夹的
        Vendor('phpoffice.phpexcel.PHPExcel.Worksheet.Drawing');
        Vendor('phpoffice.phpexcel.PHPExcel.Writer.Excel2007');
        $objExcel = new \PHPExcel();
        //set document Property
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

        $objActSheet = $objExcel->getActiveSheet();
        $key = ord("A");
        $letter =explode(',',"A,B,C,D,E,F,G,H");
        $arrHeader =  array('序号','匹配编号','手机号','姓名','推荐产品','城市','匹配项','匹配时间');;
  
        //填充表头信息
        $lenth =  count($arrHeader);
        for($i = 0;$i < $lenth;$i++) {
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };
        //填充表格信息
        foreach($data as $k=>$v){
        
        	
        	if($v['ownHouse']==1){ $s1=' 拥有房产 '; }else{$s1='';}
			if($v['ownAutomobile']==1){ $s2=' 拥有汽车 '; }else{$s2='';}
			if($v['ownGuaranteeSlip']==1){ $s3=' 拥有保单 '; }else{$s3='';}
			if($v['ownPersonage']==1){ $s4=' 个人和企业 '; }else{$s4='';}
        	
        	
            $k +=2;
            $objActSheet->setCellValue('A'.$k,$v['matching_id']);
            $objActSheet->setCellValue('B'.$k, $v['addtime'].$v['matching_id']);
            $objActSheet->setCellValue('C'.$k, $v['phone']);
            $objActSheet->setCellValue('D'.$k, $v['name']);
            $objActSheet->setCellValue('E'.$k, $v['goodName']);
            $objActSheet->setCellValue('F'.$k, $v['city']);
            $objActSheet->setCellValue('G'.$k, $s1.$s2.$s3.$s4);
            $objActSheet->setCellValue('H'.$k, date('Y-m-d H:i:s',$v['addtime']));

            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(20);
        }

        $width = array(20,20,15,10,10,30,10,15);
        //设置表格的宽度
        $objActSheet->getColumnDimension('A')->setWidth($width[3]);
        $objActSheet->getColumnDimension('B')->setWidth($width[0]);
        $objActSheet->getColumnDimension('C')->setWidth($width[0]);
        $objActSheet->getColumnDimension('D')->setWidth($width[3]);
        $objActSheet->getColumnDimension('E')->setWidth($width[0]);
        $objActSheet->getColumnDimension('F')->setWidth($width[3]);
        $objActSheet->getColumnDimension('G')->setWidth($width[5]);
        $objActSheet->getColumnDimension('H')->setWidth($width[0]);


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
    
    
    
    
    
    
    
public function updremark()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }

			$id=$_POST['id'];
			$remark=$_POST['remark'];


//echo $remark;die();
		$upd = db('matching')->where('matching_id',$id)->update(['remark'=>$remark,'updtime'=>time()]);
	
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













 ?>
