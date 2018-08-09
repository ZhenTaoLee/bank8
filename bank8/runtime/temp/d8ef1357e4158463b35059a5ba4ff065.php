<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/service/show.html";i:1531132846;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->


<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	 <form action="" method="get">
  	
  
    
  	<div id="tab2" class="tabson">   
        <ul class="seachform" >
            <li>
                
               <!--<input type="checkbox" name="star1" id="" value="房" />房
               <input type="checkbox" name="star2" id="" value="车" />车
               <input type="checkbox" name="star3" id="" value="保单" />保单
               <input type="checkbox" name="star4" id="" value="工薪" />工薪
               <input type="checkbox" name="star5" id="" value="其它" />其它-->
              <select name="star"style="border: solid 1px #c3ab7d; height: 30px;" >
                	<option value="">全部星级</option>
			        		<option value="房">房</option>
			        		<option value="车">车</option>
			        		<option value="保单">保单</option>
			        		<option value="工薪">工薪</option>
			        		<option value="其它">其它</option>
			        		<option value="已签约">已签约</option>
			        	</select>
                <select name="rank"style="border: solid 1px #c3ab7d; height: 30px;" >
                	<option value="">全部级别</option>
			        		<option value="1~3天">1~3天</option>
			        		<option value="3~6天">3~6天</option>
			        		<option value="6~15天">6~15天</option>
			        		<option value="15~30天">15~30天</option>
			        		<option value="30天以上">30天以上</option>
			        	</select>
               
           <input name="name" type="text" class="scinput" placeholder="客户姓名" />
           <input name="phone" type="text" class="scinput" placeholder="客户手机号" />
           <input name="remark" type="text" class="scinput" placeholder="备注" />
           <i>客户数量：<?php echo $countt ; ?></i>
            </li>
                     
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
        
        </ul>
  </form>
  <?php if($fasdf==0){ ?>
  <form enctype="multipart/form-data" action="excel" method="post">
    <ul class="forminfo" style="float: left; width:47% ;">
    <li><label>Excel文件(注意使用微软office)</label><input name="excel" type="file" class="scinput" style="width: 200px;" /><input name="" type="submit"  class="scbtn" value="导入"/><i></i></li>

    <img src="https://zykj.8haoqianzhuang.cn/cce20201806201713354547.jpg"  style="height: 200px;" />
    </ul>
    </form>
  <?php } ?>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
       
        <th>客户名</th>
        <th>电话</th>      
        <th>贷款（万）</th>

        <th>级别</th>
        <th width="150">星级</th>  
        <th>备注</th>  
        <th>跟进</th> 
        <th>操作人</th>
        <th>时间</th>    
        <th>最新跟进</th>    
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <form action="add" method="post">
        <tr>   
        <td><input type="text" name="name" id="" value="" style="border: solid 1px #c3ab7d;width: 80px; height: 30px;" /></td>
        <td><input type="text" name="phone" id="" value="" style="border: solid 1px #c3ab7d; height: 30px;"  /></td>
        <td><input type="text" name="loans" id="" value="" style="border: solid 1px #c3ab7d; height: 30px;width: 80px;"  /></td>
      
        <td>
        	<select name="rank"style="border: solid 1px #c3ab7d; height: 30px;" >
        			<option value="1~3天">1~3天</option>
			        <option value="3~6天">3~6天</option>
			        <option value="6~15天">6~15天</option>
			        <option value="15~30天">15~30天</option>
			        <option value="30天以上">30天以上</option>
        	</select>
       
        </td>
        <td>
        			<input type="checkbox" name="star1" id="" value="房" />房
              <input type="checkbox" name="star3" id="" value="保单" />保单
              <input type="checkbox" name="star4" id="" value="工薪" />工薪<br/>
              <input type="checkbox" name="star2" id="" value="车" />车
              <input type="checkbox" name="star5" id="" value="其它" />其它
              <input type="checkbox" name="star6" id="" value="已签约" />已签约
        </td>
   			<td>
   				<textarea name="remark" rows="5" cols="30" style="border: solid 1px #c3ab7d;"></textarea>
   				
   			</td>
   			<td>
   				<textarea name="follow" rows="5" cols="30" style="border: solid 1px #c3ab7d;"></textarea>
   				
   			</td>
        <td><input type="hidden" name="operator" id="" value="<?php echo $nickname; ?>"/><?php echo $nickname; ?></td>
        <td><?php echo date('Y-m-d H:i:s',time());?></td>
        <td></td>
        <td><input type="submit" value="添加" style=" padding: 5px 10px 5px 10px; background: #c3ab7d; color: #FFFFFF;"/></td>
        <td>    	
        </form>	
        
        <tr style="background: #1699FE; color: #FFFFFF;">
        <td>分割</td>
        <td>分割</td>
        <td>分割</td>
        <td>分割</td>
        <td>分割</td>
        <td>分割</td>
        <td>分割</td>

        <td>分割</td>
  			<td>分割</td>
				<td>分割</td>
        <td>
     
        	分割
         
        </td>
        
        </tr> 
        
        
        
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<form action="upd" method="post">
        		<input type="hidden" name="id" id="id" value="<?php echo $vo['f_service_id']; ?>" />
        		
        <tr>
        	
        <td><input type="text" name="name" id="" value="<?php echo $vo['name']; ?>" style="border: solid 1px #c3ab7d; height: 30px;width: 80px;" /></td>
        <td><input type="text" name="phone" id="" value="<?php echo $vo['phone']; ?>" style="border: solid 1px #c3ab7d; height: 30px;" /></td>
        <td><input type="text" name="loans" id="" value="<?php echo $vo['loans']; ?>" style="border: solid 1px #c3ab7d; height: 30px;width: 80px;" /> </td>
        <td>
        			<select name="rank"style="border: solid 1px #c3ab7d; height: 30px;" >
        			<option value="<?php echo $vo['rank']; ?>"><?php echo $vo['rank']; ?></option>
        			<option value="1~3天">1~3天</option>
			        <option value="3~6天">3~6天</option>
			        <option value="6~15天">6~15天</option>
			        <option value="15~30天">15~30天</option>
			        <option value="30天以上">30天以上</option>
        	</select>
        	
        </td>
        <td>
        	
        	
