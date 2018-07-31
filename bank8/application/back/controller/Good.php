<?php
namespace app\back\controller;
use think\Controller;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

/**
* 银行产品
*/
class Good extends Index
{
	
	public function show()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
		$qianxian=Session::get('qianxian','think');
		
	
		
		
	if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$city='';
			if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			
			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){
			
			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}

		if(input('get.goodName')!=''){
			$goodName = input('get.goodName');
			$map['goodName']=['like',"%".$_GET['goodName']."%"];
		}
		if(input('get.bankname')!=''){
			$bankname = input('get.bankname');
			$map['bankname']=['like',"%".$_GET['bankname']."%"];
		}

		if(input('get.putaway')!=''){
			$putaway = input('get.putaway');
			$map['putaway']=['like',"%".$_GET['putaway']."%"];
		}
		$query=[
			'goodName' => input('get.goodName'),
			'bankname'=>input('get.bankname'),
			'city'=>$city,
			'putaway'=>input('get.putaway')
			];	
			
			
		$list=db('good')	
		->join('bank','bankid = ba_bank.b_id','left')
		->field('good_id,goodName,putaway,agelimit,accrual,limit,ba_bank.bankname,ba_bank.city')
		->order('good_id desc')
		->where($map)
		->paginate(20,false,array(
	        'query' => $query
			));
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	
	
public function bank()
	{
			if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
		$qianxian=Session::get('qianxian','think');		
	if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
			$city = '';
			if(input('get.city')!=''){
			$city = input('get.city');
			$map['city']=['like',"%".$_GET['city']."%"];
		}
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			
			$city = '广州';
			$map['city']=['like',"%广州%"];

	}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){
			
			$city = '杭州';
			$map['city']=['like',"%杭州%"];

	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$city = '深圳';
			$map['city']=['like',"%深圳%"];
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$city = '珠海';
			$map['city']=['like',"%珠海%"];
	}
		if(input('get.bankname')!=''){
			$bankname = input('get.bankname');
			$map['bankname']=['like',"%".$_GET['bankname']."%"];
		}
	
		$query=[
			'bankname' => input('get.bankname'),
			'city'=>$city
			];	

		$list=db('bank')->order('rank desc')->where($map)->paginate(10,false,array(
	        'query' => $query
			));
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
	}
	

	
	public function delete()
	{	
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }



		$id=$_GET['good_id'];
		$delete=db('good')->delete($id);
		$deletes=db('goods')->delete($id);
		if($delete){           
			 echo '<script>alert("删除成功！"); window.location.href=document.referrer; </script>';
//          $this->success('删除成功', 'good/show');
       } else {      
            $this->error('删除失败');
        }
	}
	
	
		//审核通过（广州）
	public function dist()
	{
	if(Session::has('name')==null){
     	$this->success('请登陆', 'index/login');
    }

			$oid=$_GET['oid'];
			$as=$_GET['as'];



			$upd = db('good')->where('good_id',$oid)->update(['putaway'=>$as]);
		if($upd){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
//	            $this->success('修改成功', "good/show");
 echo '<script>alert("修改成功！"); window.location.href=document.referrer; </script>';
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }
	}
	
	
	public function bankdelete()
	{
		
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');
	


		$id=$_GET['id'];
		$delete=db('bank')->delete($id);
		if($delete){           
//          $this->success('删除成功', 'good/bank');
 echo '<script>alert("修改成功！"); window.location.href=document.referrer; </script>';
       } else {      
            $this->error('删除失败');
        }
	}
	
	public function bankadd()
	{
		if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	


if(request()->isPost()){
	
	
	
		$file = request()->file('img');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();

            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
//            //获取当前控制器名称
//
//            $controllerName=$this->getContro();

            // 上传到七牛后保存的文件名
            $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
//            require_once APP_APP_VIR . '/../vendor/qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'ZzQu0_1dTgSOZT5unMqrAxNC8NyvfQFosJowZ8zG';
            $secretKey = 'PsMaLHUhufgFvGTnU_X_s0dcCcZQyny4WI0bz-Ad';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = 'bank8';
            $domain = 'https://zykj.8haoqianzhuang.cn/';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            
            if ($err !== null) {
                $this->error('上传头像失败');
            } else {
                //返回图片的完整URL
                $logo=$domain . $ret['key'];//银行logo
            }
            
    $qianxian=Session::get('qianxian','think');
		if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$citys = '全部';
		}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			$citys = '广州';
}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){			
			$citys = '杭州';
	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$citys = '深圳';			
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$citys = '珠海';	
	}
		 $city=$_POST['city'];//所在城市
	 
	if($citys!='全部'&&$city!=$citys){
		$this->error('您没有添加此城市机构的权限');
		
	}
	
$bankname=$_POST['bankname'];//银行名
 $rank=$_POST['rank'];//排序


$adddata=['logo'=>$logo,'bankname'=>$bankname,'rank'=>$rank,'city'=>$city,'addtime'=>time()];
		
