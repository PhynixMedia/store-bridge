<?php

namespace Phynixmedia\Store\Requests\Formatters;

use Phynixmedia\Store\Requests\OrderRequest;

class OrderRequestFormatter
{

    protected $request;

    public function __construct(OrderRequest $request)
    {
        $this->request = $request;
    }

    public function body(): array 
    {
        //do some validations here

        return  $this->request->_array();
    }

}