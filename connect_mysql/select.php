
<?php 

include 'conn.php';
$conn = mysqli_connect($hostname, $uname, $upass);

if (!$conn) {
	die('error: connect defeat' . mysqli_error($conn));
}else{
	echo 'connect success<br/>';
}

$choise_db = mysqli_select_db($conn, 'awvs');
if (!$choise_db) {
	die('error: choise_db defeat' . mysqli_error($conn));
}else{
	echo 'choise_db success<br/>';
}

$sql = 'select * from awv_test';

$retval = mysqli_query($conn, $sql);
if (!$retval) {
	die('get data defeat' . mysqli_error($conn));
}else{
	echo '<meta charset=utf-8>';
	echo '<h2>mysqli_fetch_array test</h2>';
	echo '<table border=1><tr><td>id</td><td>title</td><td>author</td><tr>';
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo "<tr><td>{$row['awv_id']}</td><td>{$row['awv_title']}</td><td>{$row['awv_author']}</td></tr>";
	}
}
echo '</table>';
// 释放游标内存
mysqli_free_result($retval);

mysqli_close($conn);


 ?>