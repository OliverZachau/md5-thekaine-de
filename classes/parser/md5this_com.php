<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:41
 *
 */

class md5this_com implements Parser
{
    var $Algorithm;
    var $HashCode;

    public function getHashAlgorithms()
    {
        return array(Algorithm::ALGORITHM_MD5, Algorithm::ALGORITHM_SHA1);
    }

    public function parse($data)
    {

        $match_amount = preg_match_all('%(?<=resolves to -> <b>)(.*)(?=</b></font>)%', $data, $matches);
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
        if ($this->Algorithm == Algorithm::ALGORITHM_MD5) {
            $algo = "md5";
        } elseif ($this->Algorithm == Algorithm::ALGORITHM_SHA1) {
            $algo = "sha1";
        }

        curl_setopt($ch, CURLOPT_URL, "http://www.md5this.com/crackit.php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("h" => $this->HashCode, "mathguard_answer" => "6", "mathguard_code" => "ca77837898d4d4147db85de08432d46e", "s" => "Crack+it "));
        curl_setopt($ch, CURLOPT_USERAGENT, "md5.thekaine.de - Meta Hash Search Engine");

        return $ch;

    }
}
