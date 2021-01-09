<?php 

$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);

for ($i=0; $i < 4; $i++) { 
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));

	$fontcontent = rand(0, 9);
	$x = ($i * 100/4) + rand(5, 10);
	$y = rand(5, 10);
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}

header('content-type: image/png');
imagedestroy($image);

 ?>