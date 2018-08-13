<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/homepage/schooldetailed.html";i:1534129465;}*/ ?>
<!DOCTYPE html>
<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" href="<?php echo CSST_URL; ?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo CSST_URL; ?>school.css">
</head>
<body>
	<div class="container">
		<!-- 文章标题 -->
	    <h1><?php echo $list['headline']; ?></h1>

	    <!-- logo -->
	    <p class="img-text"><img src="<?php echo IMG_URL; ?>school_icon_logo.png">八号钱庄</p>

	    <!-- 发布时间 -->
	    <span class="time"><?php echo date('Y-m-d H:i:s',$list['addtime']);?></span><span class="text-right"><?php echo $list['click']; ?><span class="right">阅读</span></span>

	    <!-- 正文 -->
	    <div class="main">
	    	
	    	
		  <?php echo $list['webtext']; ?>
			
			
			
			
		</div>
		
		<!-- 尾部 -->
		<div class="tail">
			<p class="tail-text">文章来源：八号钱庄</p>
			<p class="tail-text1">©本文为八号钱庄开放平台作者上传并发布，内容来自该作者。</p>

			<div class="button">				
				<button class="satisfied unchecked" id="satisfied" type="radio" name="identity"><img src="<?php echo IMG_URL; ?>school_icon_satisfied.png" alt="" id="school_icon_satisfied">满意</button>
				<button class="dissatisfied unchecked" id="dissatisfied" type="radio" name="identity"><img src="<?php echo IMG_URL; ?>school_icon_diss.png" alt="" id="school_icon_diss">不满意</button>		
			</div>
		</div>
    </div>
    <script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<script type="text/javascript">
	$("#satisfied").click(function(){
            if($(this).hasClass("select")){
                $(this).removeClass("select");
                $('#school_icon_satisfied').attr('src','<?php echo IMG_URL; ?>school_icon_satisfied.png');
            }else{
                $(this).addClass("select");
                $('#school_icon_satisfied').attr('src','<?php echo IMG_URL; ?>school_icon_satisfied1.png');
            }
        });

        $("#dissatisfied").click(function(){
        if($(this).hasClass("select")){

        $(this).removeClass("select");
        $('#school_icon_diss').attr('src','<?php echo IMG_URL; ?>school_icon_diss.png');
        }else{
        $(this).addClass("select");
        $('#school_icon_diss').attr('src','<?php echo IMG_URL; ?>school_icon_diss1.png');
        }
        });

        $("#satisfied").click(function(){
            if($(this).hasClass("select")){
                $("#dissatisfied").removeClass("select");
                $('#school_icon_diss').attr('src','<?php echo IMG_URL; ?>school_icon_diss.png');
            }
        });

        $("#dissatisfied").click(function(){
            if($(this).hasClass("select")){
                $("#satisfied").removeClass("select");
                $('#school_icon_satisfied').attr('src','<?php echo IMG_URL; ?>school_icon_satisfied.png');
            }
        });
</script>
</body>
</html>