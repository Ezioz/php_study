<?php 
// 定义了页面的响应类型
header("Content-type: text/html; charset=utf-8");
// 请求一次function.php文件，该文件内容为一个函数，主要用来校验上传文档的类型
require_once('function.php');
$fileinfo = $_FILES['myfile'];
// 仅接收文件后缀为jpg/png/jpeg/gif的图片，图片大小不得大于2097152，也就是2Mb
$allowEXT = array('jpg', 'png', 'jpeg', 'gif');
$maxfile = 2097152;
$ext = pathinfo($fileinfo['name'], PATHINFO_EXTENSION);
$size = $fileinfo['size'];
$error = $fileinfo['error'];

files($file, $ext, $allowEXT, $maxfile, $size);



 ?>