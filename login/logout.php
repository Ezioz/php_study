<?php 
header('Content-type: text/html; charset=utf-8');

session_start();
if (isset($_SESSION['username'])) {
	var_dump(session_name());
	die();
	session_unset($_SESSION['username']);
	session_destroy();
	setcookie(session_name(), '');
	echo "<script>alert('注销成功'); location.href='login.html';</script>";
}else{
	echo "<script>alert('注销失败');</script>";
}



 ?>