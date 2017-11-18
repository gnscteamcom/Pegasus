<?php
if(!isset($_GET["img"])){
    exit();
}

$imageUrl = base64_decode($_GET["img"]);

preg_match("/([0-9A-z]{1,}).(jpg)/", $imageUrl, $matches);
if($matches < 2){
    exit();
}

$imageFilename = $matches[1];
$pathCache = 'tmdbCache';
$filePath = $pathCache."/".$imageFilename.".jpg";

header("Content-Type: image/jpeg");

if(!file_exists($filePath)){
    $imageOriginal = imagecreatefromjpeg($imageUrl);

    $size = array(imagesx($imageOriginal), imagesy($imageOriginal));
    $ratio = $size[0]/$size[1];
    if( $ratio > 1) {
        $width = 1000;
        $height = 1000/$ratio;
    }
    else {
        $width = 1000*$ratio;
        $height = 1000;
    }

    $newImage = imagecreatetruecolor($width,$height);
    imagecopyresampled($newImage,$imageOriginal,0,0,0,0,$width,$height,$size[0],$size[1]);

    imagejpeg($newImage, $filePath, 60);
    imagedestroy($newImage);
    imagedestroy($imageOriginal);
}

echo file_get_contents($filePath);
?>
