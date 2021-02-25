<?php
namespace Phynixmedia\Store\Traits;

use Phynixmedia\Store\Core\Authorizer;

trait Config
{

    /**
     * @param array $config
     * @return Authorizer
     */
    public static function config(array $config){

        return new Authorizer($config);
    }
}
