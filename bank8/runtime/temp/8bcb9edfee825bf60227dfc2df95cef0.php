<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/finance/fundetails.html";i:1534146483;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo CSST_URL; ?>bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo CSST_URL; ?>fundetails.css">

</head>
<body>
  <div class="color">   
    <div class="container">
      <!--文章标题-->
      <div class="title">
        <h3><?php echo $list['headline']; ?></h3>
      </div>
      
      <div class="small">
        <!-- 发布日期 -->
        <span class="time-left"><?php echo date('Y-m-d H:i:s',$list['addtime']);?></span>
        <!-- 浏览次数 -->
        <span class="read"><img src="<?php echo IMG_URL; ?>look.png" alt="" class="frequency"><?php echo $list['num']; ?></span>
      </div>
      <br>
      <!-- 文章内容 -->
      <div class="content">          
          <?php echo $list['wedtext']; ?>
      </div>

    <div style="border:8px dotted #F0F0F0;background:#F0F0F0; margin-top:10pt;"></div>
      
    <!--主体 container居中-->
    <!-- 推荐阅读 -->
    <div class="container">
        <div class="recommended text-left">
            <h4><img src="" alt="" class="recommendread-img">推荐阅读</h4>
        </div>
        <!-- 图文 -->       
        <!--为3的栅格系统，相对于一行放四个-->  
         <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="fundetails?id=<?php echo $vo['fun_id']; ?>">    
          <div class="recommended-reading">
            <div class="recommended-img  right">
              <img src="<?php echo $vo['picture']; ?>" class="img-responsive" alt=""/>
            </div>
            <div class="recommended-tilie left">
              <!-- 标题 -->
              <h6 style="overflow:hidden; text-overflow:ellipsis;display:-webkit-box; -webkit-box-orient:vertical;-webkit-line-clamp:2; "><?php echo $vo['headline']; ?></h6>                 
            </div>
             
            <div class="bottom">
              <span class="recommended-item"><?php echo date('Y-m-d',$vo['addtime']);?></span>
              <span class="read text-right"><img src="<?php echo IMG_URL; ?>look.png" alt="" class="frequency"><?php echo $vo['num']; ?></span>
            </div>
          </div>
          <hr>
        </a> 
          <?php endforeach; endif; else: echo "" ;endif; ?>                                          
  
      
    </div>

</body>
</html>
