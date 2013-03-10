<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:41
 *
 */

class onlinehashcrack_com implements Parser
{
    var $Algorithm;
    var $HashCode;

    public function getHashAlgorithms()
    {
        return array(Algorithm::ALGORITHM_MD5);
    }

    public function parse($data)
    {
        $match_amount = preg_match_all('%(?<=Plain text : <b style="letter-spacing:1.2px">)(.*)(?=</b><br />)%', $data, $matches);
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
        curl_setopt($ch, CURLOPT_URL, "http://www.onlinehashcrack.com/free-hash-reverse.php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("hashToSearch" => $this->HashCode, "searchHash" => "Search"));
        curl_setopt($ch, CURLOPT_USERAGENT, "md5.thekaine.de - Meta Hash Search Engine");

        return $ch;

    }
}
