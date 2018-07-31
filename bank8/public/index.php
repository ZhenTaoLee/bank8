<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
header("Content-type: text/html; charset=utf-8");
// 制作一个输出调试函数
function show_bug($res)
{
    echo "<pre style='color:#55ff57'>";
    var_dump($res);
    echo "</pre>";
}

define("SIT_URL", "http://test2.8haoqianzhuang.com/");
define("CSS_URL", SIT_URL  . "ueditor1433/");

// 定义css、img、js常量
// define("SITE_URL", "https://www.8haoqianzhuang.cn/");
define("SITE_URL", "http://test2.8haoqianzhuang.com/");

define("CSST_URL", SITE_URL  . "static/index/css/"); // css
define("IMG_URL", SITE_URL . "static/index/images/"); // img
define("JS_URL", SITE_URL . "static/index/js/"); // imgs
define("FONT_URL", SITE_URL . "static/index/font/"); // imgs


//后台路径
define("BACK_CSS_URL", SITE_URL  . "static/back/css/"); // css
define("BACK_IMG_URL", SITE_URL . "static/back/images/"); // img
define("BACK_JS_URL", SITE_URL . "static/back/js/"); //js
define("BACK_UP_URL", SITE_URL . "static/back/src");
define("BACK_ED_URL", SITE_URL . "static/back/editor");
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

define('APP_VIR', __DIR__ . '/../vendor/');


// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
