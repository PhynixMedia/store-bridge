<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\DealsResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Deals extends Store
{

    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function all(){
        try {
            $response = $this->rest->get(StoreConstants::GET_DEALS);
            return (new DealsResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}