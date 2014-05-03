<?php
    function tablifyYourImage() {
        $im = imagecreatefromjpeg("iametza.jpg");
        $rgb = imagecolorat($im, 10, 15);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        
        var_dump($im);
        var_dump($rgb);
        var_dump($r);
        var_dump($g);
        var_dump($b);
    }
    
    tablifyYourImage();
?>