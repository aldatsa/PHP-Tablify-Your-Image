<?php
    function tablifyYourImage($file) {
        
        // Get the width, height and type of the image.
        list($width, $height, $image_type) = getimagesize($file);
        
        $im = imagecreatefromjpeg($file);
        
        // Create the table.
        $table = '<table cellspacing="0" cellpadding="0" border="0" style="margin-left: auto; margin-right: auto; font-size:0px;">';
        
        // Create the body of the table.
        $table = $table . '<tbody>';
        
        for ($y = 0; $y < $height; $y++) {
            
            for ($x = 0; $x < $width; $x++) {
                
                // If it is the first column (0st), create an tr tag
                if ($x == 0) {
                    $table = $table . '<tr>';
                }
                
                $rgb = imagecolorat($im, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                
                $table = $table . '<td width="1" height="1" colspan="1" style="background-color: rgb(' . $r . ', ' . $g . ', ' . $b . ');">&nbsp;</td>';
                
                // If it is the last column, close the tr tag
                if ($x == $width - 1) {
                    $table = $table . '</tr>';
                }
                
                // Add a new line
                $table = $table;
            }
        }
        
        // Close the body of the table and the table itself
        $table = $table . '</tbody></table>';
        
        return $table;
    }
    
    echo tablifyYourImage("iametza.jpg");
?>