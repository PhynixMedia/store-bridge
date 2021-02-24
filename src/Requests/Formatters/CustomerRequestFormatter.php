<?php

namespace Phynixmedia\Store\Requests\Formatters;

use Phynixmedia\Store\Requests\Request;

class CustomerRequestFormatter
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function body(): array 
    {
        //do some validations here

        return  $this->request->_array();
    }
}