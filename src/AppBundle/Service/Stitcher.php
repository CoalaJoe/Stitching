<?php
/**
 * Created with PhpStorm at 03.03.16.
 *
 * @author Dominik Müller (Ashura) ashura@aimei.ch
 * @link   http://aimei.ch/developers/Ashura
 */

namespace AppBundle\Service;


/**
 * Class Stitcher
 *
 * @package AppBundle\Service
 */
class Stitcher
{
    /**
     * Stitches all images together supplied.
     */
    public function stitch()
    {
        $args   = func_get_args();
        $width  = 0;
        $height = 0;

        foreach ($args as $image) {
            $tmpWidth  = imagesx($image);
            $tmpHeight = imagesy($image);
            $width += $tmpWidth;
            $height = ($height < $tmpHeight) ? $tmpHeight : $height;
        }

        ob_start();
        $baseImg   = imagecreate($width, $height);
        $usedWidth = 0;

        foreach ($args as $image) {
            $tmpWidth  = imagesx($image);
            $tmpHeight = imagesy($image);
            imagecopy($baseImg, $image, $usedWidth, 0, 0, 0, $tmpWidth, $tmpHeight);
            $usedWidth += $tmpWidth;
            imagedestroy($image);
        }
        imagejpeg($baseImg);

        $finalImage = ob_get_contents();
        ob_end_clean();

        return $finalImage;
    }
}
