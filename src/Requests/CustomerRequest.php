<?php

namespace Phynixmedia\Store\Requests;

class CustomerRequest extends Request
{

    /**
     * Coupon constructor.
     */
    public function __construct()
    {
        
    }

    public function setName(string $namex)
    {
        $this->namex = $namex;
    }

    public function getName()
    {
        return $this->namex;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

}