$add=db('bank')->insert($adddata);
if($add){      
 
            $this->success('添加成功', 'good/bank');
       	} else {      
            $this->error('添加失败');
        }
}
      
            
            
        return $this->fetch();
	}
	
	
	
	
	public function add()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');


		if(request()->isPost()){
			
//			show_bug($_POST);die();
			
			$bankid=$_POST['bankid'];//机构id
			$bank = db('bank')->where('b_id',$bankid)->find();	
			$goodtype=$_POST['goodtype'];//1为房信用 2为车信用，3为保单信用，4公积金信用,5个人与企业信息
			$ratio=$_POST['ratio'];//排序数字越小越前（普通产品利率1%就写100有合作的客户1%就写10）
			$goodName=$_POST['goodName'];//产品名
			$cityName=$bank['city'];//城市
			$hot=$_POST['hot'];//1是热门信息 2是推荐信息
			$label=$_POST['labels'];//标签
			$agelimit=$_POST['agelimit'];//年限
			$accrual=$_POST['accrual'];//利息比
			$limit=$_POST['limit'];//额度
		
			$condition=$_POST['condition'];//申请条件
			$datum=$_POST['datum'];//准备资料
			$notice=$_POST['notice'];//注意事项
			$addtime=time();//添加时间
			
			$popularity=$_POST['popularity'];//人气
			$maxLimit=$_POST['maxLimit'];//最高额度（万）
			$successRate=$_POST['successRate'];//成功率{%}

//			var_dump($_POST);die();
			$data = [
			'popularity'=>$popularity,
			'maxLimit'=>$maxLimit,
			'successRate'=>$successRate,
			'ratio'=>$ratio,
  			'goodName' =>$goodName,
			'bankid' =>$bankid,
			'goodtype' =>$goodtype,
			'cityName' =>$cityName,
			'hot' =>$hot,
			'label' =>$label,
			'agelimit' =>$agelimit,
			'accrual' =>$accrual,
			'limit' =>$limit,
			'condition' =>$condition,
			'datum' =>$datum,
			'notice' =>$notice,
			'addtime' =>$addtime
			];
			$goodadd = db('good')->insert($data);
			$good_id = db('good')->getLastInsID();
		

		
		
		$educationGood=$_POST['educationGoods'];//学历0为本科以下2为本科以上
		$weilidaiGood=$_POST['weilidaiGoods'];//微粒贷1有2无0空
		$occupationGood=$_POST['occupationGoods'];//职业1为上班族2为生意人
		$socialSecurityGood=$_POST['socialSecurityGoods'];//社保，0为没填，1为有，2无
		$accumulationFundGood=$_POST['accumulationFundGoods'];//公积金，0为没填，1为有，2为无
		$salaryGood=$_POST['salaryGoods'];//工资，0没填，1为5000以下，2为5000以上
		$licenseGood=$_POST['licenseGoods'];//执照，0为没填，1为有，2为无
		$runningWaterGood=$_POST['runningWaterGoods'];//流水，0没填，1为50万以下，2为50万以上
		$houseTypeGood=$_POST['houseTypeGoods'];//房产类型，0为没填，1为商品房，2为其它
		$houseBuyGood=$_POST['houseBuyGoods'];//房产购置方式，0没填，1全款，2月供
		$propertyValuesGood=$_POST['propertyValuesGoods'];//房产价值，0没填，1为80万以下，80万以上（全款特有）
		$monthlyPaymentGood=$_POST['monthlyPaymentGoods'];//房产月供额，0为没填，1为5000以下，2为5000以上
		$insuranceTypeGood=$_POST['insuranceTypeGoods'];//保单类型,0为没填，1为传统型，2为分红型
		$insurancePaymentMethodGood=$_POST['insurancePaymentMethodGoods'];//保单缴费方式，0为没填，1为年缴，2为月缴
		$insuranceAgeLimitGood=$_POST['insuranceAgeLimitGoods'];//保单缴费年限，0为没填，1为3年以下，2为3年以上
		$vehicleBuyTypeGood=$_POST['vehicleBuyTypeGoods'];//汽车购置方式，0为没填，1为全款，2为月供
		$minVehiclePriceGood=$_POST['minVehiclePriceGoods'];//最低汽车价格
		$vehicleAgeGood=$_POST['vehicleAgeGoods'];//车龄，0为没填，1为8年以下，2为8年以上
		
		$datdda = [
			'good_id'=>$good_id,
			'educationGood'=>$educationGood,
			'weilidaiGood'=>$weilidaiGood,
			'occupationGood'=>$occupationGood,
			'socialSecurityGood'=>$socialSecurityGood,
			'accumulationFundGood'=>$accumulationFundGood,
			'salaryGood'=>$salaryGood,
			'licenseGood'=>$licenseGood,
			'runningWaterGood'=>$runningWaterGood,
			'houseTypeGood'=>$houseTypeGood,
			'houseBuyGood'=>$houseBuyGood,
			'propertyValuesGood'=>$propertyValuesGood,
			'monthlyPaymentGood'=>$monthlyPaymentGood,
			'insuranceTypeGood'=>$insuranceTypeGood,
			'insurancePaymentMethodGood'=>$insurancePaymentMethodGood,
			'insuranceAgeLimitGood'=>$insuranceAgeLimitGood,
			'vehicleBuyTypeGood'=>$vehicleBuyTypeGood,
			'minVehiclePriceGood'=>$minVehiclePriceGood,
			'vehicleAgeGood'=>$vehicleAgeGood
	
			];
			$goodaddsss = db('goods_pair')->insert($datdda);
		
		
		

		
		
		$sex=$_POST['sexs'];
		$ageMax=$_POST['ageMax'];//最大年龄
		$ageMin=$_POST['ageMin'];//最小年龄
		

//`profession` text NOT NULL COMMENT '职业',
if(array_key_exists('professionone', $_POST)!== false){
			$profession=$_POST['professions'];//职业
		}else{	
			$profession="公务员事业单位 | 国企、500强、上市公司 | 娱乐行业 | 保险行业 | 法人或股东 | 公检法 | 直销 | 高风险行业 | 普通白领 | 退休人员 | 转业军人";
		}	

//`credit` text NOT NULL COMMENT '征信查询',
if(array_key_exists('creditone', $_POST)!== false){
			$credit=$_POST['credits'];//征信查询
		}else{	
			$credit="不知道 | 近2个月查询≤4次 | 近3个月查询≤6次 | 近半年查询≤6次 | 近半年查询≤11次 | 白户（无贷款和信用卡记录）| 近一年查询≤12次";
		}	
//`liabilities` text NOT NULL COMMENT '个人负债',
if(array_key_exists('liabilitiesone', $_POST)!== false){
			$liabilities=$_POST['liabilitiess'];//个人负债
		}else{	
			$liabilities="信用类负债30万以内 | 信用类负债50万以内 | 信用类负债100万以内 | 卡债10万以内 | 无负债";
		}	

//`socialSecurity` text NOT NULL COMMENT '社保',
if(array_key_exists('socialSecurityone', $_POST)!== false){
			$socialSecurity=$_POST['socialSecuritys'];//社保
		}else{	
			$socialSecurity="无 | 连续缴不足6个月 | 连续缴6个月以上 | 连续缴12个月以上 | 连续缴24个月以上";
		}	
//`socialSecurityBasics` text NOT NULL COMMENT '社保基数',
if(array_key_exists('socialSecurityBasicsone', $_POST)!== false){
			$socialSecurityBasics=$_POST['socialSecurityBasicss'];//社保基数
		}else{	
			$socialSecurityBasics="不清楚  | 基数2400以上 | 基数4000以上 |基数5000以上";
		}	
//`accumulationFund` text NOT NULL COMMENT '公积金',
if(array_key_exists('accumulationFundone', $_POST)!== false){
			$accumulationFund=$_POST['accumulationFunds'];//公积金
		}else{	
			$accumulationFund="无 | 连续缴不足6个月 | 连续缴6个月以上 | 连续缴12个月以上 | 连续缴24个月以上";
		}	
//`accumulationFundBasics` text NOT NULL COMMENT '公积金基数',
if(array_key_exists('accumulationFundBasicsone', $_POST)!== false){
			$accumulationFundBasics=$_POST['accumulationFundBasicss'];//公积金基数
		}else{	
			$accumulationFundBasics="不清楚 | 个人缴费400元以上 | 个人缴费800元以上 | 基数2000以下 | 基数2000~4000元 | 基数4000元以上 | 基数5000元以上";
		}	
//`houseBuyType` text NOT NULL COMMENT '房产购置方式',
if(array_key_exists('houseBuyTypeone', $_POST)!== false){
			$houseBuyType=$_POST['houseBuyTypes'];//房产购置方式
		}else{	
			$houseBuyType="无房产 | 全款房 | 结清1年以内 | 按揭满3个月以下 | 按揭满3个月以上 | 按揭满6个月以上 | 按揭12个月以上";
		}	
//`houseCity` text NOT NULL COMMENT '房产城市',
if(array_key_exists('houseCityone', $_POST)!== false){
		if(strpos($_POST['houseCitys'],'全国') !== false){
			$houseCity=" 全国|北京市	| 东莞市	| 广州市	| 中山市	| 深圳市	| 惠州市	| 江门市	| 珠海市	| 汕头市	| 佛山市	| 湛江市	| 河源市	| 肇庆市	| 潮州市	| 清远市	| 韶关市	| 揭阳市	| 阳江市	| 云浮市	| 茂名市	| 梅州市	| 汕尾市　	| 济南市	| 青岛市	| 临沂市	| 济宁市	| 菏泽市	| 烟台市	| 泰安市	| 淄博市	| 潍坊市	| 日照市	| 威海市	| 滨州市	| 东营市	| 聊城市	| 德州市	| 莱芜市	| 枣庄市　	| 苏州市	| 徐州市	| 盐城市	| 无锡市	| 南京市	| 南通市	| 连云港市	| 常州市	| 扬州市	| 镇江市	| 淮安市	| 泰州市	| 宿迁市　	| 郑州市	| 南阳市	| 新乡市	| 安阳市	| 洛阳市	| 信阳市	| 平顶山市	| 周口市	| 商丘市	| 开封市	| 焦作市	| 驻马店市	| 濮阳市	| 三门峡市	| 漯河市	| 许昌市	| 鹤壁市	| 济源市　	| 上海市	| 石家庄市	| 唐山市	| 保定市	| 邯郸市	| 邢台市	| 河北区	| 沧州市	| 秦皇岛市	| 张家口市	| 衡水市	| 廊坊市	| 承德市　	| 温州市	| 宁波市	| 杭州市	| 台州市	| 嘉兴市	| 金华市	| 湖州市	| 绍兴市	| 舟山市	| 丽水市	| 衢州市　	| 香港特别行政区	| 西安市	| 咸阳市	| 宝鸡市	| 汉中市	| 渭南市	| 安康市	| 榆林市	| 商洛市	| 延安市	| 铜川市　	| 长沙市	| 邵阳市	| 常德市	| 衡阳市	| 株洲市	| 湘潭市	| 永州市	| 岳阳市	| 怀化市	| 郴州市	| 娄底市	| 益阳市	| 张家界市	| 湘西州　	| 江北区	| 漳州市	| 泉州市	| 厦门市	| 福州市	| 莆田市	| 宁德市	| 三明市	| 南平市	| 龙岩市　	| 和平区	| 昆明市	| 红河州	| 大理州	| 文山州	| 德宏州	| 曲靖市	| 昭通市	| 楚雄州	| 保山市	| 玉溪市	| 丽江地区	| 临沧地区	| 思茅地区	| 西双版纳州	| 怒江州	| 迪庆州　	| 成都市	| 绵阳市	| 广元市	| 达州市	| 南充市	| 德阳市	| 广安市	| 阿坝州	| 巴中市	| 遂宁市	| 内江市	| 凉山州	| 攀枝花市	| 乐山市	| 自贡市	| 泸州市	| 雅安市	| 宜宾市	| 资阳市	| 眉山市	| 甘孜州　	| 贵港市	| 玉林市	| 北海市	| 南宁市	| 柳州市	| 桂林市	| 梧州市	| 钦州市	| 来宾市	| 河池市	| 百色市	| 贺州市	| 崇左市	| 防城港市　	| 芜湖市	| 合肥市	| 六安市	| 宿州市	| 阜阳市	| 安庆市	| 马鞍山市	| 蚌埠市	| 淮北市	| 淮南市	| 宣城市	| 黄山市	| 铜陵市	| 亳州市	| 池州市	| 巢湖市	| 滁州市　	| 三亚市	| 海口市	| 琼海市	| 文昌市	| 东方市	| 昌江县	| 陵水县	| 乐东县	| 五指山市	| 保亭县	| 澄迈县	| 万宁市	| 儋州市	| 临高县	| 白沙县	| 定安县	| 琼中县	| 屯昌县　	| 南昌市	| 赣州市	| 上饶市	| 吉安市	| 九江市	| 新余市	| 抚州市	| 宜春市	| 景德镇市	| 萍乡市	| 鹰潭市　	| 武汉市	| 宜昌市	| 襄樊市	| 荆州市	| 恩施州	| 孝感市	| 黄冈市	| 十堰市	| 咸宁市	| 黄石市	| 仙桃市	| 随州市	| 天门市	| 荆门市	| 潜江市	| 鄂州市	| 神农架林区　	| 太原市	| 大同市	| 运城市	| 长治市	| 晋城市	| 忻州市	| 临汾市	| 吕梁市	| 晋中市	| 阳泉市	| 朔州市　	| 大连市	| 沈阳市	| 丹东市	| 辽阳市	| 葫芦岛市	| 锦州市	| 朝阳市	| 营口市	| 鞍山市	| 抚顺市	| 阜新市	| 本溪市	| 盘锦市	| 铁岭市　	| 台北市	| 高雄市	| 台中市	| 新竹市	| 基隆市	| 台南市	| 嘉义市　	| 齐齐哈尔市	| 哈尔滨市	| 大庆市	| 佳木斯市	| 双鸭山市	| 牡丹江市	| 鸡西市	| 黑河市	| 绥化市	| 鹤岗市	| 伊春市	| 大兴安岭地区	| 七台河市　	| 赤峰市	| 包头市	| 通辽市	| 呼和浩特市	| 乌海市	| 鄂尔多斯市	| 呼伦贝尔市	| 兴安盟	| 巴彦淖尔盟	| 乌兰察布盟	| 锡林郭勒盟	| 阿拉善盟　	| 澳门特别行政区	| 贵阳市	| 黔东南州	| 黔南州	| 遵义市	| 黔西南州	| 毕节地区	| 铜仁地区	| 安顺市	| 六盘水市　	| 兰州市	| 天水市	| 庆阳市	| 武威市	| 酒泉市	| 张掖市	| 陇南地区	| 白银市	| 定西地区	| 平凉市	| 嘉峪关市	| 临夏回族自治州	| 金昌市	| 甘南州　	| 西宁市	| 海西州	| 海东地区	| 海北州	| 果洛州	| 玉树州	| 黄南藏族自治州　	| 乌鲁木齐市	| 伊犁州	| 昌吉州	| 石河子市	| 哈密地区	| 阿克苏地区	| 巴音郭楞州	| 喀什地区	| 塔城地区	| 克拉玛依市	| 和田地区	| 阿勒泰州	| 吐鲁番地区	| 阿拉尔市	| 博尔塔拉州	| 五家渠市	| 克孜勒苏州	| 图木舒克市　	| 拉萨市	| 山南地区	| 林芝地区	| 日喀则地区	| 阿里地区	| 昌都地区	| 那曲地区　	| 吉林市	| 长春市	| 白山市	| 白城市	| 延边州	| 松原市	| 辽源市	| 通化市	| 四平市　	| 银川市	| 吴忠市	| 中卫市	| 石嘴山市	| 固原市	";
		}else{
			$houseCity=$_POST['houseCitys'];//房产城市
			
		}
			
		}else{	
			$houseCity=" 全国| 北京市	| 东莞市	| 广州市	| 中山市	| 深圳市	| 惠州市	| 江门市	| 珠海市	| 汕头市	| 佛山市	| 湛江市	| 河源市	| 肇庆市	| 潮州市	| 清远市	| 韶关市	| 揭阳市	| 阳江市	| 云浮市	| 茂名市	| 梅州市	| 汕尾市　	| 济南市	| 青岛市	| 临沂市	| 济宁市	| 菏泽市	| 烟台市	| 泰安市	| 淄博市	| 潍坊市	| 日照市	| 威海市	| 滨州市	| 东营市	| 聊城市	| 德州市	| 莱芜市	| 枣庄市　	| 苏州市	| 徐州市	| 盐城市	| 无锡市	| 南京市	| 南通市	| 连云港市	| 常州市	| 扬州市	| 镇江市	| 淮安市	| 泰州市	| 宿迁市　	| 郑州市	| 南阳市	| 新乡市	| 安阳市	| 洛阳市	| 信阳市	| 平顶山市	| 周口市	| 商丘市	| 开封市	| 焦作市	| 驻马店市	| 濮阳市	| 三门峡市	| 漯河市	| 许昌市	| 鹤壁市	| 济源市　	| 上海市	| 石家庄市	| 唐山市	| 保定市	| 邯郸市	| 邢台市	| 河北区	| 沧州市	| 秦皇岛市	| 张家口市	| 衡水市	| 廊坊市	| 承德市　	| 温州市	| 宁波市	| 杭州市	| 台州市	| 嘉兴市	| 金华市	| 湖州市	| 绍兴市	| 舟山市	| 丽水市	| 衢州市　	| 香港特别行政区	| 西安市	| 咸阳市	| 宝鸡市	| 汉中市	| 渭南市	| 安康市	| 榆林市	| 商洛市	| 延安市	| 铜川市　	| 长沙市	| 邵阳市	| 常德市	| 衡阳市	| 株洲市	| 湘潭市	| 永州市	| 岳阳市	| 怀化市	| 郴州市	| 娄底市	| 益阳市	| 张家界市	| 湘西州　	| 江北区	| 漳州市	| 泉州市	| 厦门市	| 福州市	| 莆田市	| 宁德市	| 三明市	| 南平市	| 龙岩市　	| 和平区	| 昆明市	| 红河州	| 大理州	| 文山州	| 德宏州	| 曲靖市	| 昭通市	| 楚雄州	| 保山市	| 玉溪市	| 丽江地区	| 临沧地区	| 思茅地区	| 西双版纳州	| 怒江州	| 迪庆州　	| 成都市	| 绵阳市	| 广元市	| 达州市	| 南充市	| 德阳市	| 广安市	| 阿坝州	| 巴中市	| 遂宁市	| 内江市	| 凉山州	| 攀枝花市	| 乐山市	| 自贡市	| 泸州市	| 雅安市	| 宜宾市	| 资阳市	| 眉山市	| 甘孜州　	| 贵港市	| 玉林市	| 北海市	| 南宁市	| 柳州市	| 桂林市	| 梧州市	| 钦州市	| 来宾市	| 河池市	| 百色市	| 贺州市	| 崇左市	| 防城港市　	| 芜湖市	| 合肥市	| 六安市	| 宿州市	| 阜阳市	| 安庆市	| 马鞍山市	| 蚌埠市	| 淮北市	| 淮南市	| 宣城市	| 黄山市	| 铜陵市	| 亳州市	| 池州市	| 巢湖市	| 滁州市　	| 三亚市	| 海口市	| 琼海市	| 文昌市	| 东方市	| 昌江县	| 陵水县	| 乐东县	| 五指山市	| 保亭县	| 澄迈县	| 万宁市	| 儋州市	| 临高县	| 白沙县	| 定安县	| 琼中县	| 屯昌县　	| 南昌市	| 赣州市	| 上饶市	| 吉安市	| 九江市	| 新余市	| 抚州市	| 宜春市	| 景德镇市	| 萍乡市	| 鹰潭市　	| 武汉市	| 宜昌市	| 襄樊市	| 荆州市	| 恩施州	| 孝感市	| 黄冈市	| 十堰市	| 咸宁市	| 黄石市	| 仙桃市	| 随州市	| 天门市	| 荆门市	| 潜江市	| 鄂州市	| 神农架林区　	| 太原市	| 大同市	| 运城市	| 长治市	| 晋城市	| 忻州市	| 临汾市	| 吕梁市	| 晋中市	| 阳泉市	| 朔州市　	| 大连市	| 沈阳市	| 丹东市	| 辽阳市	| 葫芦岛市	| 锦州市	| 朝阳市	| 营口市	| 鞍山市	| 抚顺市	| 阜新市	| 本溪市	| 盘锦市	| 铁岭市　	| 台北市	| 高雄市	| 台中市	| 新竹市	| 基隆市	| 台南市	| 嘉义市　	| 齐齐哈尔市	| 哈尔滨市	| 大庆市	| 佳木斯市	| 双鸭山市	| 牡丹江市	| 鸡西市	| 黑河市	| 绥化市	| 鹤岗市	| 伊春市	| 大兴安岭地区	| 七台河市　	| 赤峰市	| 包头市	| 通辽市	| 呼和浩特市	| 乌海市	| 鄂尔多斯市	| 呼伦贝尔市	| 兴安盟	| 巴彦淖尔盟	| 乌兰察布盟	| 锡林郭勒盟	| 阿拉善盟　	| 澳门特别行政区	| 贵阳市	| 黔东南州	| 黔南州	| 遵义市	| 黔西南州	| 毕节地区	| 铜仁地区	| 安顺市	| 六盘水市　	| 兰州市	| 天水市	| 庆阳市	| 武威市	| 酒泉市	| 张掖市	| 陇南地区	| 白银市	| 定西地区	| 平凉市	| 嘉峪关市	| 临夏回族自治州	| 金昌市	| 甘南州　	| 西宁市	| 海西州	| 海东地区	| 海北州	| 果洛州	| 玉树州	| 黄南藏族自治州　	| 乌鲁木齐市	| 伊犁州	| 昌吉州	| 石河子市	| 哈密地区	| 阿克苏地区	| 巴音郭楞州	| 喀什地区	| 塔城地区	| 克拉玛依市	| 和田地区	| 阿勒泰州	| 吐鲁番地区	| 阿拉尔市	| 博尔塔拉州	| 五家渠市	| 克孜勒苏州	| 图木舒克市　	| 拉萨市	| 山南地区	| 林芝地区	| 日喀则地区	| 阿里地区	| 昌都地区	| 那曲地区　	| 吉林市	| 长春市	| 白山市	| 白城市	| 延边州	| 松原市	| 辽源市	| 通化市	| 四平市　	| 银川市	| 吴忠市	| 中卫市	| 石嘴山市	| 固原市	";
		}	
//`houseArea` text NOT NULL COMMENT '房产面积',
if(array_key_exists('houseAreaone', $_POST)!== false){
			$houseArea=$_POST['houseAreas'];//房产面积
		}else{	
			$houseArea="60平以下 | 60~80平 | 80平以上";
		}	
//`houseValue` text NOT NULL COMMENT '房产估值',
if(array_key_exists('houseValueone', $_POST)!== false){
			$houseValue=$_POST['houseValues'];//房产估值
		}else{	
			$houseValue="80万以下 | 80万~100万 | 100万以上";
		}	
//`houseType` text NOT NULL COMMENT '房产类型',
if(array_key_exists('houseTypeone', $_POST)!== false){
			$houseType=$_POST['houseTypes'];//房产类型
		}else{	
			$houseType="商品房 | 宅基地 | 商品铺位 | 商铺房 | 别墅 | 车位";
		}	
//`vehicleBuyType` text NOT NULL COMMENT '汽车购置方式',
if(array_key_exists('vehicleBuyTypeone', $_POST)!== false){
			$vehicleBuyType=$_POST['vehicleBuyTypes'];//职业
		}else{	
			$vehicleBuyType="全款 | 按揭";
		}	
//`vehicleLoanType` text NOT NULL COMMENT '可接受车贷类型',
if(array_key_exists('vehicleLoanTypeone', $_POST)!== false){
			$vehicleLoanType=$_POST['vehicleLoanTypes'];//可接受车贷类型
		}else{	
			$vehicleLoanType="押证不押车 | 不押证不押车 | 都可以";
		}	
//`licensePlateProvince` text NOT NULL COMMENT '车牌省',
if(array_key_exists('licensePlateProvinceone', $_POST)!== false){
	if(strpos($_POST['licensePlateProvinces'],'全国') !== false){
		$licensePlateProvince="北京市 | 天津市 | 上海市 | 重庆市 | 河北省 | 山西省 | 辽宁省 | 吉林省 | 黑龙江省 | 江苏省 | 浙江省 | 安徽省 | 福建省 | 江西省 | 山东省 | 河南省 | 湖北省 | 湖南省 | 广东省 | 海南省 | 四川省 | 贵州省 | 云南省 | 陕西省 | 甘肃省 | 青海省 | 台湾省 | 内蒙古自治区 | 广西壮族自治区 | 西藏自治区 | 宁夏回族自治区 | 新疆维吾尔自治区 | 香港特别行政区 | 澳门特别行政区";
	}else{
		$licensePlateProvince=$_POST['licensePlateProvinces'];//车牌省
	}
			
		}else{	
			$licensePlateProvince="全国| 北京市 | 天津市 | 上海市 | 重庆市 | 河北省 | 山西省 | 辽宁省 | 吉林省 | 黑龙江省 | 江苏省 | 浙江省 | 安徽省 | 福建省 | 江西省 | 山东省 | 河南省 | 湖北省 | 湖南省 | 广东省 | 海南省 | 四川省 | 贵州省 | 云南省 | 陕西省 | 甘肃省 | 青海省 | 台湾省 | 内蒙古自治区 | 广西壮族自治区 | 西藏自治区 | 宁夏回族自治区 | 新疆维吾尔自治区 | 香港特别行政区 | 澳门特别行政区";
		}	
//`vehicleUse` text NOT NULL COMMENT '汽车用途',
if(array_key_exists('vehicleUseone', $_POST)!== false){
			$vehicleUse=$_POST['vehicleUses'];//汽车用途
		}else{	
			$vehicleUse="运营车 | 自用车 | 非运营 | 商用车 | 其他";
		}	
//`vehiclePrice` text NOT NULL COMMENT '汽车价格',
if(array_key_exists('vehiclePriceone', $_POST)!== false){
			$vehiclePrice=$_POST['vehiclePrices'];//汽车价格
		}else{	
			$vehiclePrice="8万以下 | 8~15万 | 15万以上";
		}	
//`vehicleAge` text NOT NULL COMMENT '车龄',
if(array_key_exists('vehicleAgeone', $_POST)!== false){
			$vehicleAge=$_POST['vehicleAges'];//车龄
		}else{	
			$vehicleAge="半年内 | 半年~8年 | 8年以上";
		}	
		
//`vehicleInsurance` text NOT NULL COMMENT '汽车保险',
if(array_key_exists('vehicleInsuranceone', $_POST)!== false){
			$vehicleInsurance=$_POST['vehicleInsurances'];//汽车保险
		}else{	
			$vehicleInsurance="车主、车险投保人不同或不是本人 | 车主、车险投保人为本人 | 其他";
		}	
//`vehicleInsuranceLimit` text NOT NULL COMMENT '车险额度',
if(array_key_exists('vehicleInsuranceLimitone', $_POST)!== false){
			$vehicleInsuranceLimit=$_POST['vehicleInsuranceLimits'];//车险额度
		}else{	
			$vehicleInsuranceLimit="车险保额8万以下 | 车险保额8万以上";
		}	
//`insuranceName` text NOT NULL COMMENT '保险公司',
if(array_key_exists('insuranceNameone', $_POST)!== false){
			$insuranceName=$_POST['insuranceNames'];//保险公司
		}else{	
			$insuranceName="中国人寿 | 中国平安 | 新华保险 | 泰康保险 | 太平洋保险 | 太平保险 | 中国人保 | 阳光保险 | 友邦保险 | 生命人寿 | 中国人民保险 | 人保健康人寿 | 富徳生命人寿 | 大都会人寿 | 工银安盛人寿 | 安联人寿 | 中英人寿 | 天安人寿 | 华夏人寿 | 中邮人寿 | 中荷人寿 | 招商信诺 | 中意人寿 | 中宏保险 | 中德安联保险 | 信泰保险 | 建信保险 | 利安人寿 | 陆家嘴人寿 | 农银人寿 | 华泰人寿 | 合众人寿 | 国华人寿 | 光大永明人寿 | 长城人寿 | 同方全球人寿 | 恒安标准人寿 | 恒大保险 | 东吴人寿 | 幸福人寿 | 吉祥人寿 | 中银三星人寿 | 君龙人寿 | 百年人寿 | 北大方正人寿 | 长生人寿 | 珠江人寿 | 信诚人寿 | 前海人寿 | 其他";
		}	
//`insuranceType` text NOT NULL COMMENT '保单类型',
if(array_key_exists('insuranceTypeone', $_POST)!== false){
			$insuranceType=$_POST['insuranceTypes'];//保单类型
		}else{	
			$insuranceType="传统型 | 分红型 | 万能型 | 其他";
		}	
//`insuranceTime` text NOT NULL COMMENT '保单有效时间',
if(array_key_exists('insuranceTimeone', $_POST)!== false){
			$insuranceTime=$_POST['insuranceTimes'];//保单有效时间
		}else{	
			$insuranceTime="不足6个月 | 大于等于6个月 | 大于等于9个月 | 其他";
		}	
//`insurancePaymentMethod` text NOT NULL COMMENT '保单缴费方式',
if(array_key_exists('insurancePaymentMethodone', $_POST)!== false){
			$insurancePaymentMethod=$_POST['insurancePaymentMethods'];//职业
		}else{	
			$insurancePaymentMethod="趸缴 | 年缴 | 季度缴 | 月缴";
		}	
//`insuranceAgeLimit` text NOT NULL COMMENT '保单已缴费年限',
if(array_key_exists('insuranceAgeLimitone', $_POST)!== false){
			$insuranceAgeLimit=$_POST['insuranceAgeLimits'];//职业
		}else{	
			$insuranceAgeLimit="1年 | 2年 | 3年 | 3年以上";
		}	
//`insurancePrice` text NOT NULL COMMENT '保单单次缴费',
if(array_key_exists('insurancePriceone', $_POST)!== false){
			$insurancePrice=$_POST['insurancePrices'];//职业
		}else{	
			$insurancePrice="月缴≥200元 | 月缴≥300元 | 月缴≥500元 | 年缴≥2400元 | 其他";
		}	
//`income` text NOT NULL COMMENT '个人或企业流水',
if(array_key_exists('incomeone', $_POST)!== false){
			$income=$_POST['incomes'];//职业
		}else{	
			$income="代发2000以上  |  代发3000以上 | 代发5000以上 | 代发8000以上 | 现金3000以上 | 现金5000以上 | 现金8000以上 | 月流水10万以内 | 月流水10万~50万 | 月流水50万以上";
		}	
//`company` text NOT NULL COMMENT '公司',
if(array_key_exists('companyone', $_POST)!== false){
			$company=$_POST['companys'];//职业
		}else{	
			$company="无 | 法人是自己营业执照满一年 | 法人是自己营业执照未满一年 | 股东且营业执照满一年 | 股东且营业执照未满一年";
		}	
//`tax` text NOT NULL COMMENT '个税缴纳情况',
if(array_key_exists('taxone', $_POST)!== false){
			$tax=$_POST['taxs'];//职业
		}else{	
			$tax="无 | 连续申报缴纳不足12个月 | 连续申报缴纳12个月以内 | 连续申报缴纳12个月以上且近2月内有缴";
		}	
//`seniority` text NOT NULL COMMENT '工龄',
if(array_key_exists('seniorityone', $_POST)!== false){
			$seniority=$_POST['senioritys'];//工龄
		}else{	
			$seniority="现职工作6个月以上 | 现职工作不足6个月 | 其他";
		}	
//`creditLimit` text NOT NULL COMMENT '信用卡总额度',
if(array_key_exists('creditLimitone', $_POST)!== false){
			$creditLimit=$_POST['creditLimits'];//信用卡总额度
		}else{	
			$creditLimit="无信用卡 | 10万以下 | 10万以上";
		}	
//`zhimaCredit` text NOT NULL COMMENT '芝麻信用',
if(array_key_exists('zhimaCreditone', $_POST)!== false){
			$zhimaCredit=$_POST['zhimaCredits'];//芝麻信用
		}else{	
			$zhimaCredit="无 | 600以下 | 600~680 | 680~750 | 750以上";
		}	
//`tinyGrainLoan` text NOT NULL COMMENT '微粒贷',
if(array_key_exists('tinyGrainLoanone', $_POST)!== false){
			$tinyGrainLoan=$_POST['tinyGrainLoans'];//微粒贷
		}else{	
			$tinyGrainLoan="无 | 8000元以下 | 8000~10000元 | 10000元以上";
		}	
//`education` text NOT NULL COMMENT '学历',
if(array_key_exists('educationone', $_POST)!== false){
			$education=$_POST['educations'];//学历
		}else{	
			$education="专科 | 非全日制本科 | 全日制本科 | 研究生 | 博士 | 其他";
		}	

$datas = [	
			'vehicleAge'=>$vehicleAge,
  			'goodid' =>$good_id,
			'sex' =>$sex,
			'ageMax' =>$ageMax,
			'ageMin' =>$ageMin,
			'profession' =>$profession,
			'credit' =>$credit,
			'liabilities' =>$liabilities,
			'socialSecurity' =>$socialSecurity,
			'socialSecurityBasics' =>$socialSecurityBasics,
			'accumulationFund' =>$accumulationFund,
			'accumulationFundBasics' =>$accumulationFundBasics,
			'houseBuyType' =>$houseBuyType,
			'houseCity' =>$houseCity,
			'houseArea' =>$houseArea,
			'houseValue' =>$houseValue,
			'houseType' =>$houseType,
			'vehicleBuyType' =>$vehicleBuyType,
			'vehicleLoanType' =>$vehicleLoanType,
			'licensePlateProvince' =>$licensePlateProvince,
			'vehicleUse' =>$vehicleUse,
			'vehiclePrice' =>$vehiclePrice,
			'vehicleInsurance' =>$vehicleInsurance,
			'vehicleInsuranceLimit' =>$vehicleInsuranceLimit,
			'insuranceName' =>$insuranceName,
			'insuranceType' =>$insuranceType,
			'insuranceTime' =>$insuranceTime,
			'insurancePaymentMethod' =>$insurancePaymentMethod,
			'insuranceAgeLimit' =>$insuranceAgeLimit,
			'insurancePrice' =>$insurancePrice,
			'income' =>$income,
			'company' =>$company,
			'tax' =>$tax,
			'seniority' =>$seniority,
			'creditLimit' =>$creditLimit,
			'zhimaCredit' =>$zhimaCredit,
			'tinyGrainLoan' =>$tinyGrainLoan,
			'education' =>$education
			];
		$goods = db('goods')->insert($datas);
		if($goods){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('添加成功', 'good/show');
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('添加失败');
	        }

			}
