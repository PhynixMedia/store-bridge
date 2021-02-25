<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Authorizer;
use Phynixmedia\Store\Traits\Config;
/**
 * Class Store
 * @package Phynixmedia\Store
 */
class Store
{

    use Config;

    /**
     * Load selected class
     * @param Authorizer $authorizer
     * @param string $key
     * @return mixed|null
     */
    public static function load(string $token, string $key )
    {
        try{
            
            return (new StoreFactory($token))->create($key);

        }catch(\Exception $e){
//            var_dump($e);
            return NULL;
        }
    }

}
