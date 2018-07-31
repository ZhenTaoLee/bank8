<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/homepage/schooldetailed.html";i:1531448363;}*/ ?>
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
	    <h1>3步解锁￥10000线上备用金，立即告别钱荒危机</h1>

	    <!-- logo -->
	    <p class="img-text"><img src="<?php echo IMG_URL; ?>school_icon_logo.png">八号钱庄</p>

	    <!-- 发布时间 -->
	    <span class="time">2018-06-14 17:24:56</span><span class="text-right">165497<span class="right">阅读</span></span>

	    <!-- 正文 -->
	    <div class="main">
		    <img src="<?php echo IMG_URL; ?>img.png" alt="..." class="img-responsive">
		    <p>信息被盗用的事情时常发生，常常都是在发生之后我们才后知后觉，那么面对信息被盗用，我们有什么好应对的方法呢？</p>

		    <!-- 副标题 -->
		    <div class=""><h2>如何保护个人信息？</h2></div>
		    <p>1、个人身份证信息、银行卡信息不随意借给他人使用，当身份证丢失时，必须第一时间去前去警局报失！银行卡也是一样。</p>
			<p>2、别轻易听信中介机构可以“洗白”信用记录的谣言，要选择正规的法律程序来解决问题。</p>

			<!-- 副标题 -->
			<div class=""><h2>被盗用信息后该如何补救？</h2></div>
			<p>1、首先，当个人信息确定是被人盗用了。就要先了解是被谁盗用的。然后就是收集被盗用的各种证据，例如证据非本人签署，并且马上申请法律鉴定。</p>
			<p>2、当然与此同时，我们还要积极的联络上盗用我们个人信息的，冒名贷款的当事人，对其进行诉讼。</p>
			<p>3、与办理贷款、信用卡的银行友好协商，如果银行不解决你的问题，则可以以“侵犯公民姓名权”为由起诉银行。</p>
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