<?php
namespace app\back\controller;
use think\Controller;
use think\Session;


/**
* Qa问题
*/
class Qa extends Index
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
			$type = $_POST['type'];//

			$headline = $_POST['headline'];
			$webtest = $_POST['webtest'];//标签
			$state = $_POST['state'];//是否热门,1是 0否
			$addtime = time();



  			$data = [
  			'type' =>$type,
				'headline' => $headline,
				'webtest' => $webtest,
				'state' => $state,
				'addtime' => $addtime
			];

			$newsflash = db('issue')->insert($data);



		if($newsflash){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('新增成功', 'Qa/show');
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
		$list=db('issue')->order('addtime desc')->paginate(20);
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
		$delete=db('issue')->delete($id);

		if($delete){

						$this->success('删除成功', 'newsflash/show');
			 } else {
						$this->error('删除失败');
				}

	}


	//
	// public function update($id)
	// {
	//
	//
	//
	// 	//根据id查询数据
	// 	$id = $_GET['id'];
	// 	$lists = db('issue')
	// 	->where('issue_id',$id)
	// 	->find();
	//
	// 	// $this->assign('list', $list);
	// 	$this->assign('lists', $lists);
	//
	// 	 return $this->fetch();
	//
	// }








	}










?>
