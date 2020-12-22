<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>九九乘法表</title>
</head>
<body>

<!-- 我都是从php中文网学的，然后这竟然算高级实战实验我是没有想到的 -->
<?php 

for ($i=1; $i < 10; $i++) {
	//$j控制的是第一个乘数，$i控制的是第二个乘数
	for ($j=1; $j <= $i; $j++) { 
		//\n，\t等内容要使用双引号
		echo "$j * $i = ". $i * $j . "\t";
	}
	echo "<br/>";
}
 ?>
</body>
</html>
