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
	die('choise db defeat' . mysqli_error($conn));
}else{
	echo 'choise db success<br/>';
}

$sql = 'update awv_test set awv_author="ahtoh" where awv_title="hhh"';

$retval = mysqli_query($conn, $sql);
if ($retval) {
	echo 'update success<br/>';
}else{
	die('update defeat' . mysqli_error($conn));
}

mysqli_close($conn);

 ?>