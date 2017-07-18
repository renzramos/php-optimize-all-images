<?php
// include composer autoload
require 'vendor/autoload.php';


use Intervention\Image\ImageManager;


$manager = new ImageManager();
$images = glob_recursive("{images/*/*/*.jpg,images/*/*/*.png}",GLOB_BRACE);


foreach ($images as $image_source){

	// $filename = basename($image);
	// $path = str_replace($filename,'',$image);


	$image = $manager->make($image_source);
	$image->save($image_source, 60);


	echo '<pre>';
	print_r($image);
	echo '</pre>';

	//$image->save('/optimized/' . $image, 30);
}

// Does not support flag GLOB_BRACE        
function glob_recursive($pattern, $flags = 0)
{
 $files = glob($pattern, $flags);
 foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
 {
   $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
 }
 return $files;
}
die();


?>