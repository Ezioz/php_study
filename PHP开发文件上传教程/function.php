<?php 

function files($file, $ext, $allowEXT, $maxfile, $size)
{
	if ($file > 0) {
		switch ($file) {
			case 1:
			echo "上传文件超过了php配置文件中upload_max_filesize的值";
			break;
		case 2:
			echo "上传文件超过了max_file_size大小";
			break;
		case 3:
			echo "文件部分被上传";
			break;
		case 4:
			echo "没有选择上传文件";
			break;
		case 6:
			echo "没有找到临时目录";
			break;
		case 7:
			break;
		case 8:
			echo "系统错误";
			break;
		}
	}
	if (!in_array($ext, $allowEXT)) {
		exit('文件类型非法');
	}
	if ($fileinfo['size'] > $maxfile) {
		exit('文件过大');
	}
	if (!is_uploaded_file($fileinfo['$tmp_name'])) {
		exit('文件不是以POST方式提交');
	}
}
	

 ?>