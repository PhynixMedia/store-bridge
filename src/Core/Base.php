<?php

namespace Phynixmedia\Store\Core;

class Base 
{

    /**
     * 
     */
    private $map = [];

    /**
     * 
     */
    public function __get($key)
    {
        if($this->__isset($key))
        {
            return $this->map[$key];
        }
        return null;
    }

    /**
     * 
     */
    public function __set($key, $value)
    {
        if(!is_array($value) && $value === null)
        {
            $this->__unset($key);
        }else{
            $this->map[$key] = $value;
        }
    }

    /**
     * 
     */
    public function __isset($key)
    {
        return isset($this->map[$key]);
    }

    /**
     * 
     */
    public function __unset($key)
    {
        unset($this->map[$key]);
    }

    /**
     * 
     */
    public function __json()
    {
        
        return json_encode($this->map);
    }

    /**
     * 
     */
    public function _array(): array
    {
        return $this->map;
    }

}