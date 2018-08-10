<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/finance/details.html";i:1525076517;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" /> -->
  <!-- <title>八号钱庄</title> -->
  <link rel="stylesheet" href="<?php echo BACK_CSS_URL; ?>bootstrap.min.css">
  <!-- <link rel="stylesheet" href="./bootstrap-3.3.7/css/bootstrap.min.css" > -->
  <link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>details.css">

  <style type="text/css">
}

  /* .right{float:left;} */
        /* 背景颜色 */
        /* .color{background:#F0F0F0} */
        /* .bg{background:url(./Images/report.png)} */
        /* .left{float: right;}
        .right{float:left;} */
   </style>

</head>
<body>
  <div class="color">
    <div class="container">
      <!--新闻标题-->
      <div class="">
        <h3><?php echo $list["headline"]; ?></h3>
      </div>
      <!-- 右边编辑 -->
      <div class="small text-left">
        <h5><?php echo $list["source"]; ?> <?php echo $list["showtime"]; ?></h5>
      </div><br>

      <!--图片放置-->
      <div class="">
        <div class=" col-md-3 col-sm-12 col-lg-8">
          <a href="#" class="">
            <img src="<?php echo $list["pic"]; ?>" alt="..." class="img-responsive">
          </a>
      </div></br>

      </div>
      <!-- 新闻内容 -->
      <div class="content">
        <p><?php echo $list["webtext"]; ?></p></br>



      </div>
      <br>
      <?php $arr = $list["tag"]; ?>

      <div class="label">
        <a href="javascript:;" class="btn" role="button"><?php echo $ret["0"]; ?></a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;" class="btn" role="button"><?php echo $ret["1"]; ?></a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;" class="btn" role="button"><?php echo $ret["2"]; ?></a>
      </div>
    </div>
    <div style="border:8px dotted #F0F0F0;background:#F0F0F0; margin-top:10pt;"></div>

    <!--主体 container居中-->
    <!-- 相关文章 -->
    <div class="container">
        <div class="small text-left">
            <h4>相关文章</h4><hr>
        </div>
        <!-- 图文 -->
         <!--为3的栅格系统，相对于一行放四个-->
         <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
         <div class="">
             <!--img-thumbnail 方形加外边框-->
             <div class="right">
               <a href="javascript:;" class="img">
                  <img src="<?php echo $vo['picture']; ?>" class="img-thumbnail" alt="8号钱庄"/>
               </a>
             </div>
           <div class="left">
               <!-- 标题 -->
               <a href="details?id=<?php echo $vo['journalism_id']; ?>">
               <h6 style="overflow:hidden; text-overflow:ellipsis;display:-webkit-box; -webkit-box-orient:vertical;-webkit-line-clamp:2; "><?php echo $vo['headline']; ?></h6>
               </a>
           </div>

           <div class="small text-left bottom">
               <p><?php echo $vo['source']; ?> </p>
           </div>
       </div> <hr>
        <?php endforeach; endif; else: echo "" ;endif; ?>


    </div>

</div>
    <!-- jQuery CDN加速 -->
  <!--使用bootstrap.js必须先引入jquery,jquery要在bootstrap.js前面 -->
  <script src="<?php echo BACK_JS_URL; ?>bootstrap.min.js"></script>
  <!-- <script src="./bootstrap-3.3.7/js/bootstrap.min.js"></script> -->
  <!-- <script type="text/javascript">
      $(window).load(function(){

      $(".panel-body img").addClass("img-responsive center-block");
    }) -->
  <!-- </script> -->
</body>
</html>
