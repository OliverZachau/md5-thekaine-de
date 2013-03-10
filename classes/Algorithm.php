<?php
/**
 * User: kaine
 * Date: 04.07.12
 * Time: 14:34
 *
 */
class Algorithm
{
    const ALGORITHM_MD5 = "MD5";
    const ALGORITHM_SHA1 = "SHA1";


    public static function getMD5($hash)
    {
        return md5($hash);
    }

    public static function checkMD5($hash)
    {
        return preg_match("/^[0-9a-f]{32}$/", $hash);
    }

    public static function checkSHA1($hash)
    {
        return preg_match("/^[0-9a-f]{40}$/", $hash);
    }

}
