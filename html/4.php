<?php 
session_start(); 
$text = substr(md5(microtime()),mt_rand(0,26),5);
$_SESSION["ttcapt2"] = $text; 
$height = 35; 
$width = 54; 
$tt_image = imagecreate($width, $height); 
$green = imagecolorallocate($tt_image, 0, 255, 0); 
$black = imagecolorallocate($tt_image, 0, 0, 0); 
$blue = imagecolorallocate($tt_image, 0, 0, 255); 
$font_size = 8; 
imagestring($tt_image, $font_size, 5, 8, $text, $blue);

for($y = 0; $y < 10; $y += 4)
{
    for($x = 0; $x < 60; $x +=4)
    {
	imageline($tt_image, $x, $y, $x + rand(0,4), $y, $black);
    }
}

for($y = 22; $y < 35; $y += 4)
{
    for($x = 0; $x < 60; $x +=4)
    {
	imageline($tt_image, $x, $y, $x + rand(0,4), $y, $black);
    }
}
/* Avoid Caching */
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header( "Content-type: image/png" );
imagepng($tt_image);
imagedestroy($tt_image );
?>
