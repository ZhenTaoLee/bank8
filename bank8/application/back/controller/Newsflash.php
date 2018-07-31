<?php
namespace app\back\controller;
use think\Controller;
use think\Session;


/**
* 银行产品
*/
class Newsflash extends Index
{


	//每日快报添加
	public function add()
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

			$ntime=$_POST['ntime'];//显示时间

			$title=$_POST['title'];//标题1
			// $showtime=$_POST['showtime'];//显示时间
			$caption=$_POST['caption'];//标题2
			$webtext=$_POST['editorValue'];//内容


			// var_dump($webtext);

			$addtime = strtotime($_POST['ntime']);



  			$data = [
  			'ntime' =>$ntime,
				'title' => $title,
				'caption' => $caption,
				'webtext' => $webtext,
				'addtime' => $addtime
			];

			$newsflash = db('bulletin')->insert($data);



		if($newsflash){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('新增成功', 'newsflash/show');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('新增失败');
        }

		}

        return $this->fetch();

  }

	//每日快报展示
	public function show()
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
		$list=db('bulletin')->order('addtime desc')->paginate(20);
		// var_dump($list);
		$this->assign('list', $list);
				// 渲染模板输出
				return $this->fetch();
	}





	//删除
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
		$delete=db('bulletin')->delete($id);

		if($delete){

						$this->success('删除成功', 'newsflash/show');
			 } else {
						$this->error('删除失败');
				}

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
					$id=$_POST['bulletin_id'];

					$ntime=$_POST['ntime'];//显示时间

					$title=$_POST['title'];//标题1
					// $showtime=$_POST['showtime'];//显示时间
					$caption=$_POST['caption'];//标题2
					$webtext=$_POST['editorValue'];//内容


					// var_dump($webtext);

					$addtime = strtotime($_POST['ntime']);



		  			$data = [
		  			'ntime' =>$ntime,
						'title' => $title,
						'caption' => $caption,
						'webtext' => $webtext,
						'addtime' => $addtime
					];

					$newsflash = db('bulletin')->where('bulletin_id', $id)->update($data);



				if($newsflash){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'newsflash/show');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }

				}


			//根据id查询数据
			$id = $_GET['id'];
			$list = db('bulletin')
			->where('bulletin_id',$id)
			->find();

			// var_dump($list);
			// var_dump($lists);
			// $list = db('bank')->where('b_id','>',0)->order('rank desc')->select();
			// $this->assign('list', $list);
			$this->assign('list', $list);

    		return $this->fetch();
	}



//***************************QA问题************************//


		//每日快报添加
		public function qaAdd()
		{

		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}

				if(request()->isPost()){
			// 	// var_dump($_POST);
			// $ntime=$_POST['ntime'];//资讯来源
				$ntime=20180101;//资讯来源
				$headline=$_POST['headline'];//显示时间
				// $showtime=$_POST['showtime'];//显示时间
				$caption=$_POST['caption'];//标签
				$content=$_POST['content'];//是否热门,1是 0否



					$data = [
					'ntime' =>$ntime,
					'headline' => $headline,
					'caption' => $caption,
					'content' => $content

					];

					$newsflash = db('newsflash')->insert($data);



				if($newsflash){
								//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
								$this->success('新增成功', 'newsflash/show');
						} else {
								//错误页面的默认跳转页面是返回前一页，通常不需要设置
								$this->error('新增失败');
						}

				}

						return $this->fetch();

		}

		//汇总
		public function information()
		{
					if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	if($qianxian!='管理员' && $qianxian!='总经理'&& $qianxian!='总部助理' ){
		$this->success('没有权限', 'index/inde');
	}

			//查询
			$list=db('bulletin')->field('title,caption')->order('addtime desc')->paginate(3);
			var_dump($list);
			$this->assign('list', $list);

			return $this->fetch();
		}








	}










?>
