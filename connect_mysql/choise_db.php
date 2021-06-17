<?php 

include 'conn.php';
$conn = mysqli_connect($hostname, $uname, $upass);
if (!$conn) {
	die('error : xxxx' . mysqli_error($conn));

}
echo 'connect success' . '<br/>';
$retval = mysqli_select_db($conn, 'test');
if (!$retval) {
	die('error: xxxx' . mysqli_error($conn));
}
echo 'choise success';
mysqli_close($conn);


 ?>