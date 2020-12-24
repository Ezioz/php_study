<?php 


include 'conn.php';
$id = $_GET['id'];
$query = "delete from message where id=" . $id;
mysql_query($query);

 ?>

 <?php 
$url = "list.php";
echo "<script>";
echo "window.location.href='$url'";
echo "</script>";

  ?>