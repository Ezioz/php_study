<?php 

$hostname = 'localhost';
$uname = 'root';
$upass = 'root';

$conn = mysqli_connect($hostname, $uname, $upass);
if ($conn) {
	echo 'connect success<br/>';
}else{
	die('connect defeat' . mysqli_error($conn));
}

$choise_db = mysqli_select_db($conn, 'user');
if ($choise_db) {
	echo 'choise db success<br/>';
}else{
	die('choise db defeat' . mysqli_error($conn));
}

$stmt = $conn->prepare('insert into user(username, password) values(?, ?)');
$stmt -> bind_param("ss", $username, $password);

$user_array = array('ahtoh'=>'123456', 'ahtoh2'=>'admin', 'ahtoh3'=>'password');
$i = 0;
foreach ($user_array as $username => $password) {
	$password = md5($password);
	$stmt-> execute();
	$i += 1;
	if ($stmt) {
		echo "No {$i} data success<br/>";
	}else{
		die('insert defeat' . mysqli_error($conn));
	}
}

$stmt->close();

$select_sql = 'select * from user';
$retval = mysqli_query($conn, $select_sql);
if ($retval) {
	echo '<meta charset=utf-8>';
	echo '<h1>select result</h1>';
	echo '<table border=1><tr><td>id</td><td>username</td><td>password</td></tr>';
	while ($row=mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['password']}</td></tr>";
	}
}
echo '</table>';
mysqli_close($conn);

 ?>