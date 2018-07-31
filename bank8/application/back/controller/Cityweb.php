<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 区域城市数据
*/
// 网站控制类
class Cityweb extends Index
{


  //展示网站录入数据
  public function show()
  {

       if(Session::has('name')==null){
            $this->success('请登陆', 'index/login');
       }
       $qianxian=Session::get('qianxian','think');

    	if( $qianxian=='财务经理' ){
    	 	$this->success('没有权限', 'index/inde');
    	 }


 	if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$city='';
			if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'  ){

			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理' ){

			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理' ){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}



    //搜索

    if(input('get.name')!='')
    {
          $name = input('get.name');
          $map['name']=['like',"%".$_GET['name']."%"];
    }

    if(input('get.source')!='')
    {
          $name = input('get.source');
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

    $list=db('webapply')
    ->order('addtime desc')
    ->where($map)
    ->paginate(10,false,array(
          'query' => $query
      ));
    // var_dump($list);
    $this->assign('list', $list);

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
  		$delete=db('webapply')->delete($id);
  		if($delete){

  						$this->success('删除成功', 'Cityweb/show');
  			 } else {
  						$this->error('删除失败');
  				}

  	}

 public function daochu(){

 if(Session::has('name')==null){
            $this->success('请登陆', 'index/login');
       }
       $qianxian=Session::get('qianxian','think');

    	if( $qianxian=='财务经理' ){
    	 	$this->success('没有权限', 'index/inde');
    	 }


 	if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$city='';
			if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'  ){

			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理' ){

			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理' ){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}


    //搜索

    if(input('get.name')!='')
    {
          $name = input('get.name');
          $map['name']=['like',"%".$_GET['name']."%"];
    }

    if(input('get.source')!='')
    {
          $name = input('get.source');
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

    $data=db('webapply')
    ->order('addtime desc')
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
        $arrHeader =  array('序号','所在城市','职业身份','姓名','电话','申请类型','信息来源','申请时间');;

        //填充表头信息
        $lenth =  count($arrHeader);
        for($i = 0;$i < $lenth;$i++) {
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };




        //填充表格信息
        foreach($data as $k=>$v){

            $k +=2;
            $objActSheet->setCellValue('A'.$k,$v['webapply_id']);
            $objActSheet->setCellValue('B'.$k, $v['city']);
            $objActSheet->setCellValue('C'.$k, $v['profession']);
            $objActSheet->setCellValue('D'.$k, $v['name']);
            $objActSheet->setCellValue('E'.$k, $v['phone']);
            $objActSheet->setCellValue('F'.$k, $v['identity']);
            $objActSheet->setCellValue('F'.$k, $v['source']);
            $objActSheet->setCellValue('G'.$k, date('Y-m-d H:i:s',$v['addtime']));

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
        $objActSheet->getColumnDimension('G')->setWidth($width[0]);


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



			$upd = db('webapply')->where('webapply_id',$id)->update(['remark'=>$remark,'updtime'=>time()]);
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
