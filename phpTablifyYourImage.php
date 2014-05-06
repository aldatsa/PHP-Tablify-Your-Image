<?php
/**
 * This file contains a function that converts images into HTML tables.
 *
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU General Public License Version 3
 * @author     Asier Iturralde Sarasola <asier.iturralde@gmail.com>
 */

    /**
     * Converts images into HTML tables.
     * @param string $file      The path to the image file (gif, jpeg or png).
     * @param int $cell_width   The width of each td (optional, default value: 1px)
     * @param int $cell_height  The height of each td (optional, default value: 1px)
     * @param string $id        The id of the table (optional, if not specified the table has no 'id' attribute)
     * @return string
     */
    function tablifyYourImage($file, $cell_width = 1, $cell_height = 1, $id="") {
        
        // Get the width, height and type of the image.
        list($width, $height, $image_type) = getimagesize($file);
        
        switch ($image_type) {
            case 1:
                $im = imagecreatefromgif($file);
                break;
            case 2:
                $im = imagecreatefromjpeg($file);
                break;
            case 3:
                $im = imagecreatefrompng($file);
                break;
            default:
                return '';
                break;
        }
        
        // Create the table.
        if ($id != "") {
            $id = "id=" . $id . " ";
        }
        $table = '<table ' . $id . 'cellspacing="0" cellpadding="0" border="0" style="margin-left: auto; margin-right: auto; font-size:0px;">';
        
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
                
                $table = $table . '<td width="' . $cell_width . '" height="'. $cell_height . '" colspan="1" style="background-color: rgb(' . $r . ', ' . $g . ', ' . $b . ');">&nbsp;</td>';
                
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
    echo tablifyYourImage("iametza.jpg", 5, 5);
    echo tablifyYourImage("iametza.jpg", 3, 3, "test");
?>
