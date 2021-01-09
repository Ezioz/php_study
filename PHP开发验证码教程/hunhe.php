<?php 

$images = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255);

imagefill($image, 0, 0, $bgcolor);
for ($i=0; $i < 4; $i++) { 
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
	$data = 'abcdefghiklmnopqrstuvwxyz1234567890';
	$fontcontent = substr($data, rand(0, strlen($data)), 1);
	$x = ($i * 100/4) + rand(5, 10);
	$y = rand(5, 10);
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);

}

for ($i=0; $i < 200; $i++) { 
	$pointcolor = imagecolorallocate($image, rand(0, 200), rand(50, 200), rand(50, 200));
	imagesetpixel($image, rand(1, 99), rand(1, 29), $pointcolor);
}

for ($i=0; $i < 8; $i++) { 
	$linecolor = imagecolorallocate($image, rand(60, 220), rand(60, 220), rand(60, 220));
	
}

 ?>