$qianxian=Session::get('qianxian','think');
if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
	}elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			$map['city']=['like',"%广州%"];
}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){			
			$map['city']=['like',"%杭州%"];
	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$map['city']=['like',"%深圳%"];		
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$map['city']=['like',"%珠海%"];
	}	
		$list = db('bank')->where($map)->where('b_id','>',0)->order('rank desc')->select();	
        $this->assign('list', $list);
        
   		 $insurance = db('insurance')->select();	
        $this->assign('insurance', $insurance);
        return $this->fetch();
	}
	
	public function upd()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }
	$qianxian=Session::get('qianxian','think');

		
		if(request()->isPost()){
			$good_id=$_POST['good_id'];
			$bankid=$_POST['bankid'];//机构id
			$bank = db('bank')->where('b_id',$bankid)->find();	
			$goodtype=$_POST['goodtype'];//1为房信用 2为车信用，3为保单信用，4公积金信用,5个人与企业信息
			$ratio=$_POST['ratio'];//排序数字越小越前（普通产品利率1%就写100有合作的客户1%就写10）
			$goodName=$_POST['goodName'];//产品名
			$cityName=$bank['city'];//城市
	
			$label=$_POST['labels'];//标签
			$agelimit=$_POST['agelimit'];//年限
			$accrual=$_POST['accrual'];//利息比
			$limit=$_POST['limit'];//额度
		
			$condition=$_POST['condition'];//申请条件
			$datum=$_POST['datum'];//准备资料
			$notice=$_POST['notice'];//注意事项
			$addtime=time();//添加时间
			$popularity=$_POST['popularity'];//人气
			$maxLimit=$_POST['maxLimit'];//最高额度（万）
			$successRate=$_POST['successRate'];//成功率{%}
			
//			var_dump($_POST);die();
			$data = [
			'ratio'=>$ratio,
  			'goodName' =>$goodName,
			'bankid' =>$bankid,
			'goodtype' =>$goodtype,
			'cityName' =>$cityName,
			'popularity'=>$popularity,
			'maxLimit'=>$maxLimit,
			'successRate'=>$successRate,
			'label' =>$label,
			'agelimit' =>$agelimit,
			'accrual' =>$accrual,
			'limit' =>$limit,
			'condition' =>$condition,
			'datum' =>$datum,
			'notice' =>$notice,
			'addtime' =>$addtime
			];
			$goodupd = db('good')->where('good_id',$good_id)->update($data);

		

		if($goodupd){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('修改成功', 'good/show');
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }

			}

		$good_id=$_GET['good_id'];
		$lists = db('good')
		->join('bank','bankid = ba_bank.b_id','left')
		->field('good_id,bankid,goodtype,goodName,putaway,hot,label,agelimit,accrual,condition,datum,notice,limit,ba_bank.bankname,ba_bank.city,ratio,popularity,maxLimit,successRate')
		->where('good_id',$good_id)
		->find();		
