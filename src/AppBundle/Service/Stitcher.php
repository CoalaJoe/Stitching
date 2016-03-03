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
     * Stitches all images together suplied.
     */
    public function stitch()
    {
        $args = func_get_args();

        return $args;
    }
}
