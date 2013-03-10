<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 05.07.12
 * Time: 10:52
 *
 */
class HashCracker
{
    private $Parser;

    public function crack($hash, $algo)
    {
        foreach (Config::$PARSER as $name => $enable) {
            if ($enable) {
                $this->Parser[$name] = new $name($hash, $algo);
                $curls[$name] = $this->Parser[$name]->getCurl();
            }
        }

        if (count($curls) > 0) {
            $mh = curl_multi_init();
            foreach ($curls as $name => $ch) {
                curl_multi_add_handle($mh, $ch);
            }
        }

        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running > 0);

        foreach ($this->Parser as $name => $class) {
            $result[$name] = $class->parse(curl_multi_getcontent($curls[$name]));
        }

        return $result;
    }

}
