<?php 


$conn = mysqli_connect('localhost', 'root', 'root', 'test');
if ($conn) {
	echo "True";
}else{
	die('error:xxx' . mysqli_error($conn));
}
mysqli_close($conn);
 ?>