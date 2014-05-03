<?php
    function tablifyYourImage($file) {
        
        // Get the width, height and type of the image.
        list($width, $height, $image_type) = getimagesize($file);
        
        $im = imagecreatefromjpeg($file);
        $rgb = imagecolorat($im, 10, 15);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        
        var_dump($width);
        var_dump($height);
        var_dump($image_type);
        var_dump($im);
        var_dump($rgb);
        var_dump($r);
        var_dump($g);
        var_dump($b);
        
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                var_dump(imagecolorat($im, $x, $y));
            }
        }
    }
    
    tablifyYourImage("iametza.jpg");
?>