<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/goodstestredis/cesji.html";i:1529570629;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery1.7.js"></script>
<script type="text/javascript">
$(function () {
	var show_count = 20;   //要显示的条数
	var count = 1;    //递增的开始值，这里是你的ID
	$("#btn_addtr").click(function () {

		var length = $("#dynamicTable tbody tr").length;
		//alert(length);
		if (length < show_count)    //点击时候，如果当前的数字小于递增结束的条件
		{
			$("#tab11 tbody tr").clone().appendTo("#dynamicTable tbody");   //在表格后面添加一行
			changeIndex();//更新行号
		}
	});


});
function changeIndex() {
	var i = 1;
	$("#dynamicTable tbody tr").each(function () { //循环tab tbody下的tr
		$(this).find("input[name='NO']").val(i++);//更新行号
	});
}

function deltr(opp) {
	var length = $("#dynamicTable tbody tr").length;
	//alert(length);
	if (length <= 1) {
		alert("至少保留一行");
	} else {
		$(opp).parent().parent().remove();//移除当前行
		changeIndex();
	}
}
</script>



<script type="text/javascript">
$(function () {
	var show_count = 20;   //要显示的条数
	var count = 1;    //递增的开始值，这里是你的ID
	$("#btn_addtrs").click(function () {

		var length = $("#dynamicTables tbody tr").length;
		//alert(length);
		if (length < show_count)    //点击时候，如果当前的数字小于递增结束的条件
		{
			$("#tab12 tbody tr").clone().appendTo("#dynamicTables tbody");   //在表格后面添加一行
			changeIndex();//更新行号
		}
	});


});
function changeIndex() {
	var i = 1;
	$("#dynamicTables tbody tr").each(function () { //循环tab tbody下的tr
		$(this).find("input[name='NO']").val(i++);//更新行号
	});
}

function deltr(opp) {
	var length = $("#dynamicTables tbody tr").length;
	//alert(length);
	if (length <= 1) {
		alert("至少保留一行");
	} else {
		$(opp).parent().parent().remove();//移除当前行
		changeIndex();
	}
}
</script>
	</head>
	<body>
		<div style="width:720px;margin:20px auto;">链接:<input type="text" class="urls" name="urls" id="urls" value="http://test2.8haoqianzhuang.com/index.php/index/" style="width: 600px;" /></div>
		
		
<div style="width:720px;margin:20px auto;">
	<table id="tab11" style="display: none">
		<tbody>
			<tr>
				<td align="center">
					<input type="text" name="keyname" class="keyname" value="" style="width: 100%;"/></td>
				<td align="center">
					<input type="text" name="keyvalue" class="keyvalue" value="" style="width: 100%;"/></td>
				<td>
					<input type="button" id="Button1" onClick="deltr(this)" value="删行">
				</td>
			</tr>
		</tbody>
	</table>
	<input type="button" id="btn_addtr" value="增行">
	<table id="dynamicTable" width="700" border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td align="center" bgcolor="#CCCCCC">Body参数名称</td>
				<td align="center" bgcolor="#CCCCCC">Body参数值</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>

				<td align="center">
					<input type="text" name="keyname"  class="keyname"  style="width: 100%;"/></td>
				<td align="center">
					<input type="text" name="keyvalue" class="keyvalue"  style="width: 100%;"/></td>
				<td>
					<input type="button" id="Button2" onClick="deltr(this)" value="删行">
				</td>
			</tr>
		</tbody>
	</table>

</div>
		
	<div style="width:720px;margin:20px auto;">

	<table id="dynamicTables" width="700" border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td align="center" bgcolor="#CCCCCC">Header名称</td>
				<td align="center" bgcolor="#CCCCCC">Header值</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>

				<td align="center">
					deviceid:</td>
				<td align="center">
					<input type="text" id="deviceid" name="deviceid" class="deviceid" style="width: 100%;"/></td>
				<td>
				
				</td>
			</tr>
			<tr>

				<td align="center">
					tokenid:</td>
				<td align="center">
					<input type="text" id="tokenid" name="tokenid" class="tokenid" style="width: 100%;"/></td>
				<td>
				
				</td>
			</tr>
			
			<tr>

				<td align="center">
					user-agent:</td>
				<td align="center">
					<input type="text" id="agent" name="agent" class="deviceid" style="width: 100%;"/></td>
				<td>
				
				</td>
			</tr>
		</tbody>
	</table>

</div>	
		
<!--<div style="width:720px;margin:20px auto;">
	<table id="tab12" style="display: none">
		<tbody>
			<tr>
				<td align="center">
					<input type="text" name="headerkey" class="headerkey"  style="width: 100%;" value=""/></td>
				<td align="center">
					<input type="text" name="headervalue"class="headervalue" style="width: 100%;" value="" /></td>
				<td>
					<input type="button" id="Button1" onClick="deltr(this)" value="删行">
				</td>
			</tr>
		</tbody>
	</table>
	<input type="button" id="btn_addtrs" value="增行">
	<table id="dynamicTables" width="700" border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td align="center" bgcolor="#CCCCCC">Header名称</td>
				<td align="center" bgcolor="#CCCCCC">Header值</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>

				<td align="center">
					<input type="text" name="headerkey" class="headerkey" style="width: 100%;"/></td>
				<td align="center">
					<input type="text" name="headervalue" class="headervalue" style="width: 100%;"/></td>
				<td>
					<input type="button" id="Button2" onClick="deltr(this)" value="删行">
				</td>
			</tr>
		</tbody>
	</table>

</div>-->



		<input type="button" id="but" value="发送请求" style="margin-left: 40%;"/>
	
		<div class="" id="query_content"  style="width:80%; margin:10% auto;border: #0188FB 1px solid;" >
			
		</div>
	</body>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.min.js"></script>
	<script type="text/javascript">
		$('#but').click(function(){
			

   
        
var arr=$('[name="keyname"]');
var val=new Array();
for(var i=0;i<arr.length;i++){
 val.push($(arr[i]).val());
}


var arr2=$('[name="keyvalue"]');
var val2=new Array();
for(var i=0;i<arr2.length;i++){
 val2.push($(arr2[i]).val());
}


//
//var arr3=$('[name="headerkey"]');
//var val3=new Array();
//for(var i=0;i<arr3.length;i++){
// val3.push($(arr3[i]).val());
//}
//
//
//var arr4=$('[name="headervalue"]');
//var val4=new Array();
//for(var i=0;i<arr4.length;i++){
// val4.push($(arr4[i]).val());
//}
//
//var ass='';
//for (var i=1;i<val3.length;i++)
//{
//	ass+='"'+val3[i]+':'+val4[i]+'",';
//}

//console.log(ass);
   				$.ajax({
				    url: "http://test2.8haoqianzhuang.com/index.php/index/Goodstestredis/res",
				    type: 'post',
				    dataType: 'json',
				    data: {
				    urls:$(".urls").val(),
				    keyname:val,
				    keyvalue:val2,
				   	deviceid:$("#deviceid").val(),
				   	tokenid:$("#tokenid").val(),
				   	agent:$("#agent").val()
				    },
				    success: function(text){
//				    		console.log(text);
				            $("#query_content").html(text);
							},
				    
				    error: function(){
				       alert( "网络出错");
				    }
				 });
})
				
		
		
	</script>
</html>
