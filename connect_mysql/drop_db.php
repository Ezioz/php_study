<?php 

include 'conn.php';

$conn = mysqli_connect($hostname, $uname, $upass);

if (!$conn) {
	die('error: xxxx' . mysqli_error($conn));
}
echo 'connect success' . '<br/>';
$sql = 'drop database awvs';
$retval = mysqli_query($conn, $sql);
if (!$retval) {
	die('drop defeat' . mysqli_error($conn));
}
echo 'drop success';
mysqli_close($conn);


 ?>