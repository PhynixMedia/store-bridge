<?php 

namespace Phynixmedia\Store\Core;

use Phynixmedia\Store\StoreRest;


abstract class Store
{

    /**
     * @var StoreRest
     */
    public $rest;

    public $result;

    /**
     * Store constructor.
     */
    public function __construct()
    {
        $this->rest = new StoreRest();
    }

    public function setPath($path, ...$path_array){

        $pair = [];
        foreach ($path_array as $index => $value) {
            $pair['_param_' . $index] = $value;
        }
        return strtr($path, $pair);
    }

}