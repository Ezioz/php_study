<?php 

include 'conn.php';

$conn = mysqli_connect($hostname, $uname, $upass);

if ($conn) {
	echo 'connect success<br/>';
}else{
	die('connect defeat' . mysqli_error($conn));
}

$choise_db = mysqli_select_db($conn, 'awvs');

if ($choise_db) {
	echo 'choise db success<br/>';
}else{
	die('choise db defeat' . mysqli_error($conn));
}

$sql = 'delete from awv_test where awv_title="hhh"';

$retval = mysqli_query($conn, $sql);
if ($retval) {
	echo 'delete success<br/>';
}else{
	die('delete defeat' . mysqli_error($conn));
}


$select_sql = 'select * from awv_test';
$retval2 = mysqli_query($conn, $select_sql);
if ($retval2) {
	echo '<meta charset=utf-8>';
	echo '<h2>delete/select</h2>';
	echo '<table border=1><tr><td>id</td><td>title</td><td>author</td></tr>';
	while ($row=mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {
		echo "<tr><td>{$row['id']}</td><td>{$row['awv_title']}</td><td>{$row['awv_author']}</td></tr>";
	}
}else{
	die('select defeat' . mysqli_error($conn));
}
echo '</table>';
mysqli_close($conn);


 ?>