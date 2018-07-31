<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;
use think\Cache;



    //聚合数据新闻类
    class News extends Index
    {

      //新闻控制器
      public function finance()
      {

        $type = 'caijing';//新闻类型
   			$appkey = "d55f46972e2ef4554e1feb433361c907";
  			$url = "http://v.juhe.cn/toutiao/index";
  			$params = array(
  			      	"key" => $appkey,//应用APPKEY(应用详细页查询)
  			      	"type" => "$type",//请求参数

  			);
  			$paramstring = http_build_query($params);
  			$car=model('CarModel');
  			$content = $car->juhecurl($url,$paramstring);
  			$result = json_decode($content,true);







     //    $uniquekey = $result['result']['data']['0']["uniquekey"];//key
     //    $title = $result['result']['data']['0']["title"];//标题
     //    $url = $result['result']['data']['0']["url"];//文章URL
     //    $category = $result['result']['data']['0']["category"];//新闻类型
     //    $date = $result['result']['data']['0']["date"];//新闻日期
     //    $author_name = $result['result']['data']['0']["author_name"];//新闻来源
     //    $thumbnail_pic_a = $result['result']['data']['0']["thumbnail_pic_s"];//图片地址1
     //    $thumbnail_pic_b = $result['result']['data']['0']["thumbnail_pic_s02"];//图片地址2
     //    $thumbnail_pic_c = $result['result']['data']['0']["thumbnail_pic_s03"];//图片地址3



     //    $uniquekey1 = $result['result']['data']['1']["uniquekey"];//key
     //    $title1 = $result['result']['data']['1']["title"];//标题
     //    $url1 = $result['result']['data']['1']["url"];//文章URL
     //    $category1 = $result['result']['data']['1']["category"];//新闻类型
     //    $date1 = $result['result']['data']['1']["date"];//新闻日期
     //    $author_name1 = $result['result']['data']['1']["author_name"];//新闻来源
     //    $thumbnails1 = $result['result']['data']['1']["thumbnail_pic_s"];//图片地址1
     //    $thumbnaila1 = $result['result']['data']['1']["thumbnail_pic_s02"];//图片地址2
     //    $thumbnailz1 = $result['result']['data']['1']["thumbnail_pic_s03"];//图片地址3


     //     if ($result['result']['data']['1']["thumbnail_pic_s02"] && $result['result']['data']['1']["thumbnail_pic_s03"] == " ") {

     //          $thumbnaila1 = 'http://09.imgmini.eastday.com/mobile/20180327/20180327143643_e954713404a574178229497b1e397d18_2_mwpm_03200403.jpg';//图片地址2
     //          $thumbnailz1 = 'http://09.imgmini.eastday.com/mobile/20180327/20180327143643_e954713404a574178229497b1e397d18_2_mwpm_03200403.jpg';//图片地址3

     //    }




     //    $uniquekey2 = $result['result']['data']['2']["uniquekey"];//key
     //    $title2 = $result['result']['data']['2']["title"];//标题
     //    $url2 = $result['result']['data']['2']["url"];//文章URL
     //    $category2 = $result['result']['data']['2']["category"];//新闻类型
     //    $date2 = $result['result']['data']['2']["date"];//新闻日期
     //    $author_name2 = $result['result']['data']['2']["author_name"];//新闻来源
     //    $thumbnails2 = $result['result']['data']['2']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila2 = $result['result']['data']['2']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz2 = $result['result']['data']['2']["thumbnail_pic_s03"];//图片地址3


     //    $uniquekey3 = $result['result']['data']['3']["uniquekey"];//key
     //    $title3 = $result['result']['data']['3']["title"];//标题
     //    $url3 = $result['result']['data']['3']["url"];//文章URL
     //    $category3 = $result['result']['data']['3']["category"];//新闻类型
     //    $date3 = $result['result']['data']['3']["date"];//新闻日期
     //    $author_name3 = $result['result']['data']['3']["author_name"];//新闻来源
     //    $thumbnails3 = $result['result']['data']['3']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila3 = $result['result']['data']['3']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz3 = $result['result']['data']['3']["thumbnail_pic_s03"];//图片地址3



     //    $uniquekey4 = $result['result']['data']['4']["uniquekey"];//key
     //    $title4 = $result['result']['data']['4']["title"];//标题
     //    $url4 = $result['result']['data']['4']["url"];//文章URL
     //    $category4 = $result['result']['data']['4']["category"];//新闻类型
     //    $date4 = $result['result']['data']['4']["date"];//新闻日期
     //    $author_name4 = $result['result']['data']['4']["author_name"];//新闻来源
     //    $thumbnails4 = $result['result']['data']['4']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila4 = $result['result']['data']['4']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz4 = $result['result']['data']['4']["thumbnail_pic_s03"];//图片地址3




     //   $data = [
     //   'uniquekey' =>$uniquekey,
     //   'title' => $title,
     //   'url' => $url,
     //   'category' => $category,
     //   'date' => $date,
     //   'author_name' => $author_name,
     //   'thumbnail_pic_a' => $thumbnail_pic_a,
     //   'thumbnail_pic_b' => $thumbnail_pic_b,
     //   'thumbnail_pic_c' => $thumbnail_pic_c,

     //   'uniquekey' =>$uniquekey1,
     //   'title' => $title1,
     //   'url' => $url1,
     //   'category' => $category1,
     //   'date' => $date1,
     //   'author_name' => $author_name1,
     //   'thumbnail_pic_a' => $thumbnails1,
     //   'thumbnail_pic_b' => $thumbnaila1,
     //   'thumbnail_pic_c' => $thumbnailz1
     // ];

     // $news = db('news')->insert($data);





      print_r($result);
        // print_r($result['result']['data']['1']);
        // print_r($result['result']['data']['2']);
        // print_r($result['result']['data']['3']);
        // print_r($result['result']['data']['4']);

        // var_dump($result['result']['data']['1']);
        // var_dump($result['result']['data']['2']);die;
         // var_dump($result['result']);die;
  			if($result){
  			    if($result['error_code']=='0'){
  			    	return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
  			        // print_r($result);
  			    }else{
  			        echo $result['error_code'].":".$result['reason'];
  				    }
  				}else{
  				    echo "请求失败";
  				}

      }

      //新闻控制器
      public function sport()
      {

        $type = 'tiyu';//新闻类型
        $appkey = "d55f46972e2ef4554e1feb433361c907";
        $url = "http://v.juhe.cn/toutiao/index";
        $params = array(
                "key" => $appkey,//应用APPKEY(应用详细页查询)
                "type" => "$type",//请求参数

        );
        $paramstring = http_build_query($params);
        $car=model('CarModel');
        $content = $car->juhecurl($url,$paramstring);
        $result = json_decode($content,true);







     //    $uniquekey = $result['result']['data']['0']["uniquekey"];//key
     //    $title = $result['result']['data']['0']["title"];//标题
     //    $url = $result['result']['data']['0']["url"];//文章URL
     //    $category = $result['result']['data']['0']["category"];//新闻类型
     //    $date = $result['result']['data']['0']["date"];//新闻日期
     //    $author_name = $result['result']['data']['0']["author_name"];//新闻来源
     //    $thumbnail_pic_a = $result['result']['data']['0']["thumbnail_pic_s"];//图片地址1
     //    $thumbnail_pic_b = $result['result']['data']['0']["thumbnail_pic_s02"];//图片地址2
     //    $thumbnail_pic_c = $result['result']['data']['0']["thumbnail_pic_s03"];//图片地址3



     //    $uniquekey1 = $result['result']['data']['1']["uniquekey"];//key
     //    $title1 = $result['result']['data']['1']["title"];//标题
     //    $url1 = $result['result']['data']['1']["url"];//文章URL
     //    $category1 = $result['result']['data']['1']["category"];//新闻类型
     //    $date1 = $result['result']['data']['1']["date"];//新闻日期
     //    $author_name1 = $result['result']['data']['1']["author_name"];//新闻来源
     //    $thumbnails1 = $result['result']['data']['1']["thumbnail_pic_s"];//图片地址1
     //    $thumbnaila1 = $result['result']['data']['1']["thumbnail_pic_s02"];//图片地址2
     //    $thumbnailz1 = $result['result']['data']['1']["thumbnail_pic_s03"];//图片地址3


     //     if ($result['result']['data']['1']["thumbnail_pic_s02"] && $result['result']['data']['1']["thumbnail_pic_s03"] == " ") {

     //          $thumbnaila1 = 'http://09.imgmini.eastday.com/mobile/20180327/20180327143643_e954713404a574178229497b1e397d18_2_mwpm_03200403.jpg';//图片地址2
     //          $thumbnailz1 = 'http://09.imgmini.eastday.com/mobile/20180327/20180327143643_e954713404a574178229497b1e397d18_2_mwpm_03200403.jpg';//图片地址3

     //    }




     //    $uniquekey2 = $result['result']['data']['2']["uniquekey"];//key
     //    $title2 = $result['result']['data']['2']["title"];//标题
     //    $url2 = $result['result']['data']['2']["url"];//文章URL
     //    $category2 = $result['result']['data']['2']["category"];//新闻类型
     //    $date2 = $result['result']['data']['2']["date"];//新闻日期
     //    $author_name2 = $result['result']['data']['2']["author_name"];//新闻来源
     //    $thumbnails2 = $result['result']['data']['2']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila2 = $result['result']['data']['2']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz2 = $result['result']['data']['2']["thumbnail_pic_s03"];//图片地址3


     //    $uniquekey3 = $result['result']['data']['3']["uniquekey"];//key
     //    $title3 = $result['result']['data']['3']["title"];//标题
     //    $url3 = $result['result']['data']['3']["url"];//文章URL
     //    $category3 = $result['result']['data']['3']["category"];//新闻类型
     //    $date3 = $result['result']['data']['3']["date"];//新闻日期
     //    $author_name3 = $result['result']['data']['3']["author_name"];//新闻来源
     //    $thumbnails3 = $result['result']['data']['3']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila3 = $result['result']['data']['3']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz3 = $result['result']['data']['3']["thumbnail_pic_s03"];//图片地址3



     //    $uniquekey4 = $result['result']['data']['4']["uniquekey"];//key
     //    $title4 = $result['result']['data']['4']["title"];//标题
     //    $url4 = $result['result']['data']['4']["url"];//文章URL
     //    $category4 = $result['result']['data']['4']["category"];//新闻类型
     //    $date4 = $result['result']['data']['4']["date"];//新闻日期
     //    $author_name4 = $result['result']['data']['4']["author_name"];//新闻来源
     //    $thumbnails4 = $result['result']['data']['4']["thumbnail_pic_s"];//图片地址1
     //    // $thumbnaila4 = $result['result']['data']['4']["thumbnail_pic_s02"];//图片地址2
     //    // $thumbnailz4 = $result['result']['data']['4']["thumbnail_pic_s03"];//图片地址3




     //   $data = [
     //   'uniquekey' =>$uniquekey,
     //   'title' => $title,
     //   'url' => $url,
     //   'category' => $category,
     //   'date' => $date,
     //   'author_name' => $author_name,
     //   'thumbnail_pic_a' => $thumbnail_pic_a,
     //   'thumbnail_pic_b' => $thumbnail_pic_b,
     //   'thumbnail_pic_c' => $thumbnail_pic_c,

     //   'uniquekey' =>$uniquekey1,
     //   'title' => $title1,
     //   'url' => $url1,
     //   'category' => $category1,
     //   'date' => $date1,
     //   'author_name' => $author_name1,
     //   'thumbnail_pic_a' => $thumbnails1,
     //   'thumbnail_pic_b' => $thumbnaila1,
     //   'thumbnail_pic_c' => $thumbnailz1
     // ];

     // $news = db('news')->insert($data);





      print_r($result);
        // print_r($result['result']['data']['1']);
        // print_r($result['result']['data']['2']);
        // print_r($result['result']['data']['3']);
        // print_r($result['result']['data']['4']);

        // var_dump($result['result']['data']['1']);
        // var_dump($result['result']['data']['2']);die;
         // var_dump($result['result']);die;
        if($result){
            if($result['error_code']=='0'){
              return json(['state'=>2558,'data'=>$result['result'],'mesg'=>'操作成功']);
                // print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
              }
          }else{
              echo "请求失败";
          }

      }

    }
