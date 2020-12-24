<!DOCTYPE html>
<html lang="en">
<head>
	<?php include ('conn.php'); ?>
	<link rel="stylesheet" type="text/css" href="css.css">
	<title></title>
</head>
<body>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
	<?php 
	$sql = "select * from message order by id desc"
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) { ?>
		<tr bgcolor="#eff3ff">
			<td>标题：<?php echo($row['title']);?> <font color="red">用户：<?php echo $row['user']; ?></font></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>发表内容：<?php echo $row['content'];?></td>
		</tr>
		<tr bgcolor="#ffffff">
			<td><div align="right">时间：<?php echo $row['lastdate'];?></div></td>
		</tr>
		<?php } ?>
		<tr bgcolor="#f0fff0">
			<td><div align="right"><a href="add.html">返回留言</a></div></td>
		</tr>

</table>
</body>
</html>