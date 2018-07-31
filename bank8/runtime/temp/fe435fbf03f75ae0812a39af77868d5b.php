<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/newsflash/update.html";i:1522495469;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>每日快报修改</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>


<script type="text/javascript" charset="utf-8" src="<?php echo BACK_JS_URL; ?>ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo BACK_JS_URL; ?>ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo BACK_JS_URL; ?>lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
    div{
        width:100%;
    }
</style>



</head>

<body>

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>

    <div class="formbody">

    <div class="formtitle"><span>基本信息</span></div>
    <form action="update" method="post" id="selector">
      <!--隐藏域  -->
    <input type="hidden" name="bulletin_id" id="bulletin_id" value="<?php echo $_GET['id']; ?>" />

    <ul class="forminfo">
    <li><label>显示时间：</label>

      		<input placeholder="请输入新增开始日期" name="ntime" class="laydate-icon timeUstyle stateUTime" value="<?php echo $list['ntime'];?>" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">

    </li>

    <li><label>标题1：</label><input id="pas" name="title"  value="<?php echo $list['title'];?>" type="text" class="dfinput" /></li>
    <li><label>标题2：</label><input id="nickname" name="caption" value="<?php echo $list['caption'];?>" type="text" class="dfinput" placeholder=""/></li>
    <!-- <li><label>内容：</label><input name="webtext" type="text" class="dfinput"/></li> -->
    <li><label>每日快报内容：</label>
      <!-- <textarea name="webtext" cols="" rows="" class="textinput">  </textarea> -->
      <li><b>请在下方输入内容</b></li>
      <!-- <input id="nickname" name="caption" type="text" class="dfinput" placeholder="下方输入内容"/> -->
    </li>

      <div>
          <!-- <h1>完整demo</h1> -->
          <script id="editor" type="text/plain" style="width:1024px;height:500px;" value="<?php echo $list['webtext'];?>" ></script>
      </div>
      <textarea name="webtest" style="display:none" id=" "  class=""></textarea>
      <div id="btns">
          <div>
              <button onclick="getAllHtml()">获得整个html的内容</button>
              <button onclick="getContent()">获得内容</button>
              <button onclick="setContent()">写入内容</button>
              <button onclick="setContent(true)">追加内容</button>
              <button onclick="getContentTxt()">获得纯文本</button>
              <button onclick="getPlainTxt()">获得带格式的纯文本</button>
              <button onclick="hasContent()">判断是否有内容</button>
              <button onclick="setFocus()">使编辑器获得焦点</button>
              <button onmousedown="isFocus(event)">编辑器是否获得焦点</button>
              <button onmousedown="setblur(event)" >编辑器失去焦点</button>

          </div>
          <div>
              <button onclick="getText()">获得当前选中的文本</button>
              <button onclick="insertHtml()">插入给定的内容</button>
              <button id="enable" onclick="setEnabled()">可以编辑</button>
              <button onclick="setDisabled()">不可编辑</button>
              <button onclick=" UE.getEditor('editor').setHide()">隐藏编辑器</button>
              <button onclick=" UE.getEditor('editor').setShow()">显示编辑器</button>
              <button onclick=" UE.getEditor('editor').setHeight(300)">设置高度为300默认关闭了自动长高</button>
          </div>

          <div>
              <button onclick="getLocalData()" >获取草稿箱内容</button>
              <button onclick="clearLocalData()" >清空草稿箱</button>
          </div>

      </div>
      <div>
          <button onclick="createEditor()">
          创建编辑器</button>
          <button onclick="deleteEditor()">
          删除编辑器</button>
      </div>




    <li><label>&nbsp;</label><input name="" type="submit" id="btn" value="确认修改" style="padding: 10px 20px 10px 20px;  background: #DC4E00; color: #F0F0EE;" /></li>
    </ul>

    </form>

    </div>


</body>

<script src='<?php echo BACK_JS_URL; ?>jmessage-sdk-web.2.5.0.min.js'></script>
<script src="<?php echo BACK_JS_URL; ?>jquery.js"></script>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>

</html>