$qianxian=Session::get('qianxian','think');
if($qianxian=='管理员' || $qianxian=='总经理' || $qianxian=='总部助理' ){
			$map='';
		}
elseif($qianxian=='广州经理' || $qianxian=='广州助理'){
			$map['city']=['like',"%广州%"];
}elseif($qianxian=='杭州经理' || $qianxian=='杭州助理'){			
			$map['city']=['like',"%杭州%"];
	}elseif($qianxian=='深圳经理' || $qianxian=='深圳助理'){
			$map['city']=['like',"%深圳%"];		
	}elseif($qianxian=='珠海经理' || $qianxian=='珠海助理'){
			$map['city']=['like',"%珠海%"];
	}	
		$list = db('bank')->where($map)->where('b_id','>',0)->order('rank desc')->select();	
        $this->assign('list', $list);
        $this->assign('lists', $lists);

        return $this->fetch();
	}
	
	
		public function bupd()
	{
		
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }


	
		if(request()->isPost()){
					$file = request()->file('img');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();

            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
//            //获取当前控制器名称
//
//            $controllerName=$this->getContro();

            // 上传到七牛后保存的文件名
            $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
//            require_once APP_APP_VIR . '/../vendor/qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'ZzQu0_1dTgSOZT5unMqrAxNC8NyvfQFosJowZ8zG';
            $secretKey = 'PsMaLHUhufgFvGTnU_X_s0dcCcZQyny4WI0bz-Ad';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = 'bank8';
            $domain = 'https://zykj.8haoqianzhuang.cn/';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            
            if ($err !== null) {
                $this->error('上传头像失败');
            } else {
                //返回图片的完整URL
                $logo=$domain . $ret['key'];//银行logo
            }
$bankname=$_POST['bankname'];//银行名
 $rank=$_POST['rank'];//排序
 $city=$_POST['city'];//所在城市
$id=$_POST['id'];
$adddata=['logo'=>$logo,'bankname'=>$bankname,'rank'=>$rank,'city'=>$city,'addtime'=>time()];
		
$bankupd=db('bank')->where('b_id',$id)->update($adddata);

				if($bankupd){
		            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		            $this->success('修改成功', 'good/bank');
		        } else {
		            //错误页面的默认跳转页面是返回前一页，通常不需要设置
		            $this->error('修改失败');
		        }
			}
			
		
	
		$id=$_GET['id'];
		$list=db('bank')->where('b_id',$id)->find();
		$this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
        
	}
	




