<?php


function makeImage($pngFileUrl){
	$img = imagecreatefromstring(file_get_contents($pngFileUrl));
	//Getting the height and width of the image
	$w = imagesx($img);
	$h = imagesy($img);
	//cropping the half of the image
	$cropped = imagecrop($img, ['x' => 0, 'y'=>0, 'width'=>$w/2, 'height'=>$h]);
	//flipping the image horizontally in order to get mirror effect
	imageflip($cropped, IMG_FLIP_HORIZONTAL);
	//putting the cropped part on the image
	imagecopy($img, $cropped, $w/2, 0, 0, 0, $w, $h);
	//saving the result;
	imagepng($img, '1.png');
}
//Example image
//Please checkout this image first to make sure that the image is not already processed.
makeImage('PATH OR URL TO YOUR IMAGE');
