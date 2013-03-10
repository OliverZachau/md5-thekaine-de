<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:41
 *
 */

class md5online_net implements Parser
{
    var $Algorithm;
    var $HashCode;

    public function getHashAlgorithms()
    {
        return array(Algorithm::ALGORITHM_MD5, Algorithm::ALGORITHM_SHA1);
    }

    public function parse($data)
    {
        $match_amount = preg_match_all('%(?<=<br>pass : <b>)(.*)(?=</b>)%', $data, $matches);
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
        curl_setopt($ch, CURLOPT_URL, "http://md5online.net/");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("option" => "hash2text", "pass" => $this->HashCode, "send" => "submit"));
        curl_setopt($ch, CURLOPT_USERAGENT, "md5.thekaine.de - Meta Hash Search Engine");

        return $ch;

    }
}