public function upds()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

		
	if(request()->isPost()){
//	var_dump($_POST);die();
		$goods_id=$_POST['goods_id'];
		$good_id=$_POST['good_id'];
		$sex=$_POST['sexs'];
		$ageMax=$_POST['ageMax'];//最大年龄
		$ageMin=$_POST['ageMin'];//最小年龄
		$profession=$_POST['professions'];//职业
		$credit=$_POST['credits'];//征信查询
		$liabilities=$_POST['liabilitiess'];//个人负债
		$socialSecurity=$_POST['socialSecuritys'];//社保
		$socialSecurityBasics=$_POST['socialSecurityBasicss'];//社保基数
		$accumulationFund=$_POST['accumulationFunds'];//公积金
		$accumulationFundBasics=$_POST['accumulationFundBasicss'];//公积金基数
		$houseBuyType=$_POST['houseBuyTypes'];//房产购置方式
		if(strpos($_POST['houseCitys'],'全国') !== false){
			$houseCity="全国 | 北京市	| 东莞市	| 广州市	| 中山市	| 深圳市	| 惠州市	| 江门市	| 珠海市	| 汕头市	| 佛山市	| 湛江市	| 河源市	| 肇庆市	| 潮州市	| 清远市	| 韶关市	| 揭阳市	| 阳江市	| 云浮市	| 茂名市	| 梅州市	| 汕尾市　| 济南市	| 青岛市	| 临沂市	| 济宁市	| 菏泽市	| 烟台市	| 泰安市	| 淄博市	| 潍坊市	| 日照市	| 威海市	| 滨州市	| 东营市	| 聊城市	| 德州市	| 莱芜市	| 枣庄市　	| 苏州市	| 徐州市	| 盐城市	| 无锡市	| 南京市	| 南通市	| 连云港市	| 常州市	| 扬州市	| 镇江市	| 淮安市	| 泰州市	| 宿迁市　	| 郑州市	| 南阳市	| 新乡市	| 安阳市	| 洛阳市	| 信阳市	| 平顶山市	| 周口市	| 商丘市	| 开封市	| 焦作市	| 驻马店市	| 濮阳市	| 三门峡市	| 漯河市	| 许昌市	| 鹤壁市	| 济源市　| 上海市	| 石家庄市	| 唐山市	| 保定市	| 邯郸市	| 邢台市	| 河北区	| 沧州市	| 秦皇岛市	| 张家口市	| 衡水市	| 廊坊市	| 承德市　| 温州市	| 宁波市	| 杭州市	| 台州市	| 嘉兴市	| 金华市	| 湖州市	| 绍兴市	| 舟山市	| 丽水市	| 衢州市　| 香港特别行政区	| 西安市	| 咸阳市	| 宝鸡市	| 汉中市	| 渭南市	| 安康市	| 榆林市	| 商洛市	| 延安市	| 铜川市　| 长沙市	| 邵阳市	| 常德市	| 衡阳市	| 株洲市	| 湘潭市	| 永州市	| 岳阳市	| 怀化市	| 郴州市	| 娄底市	| 益阳市	| 张家界市	| 湘西州　	| 江北区	| 漳州市	| 泉州市	| 厦门市	| 福州市	| 莆田市	| 宁德市	| 三明市	| 南平市	| 龙岩市　	| 和平区	| 昆明市	| 红河州	| 大理州	| 文山州	| 德宏州	| 曲靖市	| 昭通市	| 楚雄州	| 保山市	| 玉溪市	| 丽江地区	| 临沧地区	| 思茅地区	| 西双版纳州	| 怒江州	| 迪庆州　	| 成都市	| 绵阳市	| 广元市	| 达州市	| 南充市	| 德阳市	| 广安市	| 阿坝州	| 巴中市	| 遂宁市	| 内江市	| 凉山州	| 攀枝花市	| 乐山市	| 自贡市	| 泸州市	| 雅安市	| 宜宾市	| 资阳市	| 眉山市	| 甘孜州　	| 贵港市	| 玉林市	| 北海市	| 南宁市	| 柳州市	| 桂林市	| 梧州市	| 钦州市	| 来宾市	| 河池市	| 百色市	| 贺州市	| 崇左市	| 防城港市　	| 芜湖市	| 合肥市	| 六安市	| 宿州市	| 阜阳市	| 安庆市	| 马鞍山市	| 蚌埠市	| 淮北市	| 淮南市	| 宣城市	| 黄山市	| 铜陵市	| 亳州市	| 池州市	| 巢湖市	| 滁州市　	| 三亚市	| 海口市	| 琼海市	| 文昌市	| 东方市	| 昌江县	| 陵水县	| 乐东县	| 五指山市	| 保亭县	| 澄迈县	| 万宁市	| 儋州市	| 临高县	| 白沙县	| 定安县	| 琼中县	| 屯昌县　	| 南昌市	| 赣州市	| 上饶市	| 吉安市	| 九江市	| 新余市	| 抚州市	| 宜春市	| 景德镇市	| 萍乡市	| 鹰潭市　	| 武汉市	| 宜昌市	| 襄樊市	| 荆州市	| 恩施州	| 孝感市	| 黄冈市	| 十堰市	| 咸宁市	| 黄石市	| 仙桃市	| 随州市	| 天门市	| 荆门市	| 潜江市	| 鄂州市	| 神农架林区　	| 太原市	| 大同市	| 运城市	| 长治市	| 晋城市	| 忻州市	| 临汾市	| 吕梁市	| 晋中市	| 阳泉市	| 朔州市　	| 大连市	| 沈阳市	| 丹东市	| 辽阳市	| 葫芦岛市	| 锦州市	| 朝阳市	| 营口市	| 鞍山市	| 抚顺市	| 阜新市	| 本溪市	| 盘锦市	| 铁岭市　	| 台北市	| 高雄市	| 台中市	| 新竹市	| 基隆市	| 台南市	| 嘉义市　	| 齐齐哈尔市	| 哈尔滨市	| 大庆市	| 佳木斯市	| 双鸭山市	| 牡丹江市	| 鸡西市	| 黑河市	| 绥化市	| 鹤岗市	| 伊春市	| 大兴安岭地区	| 七台河市　	| 赤峰市	| 包头市	| 通辽市	| 呼和浩特市	| 乌海市	| 鄂尔多斯市	| 呼伦贝尔市	| 兴安盟	| 巴彦淖尔盟	| 乌兰察布盟	| 锡林郭勒盟	| 阿拉善盟　	| 澳门特别行政区	| 贵阳市	| 黔东南州	| 黔南州	| 遵义市	| 黔西南州	| 毕节地区	| 铜仁地区	| 安顺市	| 六盘水市　	| 兰州市	| 天水市	| 庆阳市	| 武威市	| 酒泉市	| 张掖市	| 陇南地区	| 白银市	| 定西地区	| 平凉市	| 嘉峪关市	| 临夏回族自治州	| 金昌市	| 甘南州　	| 西宁市	| 海西州	| 海东地区	| 海北州	| 果洛州	| 玉树州	| 黄南藏族自治州　	| 乌鲁木齐市	| 伊犁州	| 昌吉州	| 石河子市	| 哈密地区	| 阿克苏地区	| 巴音郭楞州	| 喀什地区	| 塔城地区	| 克拉玛依市	| 和田地区	| 阿勒泰州	| 吐鲁番地区	| 阿拉尔市	| 博尔塔拉州	| 五家渠市	| 克孜勒苏州	| 图木舒克市　	| 拉萨市	| 山南地区	| 林芝地区	| 日喀则地区	| 阿里地区	| 昌都地区	| 那曲地区　	| 吉林市	| 长春市	| 白山市	| 白城市	| 延边州	| 松原市	| 辽源市	| 通化市	| 四平市　	| 银川市	| 吴忠市	| 中卫市	| 石嘴山市	| 固原市	";
		}else{
			$houseCity=$_POST['houseCitys'];//房产城市	
		}				
	$houseArea=$_POST['houseAreas'];//房产面积
	$houseValue=$_POST['houseValues'];//房产估值		
	$houseType=$_POST['houseTypes'];//房产类型
	$vehicleBuyType=$_POST['vehicleBuyTypes'];//职业
	$vehicleLoanType=$_POST['vehicleLoanTypes'];//可接受车贷类型
	if(strpos($_POST['licensePlateProvinces'],'全国') !== false){
		$licensePlateProvince="全国|北京市 | 天津市 | 上海市 | 重庆市 | 河北省 | 山西省 | 辽宁省 | 吉林省 | 黑龙江省 | 江苏省 | 浙江省 | 安徽省 | 福建省 | 江西省 | 山东省 | 河南省 | 湖北省 | 湖南省 | 广东省 | 海南省 | 四川省 | 贵州省 | 云南省 | 陕西省 | 甘肃省 | 青海省 | 台湾省 | 内蒙古自治区 | 广西壮族自治区 | 西藏自治区 | 宁夏回族自治区 | 新疆维吾尔自治区 | 香港特别行政区 | 澳门特别行政区";
	}else{
		$licensePlateProvince=$_POST['licensePlateProvinces'];//车牌省
	}
	$vehicleUse=$_POST['vehicleUses'];//汽车用途		
	$vehiclePrice=$_POST['vehiclePrices'];//汽车价格	
	$vehicleAge=$_POST['vehicleAges'];//车龄		
	$vehicleInsurance=$_POST['vehicleInsurances'];//汽车保险
	$vehicleInsuranceLimit=$_POST['vehicleInsuranceLimits'];//车险额度
	$insuranceName=$_POST['insuranceNames'];//保险公司
	$insuranceType=$_POST['insuranceTypes'];//保单类型
	$insuranceTime=$_POST['insuranceTimes'];//保单有效时间	
	$insurancePaymentMethod=$_POST['insurancePaymentMethods'];//职业		
	$insuranceAgeLimit=$_POST['insuranceAgeLimits'];//职业
	$insurancePrice=$_POST['insurancePrices'];//职业		
	$income=$_POST['incomes'];//职业		
	$company=$_POST['companys'];//职业		
	$tax=$_POST['taxs'];//职业		
	$seniority=$_POST['senioritys'];//工龄
	$creditLimit=$_POST['creditLimits'];//信用卡总额度		
	$zhimaCredit=$_POST['zhimaCredits'];//芝麻信用		
	$tinyGrainLoan=$_POST['tinyGrainLoans'];//微粒贷		
	$education=$_POST['educations'];//学历
		
$datas = [	
			'vehicleAge'=>$vehicleAge,
  			'goodid' =>$good_id,
			'sex' =>$sex,
			'ageMax' =>$ageMax,
			'ageMin' =>$ageMin,
			'profession' =>$profession,
			'credit' =>$credit,
			'liabilities' =>$liabilities,
			'socialSecurity' =>$socialSecurity,
			'socialSecurityBasics' =>$socialSecurityBasics,
			'accumulationFund' =>$accumulationFund,
			'accumulationFundBasics' =>$accumulationFundBasics,
			'houseBuyType' =>$houseBuyType,
			'houseCity' =>$houseCity,
			'houseArea' =>$houseArea,
			'houseValue' =>$houseValue,
			'houseType' =>$houseType,
			'vehicleBuyType' =>$vehicleBuyType,
			'vehicleLoanType' =>$vehicleLoanType,
			'licensePlateProvince' =>$licensePlateProvince,
			'vehicleUse' =>$vehicleUse,
			'vehiclePrice' =>$vehiclePrice,
			'vehicleInsurance' =>$vehicleInsurance,
			'vehicleInsuranceLimit' =>$vehicleInsuranceLimit,
			'insuranceName' =>$insuranceName,
			'insuranceType' =>$insuranceType,
			'insuranceTime' =>$insuranceTime,
			'insurancePaymentMethod' =>$insurancePaymentMethod,
			'insuranceAgeLimit' =>$insuranceAgeLimit,
			'insurancePrice' =>$insurancePrice,
			'income' =>$income,
			'company' =>$company,
			'tax' =>$tax,
			'seniority' =>$seniority,
			'creditLimit' =>$creditLimit,
			'zhimaCredit' =>$zhimaCredit,
			'tinyGrainLoan' =>$tinyGrainLoan,
			'education' =>$education
			];
			
			
		$goods = db('goods')->where('goods_id',$goods_id)->update($datas);
		
	
    
		if($goods){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('修改成功', '/index.php/back/good/upd?good_id='.$good_id);
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }

			}
		$id=$_GET['id'];	
		$list = db('goods')->where('goodid',$id)->find();
		$listss = db('good')->where('good_id',$id)->find();	
		
        $this->assign('list', $list);
		$this->assign('listss', $listss);
		
		$insurance = db('insurance')->select();	
		

        $this->assign('insurance', $insurance);
		
        return $this->fetch();
	}



