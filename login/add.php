<?php 

//首先设置了

header('Content-type: text/html; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['username'])) {
		echo "<script>alert('用户名不能为空');location.href='login.html';</script>";
	}else{
		$username = trim($_POST['username']);
	}
	if (empty($_POST['password'])) {
		echo "<script>alert('用户密码不能为空'); location.href='login.html';</script>";
	}else{
		$password = trim($_POST['password']);
	}
	if (empty($_POST['repassword'])) {
		echo "<script>alert('重复输入密码不能为空'); location.href='login.html';</script>";
	}else{
		$repassword = trim($_POST['repassword']);
	}

	if ($password != $repassword) {
		echo "<script>alert('两次输入的密码不一致，请重新输入'); locatioon.href='login.html';</script>";
	}

}


$mysqli = new mysqli('localhost', 'root', 'root', 'student');
$result = $mysqli -> query("select password from user where username="."'$username'");
$rs = $result -> fetch_row();
if (!empty($rs)) {
	echo "<script>alert('用户已存在'); location.href='login.html';</script>";
}else{
	$mysqi = new mysqli('localhost' ,'root', 'root', 'student');
	$sql = "insert into user(username, password) values ('$_POST[username]', '$_POST[password]')";
	$rs = $mysqli -> query($sql);
	if (!$rs) {
		echo "<script>alert('注册失败'); location.href='login.html';</script>";
	}else{
		echo "<script>alert('注册成功'); location.href='login.html';</script>";
	}
}



 ?>