<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kaine
 * Date: 03.07.12
 * Time: 21:34
 * To change this template use File | Settings | File Templates.
 */

include("classes/boot.php");
$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");
if (isset($_GET['hash']) && Algorithm::checkMD5($_GET['hash'])) {
    $md5cache = $memcache->get("md5");
    if (count($md5cache) > 1000) {
        $memcache->delete("md5");
    }
    if (isset($md5cache[$_GET['hash']])) {
        $result = $md5cache[$_GET['hash']];
    } else {
        $test = new HashCracker();
        $result = $test->crack($_GET['hash'], Algorithm::ALGORITHM_MD5);
        foreach ($result as $k => $v) {
            if ($v != "") {
                if (isset($data[$v])) {
                    $data[$v]++;
                } else {
                    $data[$v] = 1;
                }
            }
        }
        arsort($data);
        $data = array_keys($data);
        $result = array_pop($data);
        $md5cache = $memcache->get("md5");
        $md5cache[$_GET['hash']] = $result;
        $memcache->set("md5", $md5cache, MEMCACHE_COMPRESSED, 600);


    }
}

$latest = $memcache->get("md5");

include "templates/index.php";

