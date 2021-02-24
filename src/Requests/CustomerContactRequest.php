<?php

namespace Phynixmedia\Store\Requests;

use Phynixmedia\Store\Requests\CustomerRequest;

class CustomerContactRequest extends CustomerRequest
{

    /**
     * Coupon constructor.
     */
    public function __construct()
    {
        
    }

    public function setID(string $id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setAddress1(string $address_1)
    {
        $this->address_1 = $address_1;
    }

    public function getAddress1()
    {
        return $this->address_1;
    }

    public function setAddress2(string $address_2)
    {
        $this->address_2 = $address_2;
    }

    public function getAddress2()
    {
        return $this->address_2;
    }


    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }


    public function setLonglat(string $longlat)
    {
        $this->longlat = $longlat;
    }

    public function getLonglat()
    {
        return $this->longlat;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * 
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function setPostcode(string $postcode)
    {
        $this->postcode = $postcode;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }
}