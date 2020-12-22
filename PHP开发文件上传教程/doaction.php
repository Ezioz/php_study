<?php 
header("Content-type: text/html; charset=utf-8");
require_once('function.php');
$fileinfo = $_FILES['myfile'];
$allowEXT = array('jpg', 'png', 'jpeg', 'gif');
$maxfile = 2097152;
$ext = pathinfo($fileinfo['name'], PATHINFO_EXTENSION);
$size = $fileinfo['size'];
$error = $fileinfo['error'];

files($file, $ext, $allowEXT, $maxfile, $size);



 ?>