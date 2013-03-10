<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:41
 *
 */

class md5_net implements Parser
{
    var $Algorithm;
    var $HashCode;

    public function getHashAlgorithms()
    {
        return array(Algorithm::ALGORITHM_MD5, Algorithm::ALGORITHM_SHA1);
    }

    public function parse($data)
    {

        $match_amount = preg_match_all('%(?<=<input type="text" id="hash" size="32" value=")(.*)(?="/>)%', $data, $matches);
        return $match_amount > 0 && $matches[0][0] != "Entry not found." ? $matches[0][0] : "";
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
        if ($this->Algorithm == Algorithm::ALGORITHM_MD5) {
            $algo = "md5";
        } elseif ($this->Algorithm == Algorithm::ALGORITHM_SHA1) {
            $algo = "sha1";
        }

        curl_setopt($ch, CURLOPT_URL, "http://www.md5.net/cracker.php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("hash" => $this->HashCode));
        curl_setopt($ch, CURLOPT_USERAGENT, "md5.thekaine.de - Meta Hash Search Engine");

        return $ch;

    }
}
