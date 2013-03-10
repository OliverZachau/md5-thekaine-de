<?php
/**
 * User: kaine
 * Date: 04.07.12
 * Time: 14:32
 *
 */
interface Parser
{
    /**
     * @abstract
     * @return String Array with all Hash Algorithms
     */
    public function __construct($hashcode, $algorithm);

    public function getHashAlgorithms();

    public function parse($data);

    public function getCurl();

}
