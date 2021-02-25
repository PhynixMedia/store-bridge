<?php 

namespace Phynixmedia\Store\Core;

use Phynixmedia\Store\Core\StoreRest;

abstract class App
{

    /**
     * @var StoreRest
     */
    public $rest;

    public $result;

    /**
     * Store constructor.
     */
    public function __construct(string $authorizer)
    {
        $this->rest = new StoreRest($authorizer);
    }

    public function setPath($path, ...$path_array){

        $pair = [];
        foreach ($path_array as $index => $value) {
            $pair['_param_' . $index] = $value;
        }
        return strtr($path, $pair);
    }

}
