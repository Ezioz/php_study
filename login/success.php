<?php 
header('Content-Type:text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['username'])) {
		echo "<scrpt>alert('用户名不能为空'); location.href='login.html';</script>";
	}else{
		$username = trim($_POST['username']);
	}

	if (empty($_POST['password'])) {
		echo "<scrpt>alert('密码不能为空'); location.href='login.html';</script>";
	}else{
		$password = trim($_POST['password']);
	}
}


$mysqli = new mysqli('localhost', 'root', 'root', 'student');
$result = $mysqli -> query("select password from user where username="."'$username'");
$rs = $result -> fetch_row();
if (!empty($rs)) {
	if ($password != $rs[0]) {
		echo "<script>alert('密码错误'); location.href='login.html';</script>";
	}else{
		$expire = 3600;
		ini_set('session.gc_maxlifetime', $expire);
		if (empty($_COOKIE['PHPSESSID'])) {
			session_set_cookie_params($expire);
			session_start();
		}else{
			session_start();
			setcookie('PHPSESSID', session_id(), time() + $expire);
		}

		if (isset($_SESSION['username'])) {
			exit("您已经登入了，请不要重新登入！用户名：{$_SESSION['username']}---<a href='logout.php'>注销</a>");
		}else{
			$_SESSION['username'] = $_POST['username'];
		}
		echo "<script>alert('登录成功')</script><br/>";
		echo "您好！{$_SESSION['username']}，欢迎回来";
		echo "<a href='logout.php'>注销</a>";
	}
}else{
	echo "<script>alert('没有此用户'); location.href='login.html';</script>";
}


 ?>