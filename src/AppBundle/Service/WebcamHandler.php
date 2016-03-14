<?php
/**
 * Created with PhpStorm at 14.03.16.
 *
 * @author Dominik Müller (Ashura) ashura@aimei.ch
 * @link   http://aimei.ch/developers/Ashura
 */

namespace AppBundle\Service;


class WebcamHandler
{
    /**
     * @var string
     */
    private $camIp;

    /**
     * WebcamHandler constructor.
     *
     * @param string $camIp
     */
    public function __construct(string $camIp)
    {
        $this->camIp = $camIp;
    }

    /**
     * @param string $url
     *
     * @return resource
     */
    private function getBaseCurl(string $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 0);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 1000);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return $curl;
    }

    /**
     * @return string
     */
    private function getBaseUrl()
    {
        return "http://".$this->camIp."/cgi-bin/";
    }

    /**
     *
     */
    public function takeImage()
    {
        $curl = $this->getBaseCurl($this->getBaseUrl()."video.jpg");

    }
}