public function updsdd()
	{
	if(Session::has('name')==null){
     		 $this->success('请登陆', 'index/login');
    }

		
	if(request()->isPost()){
		$goods_pair_id=$_POST['goods_pair_id'];
		$good_id=$_POST['good_id'];
		$educationGood=$_POST['educationGoods'];//学历0为本科以下2为本科以上
		
		$educationGood=$_POST['educationGoods'];//学历0为本科以下2为本科以上
		$weilidaiGood=$_POST['weilidaiGoods'];//微粒贷1有2无0空
		$occupationGood=$_POST['occupationGoods'];//职业1为上班族2为生意人
		$socialSecurityGood=$_POST['socialSecurityGoods'];//社保，0为没填，1为有，2无
		$accumulationFundGood=$_POST['accumulationFundGoods'];//公积金，0为没填，1为有，2为无
		$salaryGood=$_POST['salaryGoods'];//工资，0没填，1为5000以下，2为5000以上
		$licenseGood=$_POST['licenseGoods'];//执照，0为没填，1为有，2为无
		$runningWaterGood=$_POST['runningWaterGoods'];//流水，0没填，1为50万以下，2为50万以上
		$houseTypeGood=$_POST['houseTypeGoods'];//房产类型，0为没填，1为商品房，2为其它
		$houseBuyGood=$_POST['houseBuyGoods'];//房产购置方式，0没填，1全款，2月供
		$propertyValuesGood=$_POST['propertyValuesGoods'];//房产价值，0没填，1为80万以下，80万以上（全款特有）
		$monthlyPaymentGood=$_POST['monthlyPaymentGoods'];//房产月供额，0为没填，1为5000以下，2为5000以上
		$insuranceTypeGood=$_POST['insuranceTypeGoods'];//保单类型,0为没填，1为传统型，2为分红型
		$insurancePaymentMethodGood=$_POST['insurancePaymentMethodGoods'];//保单缴费方式，0为没填，1为年缴，2为月缴
		$insuranceAgeLimitGood=$_POST['insuranceAgeLimitGoods'];//保单缴费年限，0为没填，1为3年以下，2为3年以上
		$vehicleBuyTypeGood=$_POST['vehicleBuyTypeGoods'];//汽车购置方式，0为没填，1为全款，2为月供
		$minVehiclePriceGood=$_POST['minVehiclePriceGoods'];//最低汽车价格
		$vehicleAgeGood=$_POST['vehicleAgeGoods'];//车龄，0为没填，1为8年以下，2为8年以上
		
		$datdda = [
			
			'educationGood'=>$educationGood,
			'weilidaiGood'=>$weilidaiGood,
			'occupationGood'=>$occupationGood,
			'socialSecurityGood'=>$socialSecurityGood,
			'accumulationFundGood'=>$accumulationFundGood,
			'salaryGood'=>$salaryGood,
			'licenseGood'=>$licenseGood,
			'runningWaterGood'=>$runningWaterGood,
			'houseTypeGood'=>$houseTypeGood,
			'houseBuyGood'=>$houseBuyGood,
			'propertyValuesGood'=>$propertyValuesGood,
			'monthlyPaymentGood'=>$monthlyPaymentGood,
			'insuranceTypeGood'=>$insuranceTypeGood,
			'insurancePaymentMethodGood'=>$insurancePaymentMethodGood,
			'insuranceAgeLimitGood'=>$insuranceAgeLimitGood,
			'vehicleBuyTypeGood'=>$vehicleBuyTypeGood,
			'minVehiclePriceGood'=>$minVehiclePriceGood,
			'vehicleAgeGood'=>$vehicleAgeGood
	
			];

			
		$goods = db('goods_pair')->where('goods_pair_id',$goods_pair_id)->update($datdda);
		
	
    
		if($goods){
	            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
	            $this->success('修改成功', '/index.php/back/good/upd?good_id='.$good_id);
	        } else {
	            //错误页面的默认跳转页面是返回前一页，通常不需要设置
	            $this->error('修改失败');
	        }

			}
		$id=$_GET['id'];	
		$list = db('goods_pair')->where('good_id',$id)->find();
		$listss = db('good')->where('good_id',$id)->find();	
		
        $this->assign('list', $list);
		$this->assign('listss', $listss);

        return $this->fetch();
	}


}




?>