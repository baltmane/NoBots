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
for($x = 0; $x < 11; $x += 1)
{
    imagesetpixel($tt_image, rand(0,54), $x, $black);
}
for($x = 21; $x < 35; $x += 1)
{
    imagesetpixel($tt_image, rand(0,54), $x, $black);
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
