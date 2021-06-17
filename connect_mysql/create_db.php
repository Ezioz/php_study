<?php 

include 'conn.php';

$conn = mysqli_connect($hostname, $uname, $upass);
if (!$conn) {
	die('error: xxxx');

}
$sql = 'create database awvs';
$retval = mysqli_query($conn, $sql);
if (! $retval) {
	die('error' . mysqli_error($conn));
}
echo "success";
mysqli_close($conn);

 ?>