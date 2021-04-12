<?php
$image_dir = "images/";
$img = $_GET['image'];
$size = 900;
if ($img) {
    $image = imagecreatefromjpeg($image_dir . "/" . $img);
    $width = imagesx($image);
    $height = imagesy($image);

    $thumb_height = $size;
    $thumb_width = $size;

    $ratio_original = $width / $height;

    if ($height > $width) {
        $thumb_height = ($thumb_width * $height) / $width;
    } else if ($height < $width) {
        $thumb_width = ($thumb_height * $width) / $height;
    }

    $thumbnail = imagecreatetruecolor($thumb_width, $thumb_height);
    imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
    header("Content-type: image/jpeg");
    imagejpeg($thumbnail);
    imagedestroy($thumbnail);
    imagedestroy($image);
}
?>
