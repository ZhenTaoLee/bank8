<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 学堂
*/
class School extends Index
{


	//展示资讯数据
	public function schoolshow()
	{

	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}

	$map='';
	if(input('get.headline')!=''){
			$headline = input('get.headline');
			$map['headline']=['like',"%".$_GET['headline']."%"];
		}

		if(input('get.time1')!='' && input('get.time2')!=''){
			$time1 = strtotime(input('get.time1'));
			$time2 = strtotime(input('get.time2'));
			$map['addtime'] = ['between',"$time1,$time2"];
		}

	$query=[
				'headline' => input('get.headline'),
				'time1' => input('get.time1'),
				'time2'=>input('get.time2')
				];
			$list=db('i_school')
		->order('addtime desc')
		->where($map)
		->paginate(12,false,array(
	        'query' => $query
			));
		// var_dump($list);
		$this->assign('list', $list);

        return $this->fetch();
	}

	public function schooladd()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}


			if(request()->isPost()){
				// var_dump($_POST);

			$status=$_POST['status'];//状态,1上架 0下架
			$headline=$_POST['headline'];//标题
			$webtext=$_POST['editorValue'];//内容

			$synopsis = $_POST['synopsis'];//简介
			// $url = $_POST['url'];//网页内容URL
			$picture = $_POST['picture'];//图片URL
			// $click = $_POST['click'];
			// $addtime=strtotime($_POST['showtime']);//显示时间
			$addtime = time();//添加时间

  			$data = [

				'headline' => $headline,
				'addtime' => $addtime,
				'synopsis' => $synopsis,
				'webtext' => $webtext,
				'picture' => $picture,
				'status' => $status

			];
			//
			$schooladd = db('i_school')->insert($data);



		if($schooladd){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('新增成功', 'School/schoolshow');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('新增失败');
        }

		}

        return $this->fetch();
	}

	//修改内容
	public function update()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}


			if(request()->isPost()){
			// var_dump($_POST);
			$school_id=$_POST['school_id'];

			$status=$_POST['status'];//状态,1上架 0下架
			$headline=$_POST['headline'];//标题
			$webtext=$_POST['editorValue'];//内容

			$synopsis = $_POST['synopsis'];//简介
			// $url = $_POST['url'];//网页内容URL
			$picture = $_POST['picture'];//图片URL
			// $click = $_POST['click'];
			// $addtime=strtotime($_POST['showtime']);//显示时间
			$addtime = time();//添加时间

				$data = [

				'headline' => $headline,
				'addtime' => $addtime,
				'synopsis' => $synopsis,
				'webtext' => $webtext,
				'picture' => $picture,
				'status' => $status

			];



			$scl = db('i_school')->where('school_id',$school_id)->update($data);



		if($scl){
						//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
						$this->success('修改成功', 'School/schoolshow');
				} else {
						//错误页面的默认跳转页面是返回前一页，通常不需要设置
						$this->error('修改失败');
				}

		}





		//根据id查询数据
		$id = $_GET['id'];
		$lists = db('i_school')
		->where('school_id',$id)
		->find();

		// var_dump($lists);
		// $list = db('bank')->where('b_id','>',0)->order('rank desc')->select();
		// $this->assign('list', $list);
		$this->assign('lists', $lists);

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

		// if(Session::has('name')==null){
		// 		 $this->success('请登陆', 'index/login');
		// 	}
		$id=$_GET['id'];
		$delete=db('i_school')->delete($id);

		if($delete){

						$this->success('删除成功', 'School/schoolshow');
			 } else {
						$this->error('删除失败');
				}

	}

	//修改状态
	public function updates()
	{

		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}

		$id=$_GET['id'];

			$status= 1;//状态,1上架 0下架
				$data = [

				'status' => $status
			];

			$new = db('i_school')->where('i_school_id',$id)->update($data);



		if($new){
						//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
						$this->success('上架成功', 'News/show');
				} else {
						//错误页面的默认跳转页面是返回前一页，通常不需要设置

						$statu= 0;//状态,1上架 0下架
							$data = [

							'status' => $statu
						];

						$new = db('i_school')->where('i_school_id',$id)->update($data);


						$this->error('该资讯已下架','News/show');
				}
	}


}



?>
