<?php 

include 'conn.php';
$conn = mysqli_connect($hostname, $uname, $upass);
if (!$conn) {
	die('error: connect defeat' . mysqli_error($conn));
}else{
	echo 'connect success<br/>';
}

// 判断选择数据库是否成功
$choise_db = mysqli_select_db($conn, 'awvs');
if (!$choise_db) {
	die('error: this db is not exists' . mysqli_error($conn) . '<br/>');
}else{
	echo 'choise db success<br/>';
}

$i_data_tab = 'insert into awv_test (awv_title, awv_author) values ( "学习MySQL", "runoob.com")';

$retval = mysqli_query($conn, $i_data_tab);
if (!$retval) {
	die('error: insert defeat' . mysqli_error($conn));
}else{
	echo 'insert success';
}
mysqli_close($conn);


 ?>