<?php if(strpos($vo['star'],'房')!==false){ ?>
<input type="checkbox" name="star1" id="" value="房" checked="checked" />房
<?php }else{ ?>
<input type="checkbox" name="star1" id="" value="房" />房
<?php } if(strpos($vo['star'],'保单') !==false){ ?>
<input type="checkbox" name="star3" id="" value="保单" checked="checked" />保单
<?php }else{ ?>
<input type="checkbox" name="star3" id="" value="保单" />保单
<?php } if(strpos($vo['star'],'工薪') !==false){ ?>
<input type="checkbox" name="star4" id="" value="工薪" checked="checked" />工薪
<?php }else{ ?>
<input type="checkbox" name="star4" id="" value="工薪" />工薪
<?php } ?>	
	<br/>
	<?php if(strpos($vo['star'],'车') !==false){ ?>
<input type="checkbox" name="star2" id="" value="车" checked="checked" />车
<?php }else{ ?>
<input type="checkbox" name="star2" id="" value="车" />车
<?php } if(strpos($vo['star'],'其它') !==false){ ?>
<input type="checkbox" name="star5" id="" value="其它" checked="checked" />其它
<?php }else{ ?>
<input type="checkbox" name="star5" id="" value="其它" />其它
<?php } if(strpos($vo['star'],'已签约') !==false){ ?>
<input type="checkbox" name="star6" id="" value="已签约" checked="checked" />已签约
<?php }else{ ?>
<input type="checkbox" name="star6" id="" value="已签约" />已签约
<?php } ?>
        </td>
        <td><textarea name="remark" rows="5" cols="30" style="border: solid 1px #c3ab7d;"><?php echo $vo['remark']; ?></textarea>
        	</td>
        	<td><textarea name="follow" rows="5" cols="30" style="border: solid 1px #c3ab7d;"><?php echo $vo['follow']; ?></textarea>
        	</td>
        <td><?php echo $vo['operator']; ?> </td>
        <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>
  			<td><?php echo date('Y-m-d H:i:s',$vo['updtime']);?></td>

        <td>
        	<input type="submit" value="更新" style=" padding: 5px 10px 5px 10px; background: #c3ab7d; color: #FFFFFF;"/>
      <a href="delete?id=<?php echo $vo['f_service_id']; ?>" class="tablelink" onClick="delcfm()">删除</a>
        	
         
        </td>
        
        </tr> 
      
        	</form>
         <?php endforeach; endif; else: echo "" ;endif; ?> 
              
        </tbody>
    </table>
<div id="" style="width: 100%; height: 40px;margin-top: 15px;">
    	<div id=""style="width: 35%; height: 30px; float: left;">
	</div>
<div id=""style="width: 10%; height: 30px;float: left;">
	<form action="" method="get">
		<input name="star" type="hidden" class="scinput" value="<?php echo input('get.star'); ?>" />
		<input name="rank" type="hidden" class="scinput" value="<?php echo input('get.rank'); ?>" />
		<input name="phone" type="hidden" class="scinput" value="<?php echo input('get.phone'); ?>" />
		<input name="remark" type="hidden" class="scinput" value="<?php echo input('get.remark'); ?>" />
		<input name="name" type="hidden" class="scinput" value="<?php echo input('get.name'); ?>" />

		
		<input type="text" name="page" id="" value="" style="width: 50px; height: 30px; border: 1px #0066CC solid; margin-right: 10px; border-radius: 10px;" />
		<input type="submit" name="" id="" value="跳转" style="padding: 3px 5px 3px 5px ; border-radius: 5px; background: #00B7EE; color: #FFFFFF;" />
	</form>
	</div>
	<div class="page" style="width: 50%; height: 30px;float: right;">
	
	<table style="margin:0 auto;text-align: center;">
		<tr>
			<?php echo $list->render(); ?>
		</tr>
	</table>

</div>   
    	
    	
    	
    </div>
    
 
    
    
    
    
    </div>
    
    <script type="text/javascript">
    	 function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>
