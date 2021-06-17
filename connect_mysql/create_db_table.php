<?php 

include 'conn.php';
$conn = mysqli_connect($hostname, $uname, $upass);
// 判断连接
if (!$conn) {
	die('error: connect defeat' . mysqli_error($conn) . '<br/>');
}else{
	echo 'connect success' . '<br/>';
}
// 判断选择数据库是否成功
$choise_db = mysqli_select_db($conn, 'awvs');
if (!$choise_db) {
	die('error: this db is not exists' . mysqli_error($conn) . '<br/>');
}else{
	echo 'choise db success' . '<br/>';
}

$create_tb_sql = "create table awv_test(`awv_id` int not null AUTO_INCREMENT, `awv_title` varchar(100) not null, `awv_author` varchar(100) not null, primary key(`awv_id`))engine=innodb default charset=utf8;";
$retval = mysqli_query($conn, $create_tb_sql);

if (!$retval) {
	die('error: create table defeat' . mysqli_error($conn) . '<br/>');
}else{
	echo 'create table success';
}
mysqli_close($conn);


 ?>