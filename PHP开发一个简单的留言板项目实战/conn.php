<?php 

$conn = mysql_connect('localhost', 'root', 'root') or die('数据库连接错误');
$mysql_select_db('bbs', $conn);
mysql_query('select names "utf8"'); //使用utf8中文编码

 ?>