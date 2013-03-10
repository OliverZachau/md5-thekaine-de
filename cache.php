<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 05.07.12
 * Time: 18:58
 *
 */

$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");

$md5cache = $memcache->get("md5");
var_dump($md5cache);