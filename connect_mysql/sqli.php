<?php 

include 'conn.php';

$conn = mysqli_connect($hostname, $uname, $upass);

if (!$conn) {
	die('connect defeat' . mysqli_error($conn));
}else{
	echo 'connect success<br/>';
}

$choise_db = mysqli_select_db($conn, 'awvs');

if (!$choise_db) {
	echo "choise_db defeat" . mysqli_error($conn);
}else{
	echo 'choise db success<br/>';
}

$stmt = $conn->prepare('insert into awv_test(awv_title, awv_author) values (?, ?)');

$stmt -> bind_param("ss", $awv_title, $awv_author);

$awv_title = 'hhh';
$awv_author = 'zjs';
if ($stmt ->execute()) {
	echo 'insert success';
}else{
	echo 'insert defeat';
}

$stmt -> close();
mysqli_close($conn);


 ?>