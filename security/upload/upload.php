<?php 

if ($_FILES['file']['error']) {
	echo 'error' . $_FILES['file']['error'] . '<br/>';
}else{
	echo 'name:' . $_FILES['file']['name'] . '<br/>';
	echo 'type:' . $_FILES['file']['type'] . '<br/>';
	echo 'size:' . ($_FILES['file']['size'] / 1024) . '<br/>';
	echo 'tmp:' . $_FILES['file']['tmp_name'];
}
 ?>