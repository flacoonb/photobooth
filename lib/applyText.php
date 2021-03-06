<?php

function ApplyText($srcImagePath, $fontsize, $fontrot, $fontlocx, $fontlocy, $fontcolor, $fontpath, $line1text, $line2text, $line3text, $linespacing) {
    $quality = 100;
    $font = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $fontpath);
    $image = imagecreatefromjpeg($srcImagePath);
    if ($fontcolor === 'white') {
        $color = imagecolorallocate($image, 255, 255, 255);
    } elseif ($fontcolor === 'grey') {
        $color = imagecolorallocate($image, 128, 128, 128);
    } else {
        $color = imagecolorallocate($image, 0, 0, 0);
    }
    if (!empty($line1text)) {
        imagettftext($image, $fontsize, $fontrot, $fontlocx, $fontlocy, $color, $font, $line1text);
    }
    if (!empty($line2text)) {
        if ($fontrot < 45 && $fontrot > -45) {
            imagettftext($image, $fontsize, $fontrot, $fontlocx, $fontlocy + $linespacing, $color, $font, $line2text);
        } else {
            imagettftext($image, $fontsize, $fontrot, $fontlocx + $linespacing, $fontlocy, $color, $font, $line2text);
        }
    }
    if (!empty($line3text)) {
        if ($fontrot < 45 && $fontrot > -45) {
            imagettftext($image, $fontsize, $fontrot, $fontlocx, $fontlocy + $linespacing * 2, $color, $font, $line3text);
        } else {
            imagettftext($image, $fontsize, $fontrot, $fontlocx + $linespacing * 2, $fontlocy, $color, $font, $line3text);
        }
    }
    imagejpeg($image, $srcImagePath, $quality);
    imagedestroy($image);
}
