<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:41
 *
 */

class tmto_org implements Parser
{
    var $Algorithm;
    var $HashCode;

    public function getHashAlgorithms()
    {
        return array(Algorithm::ALGORITHM_MD5, Algorithm::ALGORITHM_SHA1);
    }

    public function parse($data)
    {

        $match_amount = preg_match_all('%(?<=text=")(.*)(?="/>)%', $data, $matches);
        return $match_amount > 0 ? $matches[0][0] : "";
    }

    /**
     * @return String Array with all Hash Algorithms
     */
    public function __construct($hashcode, $algorithm)
    {
        $this->HashCode = $hashcode;
        $this->Algorithm = $algorithm;

    }

    public function getCurl()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.tmto.org/api/latest/?hash={$this->HashCode}&auth=d822001cedc5ddcbcc99eff1ac564ca0b255a7082fb19bfa87f0cbc020f70a30");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "md5.thekaine.de - Meta Hash Search Engine");

        return $ch;

    }
}
